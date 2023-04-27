<?php
echo '<pre>';

// $arr = getimagesize($_FILES['ifile']['tmp_name']);

// print_r($arr);

// if($arr){
//     echo 'yes';
// }else{
//     echo 'no';
// }

// echo pathinfo($_FILES['ifile']['name'], PATHINFO_EXTENSION);


if (file_exists('../bootstrap/b7.css')){
    echo 'yes';
}else{
    echo 'no';
}