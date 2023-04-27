<?php
require_once 'connection.php';
    $id = $_POST['id'];

    echo $id;
    $query = "delete from person where id = :id";
    $stmt = $db -> prepare($query);
    $stmt -> execute([':id' => $id]);
    header('Location:display.php');
?>