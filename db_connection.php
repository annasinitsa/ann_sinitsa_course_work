<?php
function OpenCon()
 {
//  $dbhost = "localhost";
//  $dbuser = "root";
//  $dbpass = "mysql";
//  $db = "otd";
 $dbhost = "77.47.192.87:33321";
 $dbuser = "ka7514";
 $dbpass = "123456";
 $db = "ka7514";

 $conn = new mysqli($dbhost, $dbuser, $dbpass,$db) or die("Connect failed: %s\n". $conn -> error);
 
 return $conn;
 }
 
function CloseCon($conn)
 {
 $conn -> close();
 }
   
