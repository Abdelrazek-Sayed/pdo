<?php

include 'conn.php';

class about{


public static function getAbout(){

global $conn;
$id = 1 ;
$get =$conn->prepare('SELECT * FROM about where id = ?');
$get->execute([$id]);
return $get;
}

public static function update(){
    global $conn;
    
    $id = $_POST['about_id'];
    $location = $_POST['location'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $about = $conn->prepare("UPDATE about set `location` = ? , phone = ? , email = ? where id = ?");
    $about->execute([ $location, $phone,$email ,$id]);

    session_start();
    $_SESSION['msg'] = "about updated successfully";
    header("location:../admin/pages/forms/update-about.php");
}
}

if(isset($_POST['update'])){

    about::update();
}