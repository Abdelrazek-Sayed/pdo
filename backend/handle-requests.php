<?php


include "conn.php";

class requests
{

    public static function getRequests()
    {
        global $conn;

        $get = $conn->prepare('SELECT requests.* ,courses.title as courseName from requests join courses on requests.course_id = courses.id');
        $get->execute();
        return $get;
    }


    public static function deleteRequest()
    {
        global $conn;

        $script = $_POST['script'];

        if (!empty($script)) {

            session_start();
            $_SESSION['error'] = "Not allowed";

            header("location:../admin/pages/tables/Requests.php");
        } else {
            $requestId = $_POST['request_id'];

            $del = $conn->prepare("DELETE from requests where id = ?");
            $del->execute([$requestId]);

            session_start();
            $_SESSION['msg'] = " request was deleted successfully";
            header('location:../admin/pages/tables/Requests.php');
        }
    }


    public static function addRequest()
    {
        global $conn;

        $name = $_POST['name'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $course_id = $_POST['course_id'];

        $add = $conn->prepare('INSERT INTO requests (`name`,email,phone,course_id,`status`) values (?,?,?,?,?)');
        $add->execute([$name, $email, $phone, $course_id, 0]);
        session_start();
        $_SESSION['msg'] = "Your Request sent successffully";
        header('location:../course-details.php?id=' . $course_id);
    }
    
    public static function updateRequest()
    {
        global $conn;
        // $status = $_POST['status'];
        $request_id = $_POST['request_id'];
        $update = $conn->prepare('UPDATE  requests SET  status = ? where id = ?');
        $update->execute([1, $request_id]);
        //session_start();
        //  $_SESSION['msg']= "Your Request sent successffully";
        header('location:../admin/pages/tables/Requests.php');
    }
}


if (isset($_POST['delete'])) {
    requests::deleteRequest();
}

if (isset($_POST['add_request'])) {
    requests::addRequest();
}
if (isset($_POST['accept'])) {
    requests::updateRequest();
}
