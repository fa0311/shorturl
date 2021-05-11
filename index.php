<?php

require 'idiorm-1.5.7/idiorm.php';
require 'config.php';

$where_domain = ORM::for_table('urls')
    ->where('domain', $_GET["subhost"])
    ->find_one();
if($where_domain == false){
    header('Location: https://xn--s7y.net/add/');
    die();
}

header('Location: '.$where_domain->url);