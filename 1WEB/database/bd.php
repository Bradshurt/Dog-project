<?php
$host = 'localhost';
$dbname = 'lovdog';
$user = 'root';
$pwd = '';

try{
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8" , $user, $pwd);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}catch(PDOException $e) {
    die("connexction à la base de données à échoué: " .$e->getMessage());
}
?>