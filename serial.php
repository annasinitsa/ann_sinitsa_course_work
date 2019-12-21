<?php
require 'vendor/mustache/mustache/src/Mustache/Autoloader.php';
Mustache_Autoloader::register();

$mustache = new Mustache_Engine([
    'loader' => new Mustache_Loader_FilesystemLoader(__DIR__ . '/views', ['extension' => '.php']),
]);

echo $mustache->render('header',['page_name' => 'serialpage']);

echo $mustache->render('serial_layout',['poster' => 'https://vignette.wikia.nocookie.net/star-and-the-forces-of-evil/images/c/ca/SVTFOE_season_3_poster.png/revision/latest/scale-to-width-down/340?cb=20180112163051', 'title' => 'Star vs. Forces of Evil']);

echo $mustache->render('footer',['test' => 'hellp']);