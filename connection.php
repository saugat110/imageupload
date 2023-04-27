<?php

$username = 'root';
$password = '';
$dsn = 'mysql:host=localhost;dbname=image';

try{
    $db = new PDO($dsn, $username, $password);
    // echo 'connected';
}catch(Exception $e){
    echo $e->getMessage();
}

?>
