<?php

    ini_set ('dispay_errors', 1);
    error_reporting(E_ALL);

    require_once 'connection.php';

    // echo $_POST['t2'];

    if(isset($_POST['sub'])){
        $query = 'update person set name = :name where id = :id';
        $stmt = $db -> prepare($query);
        $stmt -> execute([':name' => $_POST['cname'], ':id' => $_POST['change_id']]);
        header('Location:display.php');
        // echo 'helo';
    }
// echo 'hi';