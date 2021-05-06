<?php

require_once("conn.php");


class category
{
    public static  function create()
    {
        global $conn;

        $name = $_POST['name'];

        // query 
        $cat = $conn->prepare('INSERT INTO cats(name) values (?)');
        $cat->execute([$name]);

        session_start();
        $_SESSION['msg'] = "category added successfully";


        header("location:../admin/pages/tables/categories.php");
    }


    public static   function all()
    {

        global $conn;

        $cats = $conn->prepare('SELECT * from cats');
        $cats->execute();

        return $cats;
        //     return $cats->fetch();  // as array 
    }


    public static   function getById($id)
    {

        global $conn;
        if (isset($_GET['cat_id'])) {
            $id = $_GET['cat_id'];
        }

        $cat = $conn->prepare("SELECT * from cats where id = ?");
        $cat->execute([$id]);

        return $cat;
    }

    /*
          create function 
          get id 
          delete cat 
          session with message 
          header location
          
          */

    public static function delete()
    {

        global $conn;

        $id = $_POST['cat_id'];
        $script = $_POST['script'];
        // protection from script ---honeypot
        if (!empty($script)) {
            session_start();
            $_SESSION['msg'] = "Not allowed";
            header("location:../admin/pages/tables/categories.php");
        } else {

            $del = $conn->prepare('DELETE  from cats where id = ?');
            $del->execute([$id]);
            session_start();
            $_SESSION['error'] = "cat was deleted";
            header("location:../admin/pages/tables/categories.php");
        }
    }


    // update
    public static   function update()
    {

        global $conn;

        $id = $_POST['cat_id'];
        $name = $_POST['name'];

        $update = $conn->prepare('UPDATE  cats set name  = ? where id = ?');
        $update->execute([$name, $id]);
        session_start();
        $_SESSION['msg'] = "category updated successfully";
        header("location:../admin/pages/tables/Categories.php");
    }
}


if (isset($_POST['create'])) {
    category::create();
}

if (isset($_POST['delete'])) {
    category::delete();
}
if (isset($_POST['update'])) {
    category::update();
}
