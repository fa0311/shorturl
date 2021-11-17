<?php
ORM::configure('mysql:host=localhost;dbname=');
ORM::configure('username', '');
ORM::configure('password', '');
ORM::configure('driver_options', [
    PDO::MYSQL_ATTR_INIT_COMMAND       => 'SET NAMES utf8',
    PDO::ATTR_EMULATE_PREPARES         => false,
    PDO::MYSQL_ATTR_USE_BUFFERED_QUERY => true,
]);
$conf = [
    'domain' => '短.net', //ドメイン
    'punycode_domain' => 'xn--s7y.net', //ピュニコード化したドメイン 無いならドメインと同じ
    'session_timeout' => 300, //セッション有効期限(sec)
    'ip_limit' => 10, // {ip_limit_sec} 秒あたり {ip_limit} 回が登録できるリミット
    'ip_limit_sec' => 180,
];