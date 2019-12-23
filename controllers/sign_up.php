<?php
session_start();
require '../vendor/mustache/mustache/src/Mustache/Autoloader.php';
require '../app/mydb.php';
require '../models/user.php';
Mustache_Autoloader::register();

$db = MyDB::getInstance();
$us = User::getInstance();

$mustache = new Mustache_Engine([
    'loader' => new Mustache_Loader_FilesystemLoader('../views', ['extension' => '.php']),
]);

$type = $_GET['type'] == 'signin' ? true : false;
if($_GET['type'] == 'signup'){
    if(isset($_POST['username']) && isset($_POST['pass'])){

        $username   = filter_var($_POST['username'],FILTER_SANITIZE_STRING);
        $pass       = $_POST['pass'];
        $email      = filter_var($_POST['email'],FILTER_SANITIZE_EMAIL);
        $query = "INSERT INTO users (username,pass,email) VALUES ('".$username."','".$pass."','".$email."')";
        $res = $db->query($query);
        error_log($res);
        if($res){
            $msg = "Success!";
            $_SESSION['status'] = 'signed_up';
        }else{
            $msg = "Something goes wrong :( Please, try again ";
        }
    }
}

if($_GET['type'] == 'signin'){
    if(isset($_POST['email']) && isset($_POST['pass'])){
        $pass   = $_POST['pass'];
        $email  = filter_var($_POST['email'],FILTER_SANITIZE_EMAIL);
        $db->select('users','*',"email = '".$email."'");
        $res    = $db->getResult();
        if(($db->numResults == 1) && ($_POST['pass'] == $res['pass'])){
            $msg = "Welcome, ".$res['username'];
            $res = $db->query("UPDATE users SET active = 1 WHERE id = '".$res['id']."'");
            if($res){
                $us->setData('username',$res['username']);
                $us->setData('email',$res['email']);
                $us->setData('active', 1);
                $_SESSION['status'] = 'signed_in';
            }else{
                $msg = "Oops, something goes wrong... Try again";
            }
        } elseif(($_POST['pass'] != $res['pass'])) {
            $msg = "Wrong password";
        }else{
            $msg = "User not found :(";
        }

    }
}


echo $mustache->render('header',['page_name' => 'sign_up']);

echo $mustache->render('sign_up_layout',['type' => $type , 'msg' => $msg]);

echo $mustache->render('footer',['test' => 'hellp']);