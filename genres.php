<?php
require 'vendor/mustache/mustache/src/Mustache/Autoloader.php';
require 'app/mydb.php';
Mustache_Autoloader::register();

$mustache = new Mustache_Engine([
    'loader' => new Mustache_Loader_FilesystemLoader(__DIR__ . '/views', ['extension' => '.php']),
]);

if(isset($_GET['genre'])){
    $genre = filter_var($_GET['genre'],FILTER_SANITIZE_STRING);
} else {
    $genre = 'comedy';
}

$db = MyDB::getInstance();

$db->select('serials','title,poster,rating'," genre LIKE '%".$genre."%'");

$data = $db->getResult();

$genres_list = [
    ['genre' => 'comedy',],
    ['genre' => 'horror',],
    ['genre' => 'cartoons',],
    ['genre' => 'drama',],
    ['genre' => 'fantasy',],
    ['genre' => 'thriller',],
    ['genre' => 'other',]];

echo $mustache->render('header',['page_name' => 'genres']);

echo $mustache->render('genres_layout',['serial_data' => $data, 'genres_list' => $genres_list]);

echo $mustache->render('footer',['test' => 'hellp']);