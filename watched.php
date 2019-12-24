<?php
session_start();
require 'vendor/mustache/mustache/src/Mustache/Autoloader.php';
require 'app/mydb.php';
require 'models/user.php';
Mustache_Autoloader::register();

$mustache = new Mustache_Engine([
    'loader' => new Mustache_Loader_FilesystemLoader(__DIR__ . '/views', ['extension' => '.php']),
]);

if(isset($_GET['list_type'])){
    $db = MyDB::getInstance();
    $us = User::getInstance();
    $us->retrieveUserData();

    if(isset($_GET['title'])){
        $db->select('serials','id',"title = '".$_GET['title']."'");
        $serialId = $db->getResult();
        $db->query("INSERT INTO lists (user_id,serial_id,list_type) 
                            VALUES('".$us->getData('id')."','".$serialId['id']."','".$_GET['list_type']."')");
    }
    $db->select("serials s JOIN lists l ON s.id = l.serial_id",'title,poster', "l.user_id = '".$us->getData('id')."' AND l.list_type = '".$_GET['list_type']."'");
    $list[$_GET['list_type']] = $db->getResult();
    $list_type = [
        'opt1' => $watched = $_GET['list_type'] == 'watched' ? 1 : 0,
        'opt2' => $favorite = $_GET['list_type'] == 'favorite' ? 1 : 0,
        'opt3' => $to_watch = $_GET['list_type'] == 'to_watch' ? 1 : 0
    ];
}

echo $mustache->render('header',['page_name' => 'watched']);

echo $mustache->render('watched_layout',['list' => $list[$_GET['list_type']], $list_type]);

echo $mustache->render('footer',['test' => 'hellp']);