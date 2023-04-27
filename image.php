<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once 'connection.php';

if(isset($_POST['submit'])){

    $query = 'insert into person (name) values (:name)';
    $stmt = $db->prepare($query);
    $stmt -> execute([':name'=> $_POST['name']]);

    $id = $db ->lastInsertId();

    // echo $id;
    $ok = 1;

    //check if file is an image
    $type = $_FILES['ifile']['type'];
    $array = explode('/', $type);

    if($array[0] == 'image'){

        $dir = 'images/';

       //check extension
        $extension = pathinfo($_FILES['ifile']['name'], PATHINFO_EXTENSION);
        if($extension != 'png' && $extension != 'jpeg' && $extension != 'jpg'){
            $ok = 0;
        }else{
            $name = $id . '.' . $extension;
            $target = $dir . $id . '.' . $extension;
        }

        //check if file exists
        if(file_exists($target)){
            $ok = 0;
        }

        //check size
        if($_FILES['ifile']['size'] > 2e+6){
            $ok  = 0;
        }

    }else{
        $ok = 0;
    }

    if($ok == 1){
        global $test;
        $test = move_uploaded_file($_FILES['ifile']['tmp_name'], $target);
    }

    if($test){
        $query1 = "update person set image = :name where id = :id";
        $stmt  = $db -> prepare($query1);
        $stmt ->execute([':name'=>$name, ':id'=>$id]);

        header('Location:i2.php');
    }else{
        header('Location:i2.php?error=1');
    }
}else{
    header('Location:i2.php');
}


