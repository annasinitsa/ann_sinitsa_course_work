<?php
require 'vendor/mustache/mustache/src/Mustache/Autoloader.php';
require 'app/mydb.php';
Mustache_Autoloader::register();

$mustache = new Mustache_Engine([
    'loader' => new Mustache_Loader_FilesystemLoader(__DIR__ . '/views', ['extension' => '.php']),
]);

if(isset($_GET['title'])){
    $db = MyDB::getInstance();
    $title = filter_var($_GET['title'],FILTER_SANITIZE_STRING);
    $db->select('serials','*'," title = '".$title."'");
    $serial = $db->getResult();
    $db->select('reviews','*'," serial_title ='".$title."'");
    $review = $db->getResult();
    $serial['review'] = $review;
}



echo $mustache->render('header',['page_name' => 'serialpage']);

echo $mustache->render('serial_layout', $serial);

echo $mustache->render('footer',['test' => 'hellp']);