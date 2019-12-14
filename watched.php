<?php
require 'vendor/mustache/mustache/src/Mustache/Autoloader.php';
Mustache_Autoloader::register();

$mustache = new Mustache_Engine([
    'loader' => new Mustache_Loader_FilesystemLoader(__DIR__ . '/views', ['extension' => '.php']),
]);

echo $mustache->render('header',['page_name' => 'watched']);

echo $mustache->render('watched_layout',['test' => 'hellp']);

echo $mustache->render('footer',['test' => 'hellp']);