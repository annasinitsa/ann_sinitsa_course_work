<?php
session_start();
require 'vendor/mustache/mustache/src/Mustache/Autoloader.php';
require 'models/user.php';
require 'app/mydb.php';
Mustache_Autoloader::register();

$mustache = new Mustache_Engine([
    'loader' => new Mustache_Loader_FilesystemLoader(__DIR__ . '/views', ['extension' => '.php']),
]);
$us = User::getInstance();
$us->retrieveUserData();

$genres_list = [
    ['genre' => 'comedy',],
    ['genre' => 'horror',],
    ['genre' => 'cartoons',],
    ['genre' => 'drama',],
    ['genre' => 'fantasy',],
    ['genre' => 'thriller',],
    ['genre' => 'other',]];

$isUser = $us->getData('active') ? 1 : 0;

$status_sup = $_SESSION['status'] == 'signed_up' ? 0 : 1;
$status_sin = $_SESSION['status'] == 'signed_in' ? 0 : 1;

echo $mustache->render('header',['page_name' => 'homepage']);

echo $mustache->render('homepage_layout',['genres_list' => $genres_list, 'status_sin' => $status_sin, 'sign_up' => $status_sup]);

echo $mustache->render('footer',['test' => 'hellp']);