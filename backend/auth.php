<?php


include("conn.php");

class auth
{
    public static function login()
    {
        global $conn;

        $email = $_POST['email'];
        $password = $_POST['password'];

        $user = $conn->prepare("SELECT * from users where email = ?");
        $user->execute([$email]);
        if ($user) {
            $admin = $user->fetchObject();
            $password_check = password_verify($password, $admin->password);

            if ($password_check) {
                session_start();
                $_SESSION['role'] = $admin->role; // protection

                header("location:../admin/index.php");
            } else {
                session_start();
                $_SESSION['error'] = "  password not correct";
                header("location:../admin/login.php");
            }
        } else {
            session_start();
            $_SESSION['error'] = "email  not correct";
            header("location:../admin/login.php");
        }
    }
}

if (isset($_POST['submit_login'])) {
    auth::login();
}
