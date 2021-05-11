<?php
require '../idiorm-1.5.7/idiorm.php';
require '../php-punycode-2.1.1/Punycode.php';
require '../config.php';

session_start();
if($_SESSION["time"] < time() - 300 || $_SESSION["ip"] !=  $_SERVER["REMOTE_ADDR"]){
    http_response_code(403);
    $output = [
        "status"=>"403",
        "message"=>"失敗しました リロードしてください"
    ];
    echo json_encode($output);
    die();
}


$Punycode = new TrueBV\Punycode();
$Punycode_domain = $Punycode->encode($_POST["domain"]);


$where_domain = ORM::for_table('urls')
    ->where('domain', $Punycode_domain)
    ->find_one();

if($where_domain !== false){
    http_response_code(403);
    $output = [
        "status"=>"403",
        "message"=>"失敗しました 既に使われているURLです"
    ];
    echo json_encode($output);
    die();
}


$where_ip = ORM::for_table('urls')
    ->where('ip', $_SERVER["REMOTE_ADDR"])
    ->count();
    
if($where_ip > 30){
    http_response_code(403);
    $output = [
        "status"=>"403",
        "message"=>"失敗しました これ以上は短縮urlを発行できません"
    ];
    echo json_encode($output);
    die();
}
if($_POST["url"] === null){
    http_response_code(403);
    $output = [
        "status"=>"403",
        "message"=>"失敗しました URLを指定してください"
    ];
    echo json_encode($output);
    die();
}

if($_POST["domain"] === null){
    http_response_code(403);
    $output = [
        "status"=>"403",
        "message"=>"失敗しました ドメインを指定してください"
    ];
    echo json_encode($output);
    die();
}
if(substr_count($_POST["url"],".") == 0){
    http_response_code(403);
    $output = [
        "status"=>"403",
        "message"=>"失敗しました 正しいURLを指定してください"
    ];
    echo json_encode($output);
    die();
}


$id = ORM::for_table('urls')
    ->count();

$insert = ORM::for_table('urls')->create();
$insert->domain = $Punycode_domain;
$insert->id = $id; 
$insert->url = $_POST["url"];
$insert->ip = $_SERVER["REMOTE_ADDR"];
$insert->save();

$output = [
    "status"=>"200",
    "message"=>"成功しました",
    "output"=>'<p>生成したURL: <a href="https://'.$Punycode_domain.'.xn--s7y.net" target="_blank">'.htmlspecialchars($_POST["domain"]).'.短.net</a></p>'.
              '<p>SNS用URL: <a href="https://'.$Punycode_domain.'.xn--s7y.net" target="_blank">'.htmlspecialchars($Punycode_domain).'.xn--s7y.net</a></p>'
];
echo json_encode($output);