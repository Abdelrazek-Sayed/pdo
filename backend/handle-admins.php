<?php

include_once("conn.php");

class admins
{

    public static function getAdmin()
    {
        global $conn;

        $get = $conn->prepare('SELECT * from users');
        $get->execute();
        return $get;
    }

    public static function getById($id)
    {
        global $conn;

        if (isset($_GET['admin_id'])) {
            $id = $_GET['admin_id'];
        }


        $admin = $conn->prepare('SELECT * from users where id = ?');
        $admin->execute([$id]);
        return $admin;
    }

    public static  function  addAdmin()
    {

        global $conn;
        if (!empty($_POST['script'])) {
            session_start();
            $_SESSION['error'] = " u r script";
            header("location:../admin/pages/forms/add-admin.php");
            die();
        } else {

            $name = $_POST['name'];
            $email = $_POST['email'];
            $role = $_POST['role'];
            $password = $_POST['password'];
            $confirm_password = $_POST['confirm_password'];

            if ($password  !=  $confirm_password) {
                session_start();
                $_SESSION['error'] = "password does not match";
                header("location:../admin/pages/forms/add-admin.php");
                die();
            }

            $password_hash = password_hash($password, PASSWORD_DEFAULT);
            $add = $conn->prepare('INSERT INTO users (name,email,`password`,`role`) values (?,?,?,?) ');
            $var = $add->execute([$name, $email, $password_hash, $role]);
            if ($var) {
                session_start();
                $_SESSION['msg'] = "new admin added";
                header("location:../admin/pages/tables/Admins.php");
            } else {
                session_start();
                $_SESSION['msg'] = "query error";
                header("location:../admin/pages/forms/add-admin.php");
            }
        }
    }

    public static function delete()
    {
        global $conn;

        if (!empty($_POST['script'])) {
            session_start();
            $_SESSION['error'] = " u r script";
            header("location:../admin/pages/forms/add-admin.php");
            die();
        } else {
            $id = $_POST['admin_id'];
            $del = $conn->prepare('DELETE  from users where id = ?');
            $del->execute([$id]);
            session_start();
            $_SESSION['error'] = "Admin was deleted";
            header("location:../admin/pages/tables/Admins.php");
        }
    }

    public static function update()
    {
        global $conn;
        if (!empty($_POST['script'])) {
            session_start();
            $_SESSION['error'] = " u r script";
            header("location:../admin/pages/forms/add-admin.php");
            die();
        } else {

            $id = $_POST['admin_id'];



            $admin = $conn->prepare("SELECT * from users where id = ?");
            $admin->execute([$id]);
            $admin = $admin->fetchObject();
            $password_hash = $admin->password;




            $name = $_POST['name'];
            $email = $_POST['email'];
            $role = $_POST['role'];
            if (isset($_POST['password'])) {
                $password = $_POST['password'];

                $confirm_password = $_POST['confirm_password'];
                if ($password  !=  $confirm_password) {
                    session_start();
                    $_SESSION['error'] = "password does not match";
                    header("location:../admin/pages/forms/add-admin.php");
                    die();
                }
                $password_hash = password_hash($_POST['password'], PASSWORD_DEFAULT);
            }





            $add = $conn->prepare("UPDATE users set  name = ?, email = ? ,`password` = ? ,`role` = ? where id = ?");
            $var = $add->execute([$name, $email, $password_hash, $role, $id]);
            if ($var) {
                session_start();
                $_SESSION['msg'] = " admin updated";
                header("location:../admin/pages/tables/Admins.php");
            } else {
                session_start();
                $_SESSION['msg'] = "query error";
                header("location:../admin/pages/forms/update-admin.php");
            }
        }
    }
}


if (isset($_POST['add'])) {
    admins::addAdmin();
}

if (isset($_POST['delete'])) {
    admins::delete();
}

if (isset($_POST['update'])) {
    admins::update();
}
