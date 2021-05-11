<?php

require 'idiorm-1.5.7/idiorm.php';


ORM::configure('mysql:host=localhost;dbname=');
ORM::configure('username', '');
ORM::configure('password', '');
ORM::configure('driver_options', [
    PDO::MYSQL_ATTR_INIT_COMMAND       => 'SET NAMES utf8',
    PDO::ATTR_EMULATE_PREPARES         => false,
    PDO::MYSQL_ATTR_USE_BUFFERED_QUERY => true,
]);


$where_domain = ORM::for_table('urls')
    ->where('domain', $_GET["subhost"])
    ->find_one();
if($where_domain == false){
    header('Location: https://xn--s7y.net/add/');
    die();
}

header('Location: '.$where_domain->url);