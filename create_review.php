<?php
require 'vendor/mustache/mustache/src/Mustache/Autoloader.php';
require 'app/mydb.php';

Mustache_Autoloader::register();

$mustache = new Mustache_Engine([
    'loader' => new Mustache_Loader_FilesystemLoader(__DIR__ . '/views', ['extension' => '.php']),
]);

if(isset($_GET['title'])){
    $title = filter_var($_GET['title'],FILTER_SANITIZE_STRING);
    if(isset($_POST['text-review']) && isset($_POST['rating'])){
        $db = MyDB::getInstance();
        $review = filter_var($_POST['text-review'],FILTER_SANITIZE_STRING);
        $author = isset($_POST['author']) ? filter_var($_POST['author'],FILTER_SANITIZE_STRING) : 'anon';
        $rating = $_POST['rating'];
        if(!$db->query("INSERT INTO reviews (author_name,serial_title,rate,rev_text) VALUES ('".$author."','".$title."',".$rating.",'".$review."')")){
            $msg = "Please, try again";
        }
    }
}

echo $mustache->render('header',['page_name' => 'review_form_style']);

echo $mustache->render('create_review_form.php',['title' => $title, 'msg' => $msg]);

echo $mustache->render('footer',['test' => 'hellp']);