<?php
require 'vendor/mustache/mustache/src/Mustache/Autoloader.php';
Mustache_Autoloader::register();

$mustache = new Mustache_Engine([
    'loader' => new Mustache_Loader_FilesystemLoader(__DIR__ . '/views', ['extension' => '.php']),
]);

echo $mustache->render('header',['page_name' => 'review_form_style']); //page_name is for css

echo $mustache->render('create_review_form.php',['test' => 'hellp']);

echo $mustache->render('footer',['test' => 'hellp']);