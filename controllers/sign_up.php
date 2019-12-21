<?php
require '../vendor/mustache/mustache/src/Mustache/Autoloader.php';
Mustache_Autoloader::register();

$mustache = new Mustache_Engine([
    'loader' => new Mustache_Loader_FilesystemLoader('../views', ['extension' => '.php']),
]);

echo $mustache->render('header',['page_name' => 'sign_up']);

echo $mustache->render('sign_up_layout',['test' => $_GET['hello']]);

echo $mustache->render('footer',['test' => 'hellp']);