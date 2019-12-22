<?php
require 'vendor/mustache/mustache/src/Mustache/Autoloader.php';
Mustache_Autoloader::register();

$mustache = new Mustache_Engine([
    'loader' => new Mustache_Loader_FilesystemLoader(__DIR__ . '/views', ['extension' => '.php']),
]);

$genres_list = [
    ['genre' => 'comedy',],
    ['genre' => 'horror',],
    ['genre' => 'cartoons',],
    ['genre' => 'drama',],
    ['genre' => 'fantasy',],
    ['genre' => 'thriller',],
    ['genre' => 'other',]];


echo $mustache->render('header',['page_name' => 'homepage']);

echo $mustache->render('homepage_layout',['genres_list' => $genres_list]);

echo $mustache->render('footer',['test' => 'hellp']);