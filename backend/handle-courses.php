<?php

require_once("conn.php");
require_once("Traits.php");

class courses
{
    use  Traits;
    /*
get attr values
insert into courses
session with message
hesder
*/
    public static function newCourses()
    {

        global $conn;
        $get = $conn->prepare("SELECT * from courses order by id desc limit 2");
        $get->execute();
        return $get;
    }

    public static function getCourses()
    {

        global $conn;
        $get = $conn->prepare("SELECT   courses.* ,cats.name as catName from courses join cats on 
        courses.cat_id = cats.id");
        $get->execute();
        return $get;
    }

    public static function getCoursesCat($catId)
    {

        global $conn;
        $get = $conn->prepare("SELECT   courses.* ,cats.name as catName from courses join cats on 
            courses.cat_id = cats.id where cats.id = ? ");
        $get->execute([$catId]);
        return $get;
    }

    public static function getCourseId($id)
    {

        global $conn;
        $id = $_GET['id'];
     //   $img_name = $_GET['img_name'];

        $get = $conn->prepare("SELECT   courses.* ,cats.name as catName from courses join cats on 
          courses.cat_id = cats.id where courses.id  = ? ");
        $get->execute([$id]);

        return $get;
    }



    public static function addCourse()
    {

        global $conn;
        if (!empty($_POST['script'])) {
            session_start();
            $_SESSION['error'] = " u r script";
            header("location:../admin/pages/forms/add-course.php");
            die();
        } else {



            $title = $_POST['title'];
            $price = $_POST['price'];
            $body = $_POST['body'];
            $cat_id = $_POST['cat_id'];

            

            $imgName = $_FILES['img']['name'];
            $imgTmpName = $_FILES['img']['tmp_name'];
            $imgType = $_FILES['img']['type'];

             

            $result = courses::imageCheckType($imgType);

            if ($result == 0) {
                echo "sorry unallowed type =  ";

                print_r($imgType);
                die();
            }

 

            $avatarName  = time() . '_' . $imgName;  

            $avatarName = courses::checkImageExcist($avatarName);



            $imgLink = dirname(__FILE__) . '/../uploads/images/course/';   // save where


            //$imgLink = '../admin/pages/upload/';   // save where
            move_uploaded_file($imgTmpName, $imgLink . $avatarName);

            $add = $conn->prepare('INSERT INTO courses(title,price,img,body,cat_id) values (?,?,?,?,?)');
            $add->execute([$title, $price, $avatarName, $body, $cat_id]);
            //  $add=$conn->query("INSERT INTO courses(title,price,img,body,cat_id) values('$title','$price','$img','$body','$cat_id')");
            session_start();
            $_SESSION['msg'] = "course was added ";
            header("location:../admin/pages/tables/courses.php");
        }
    }


    public static function deleteCourse()
    {

        global $conn;

        $id = $_POST['course_id'];
        $script = $_POST['script'];
        $imgName = $_POST['img'];

        // check requests

        //   $request = courses::checkRequest($id);
        $request = $conn->prepare("SELECT * FROM requests where course_id = ?");
        $request->execute([$id]);

        if (!empty($request->fetchColumn())) {
            session_start();
            $_SESSION['error'] = "this coures canot be deleted because it is requested";

            header("location:../admin/pages/tables/courses.php");
            die();
        } else {

            //  protection from script ---honeypot
            if (!empty($script)) {

                session_start();
                $_SESSION['msg'] = "Not allowed";

                header("location:../admin/pages/tables/courses.php");
            } else {

                $del = $conn->prepare('DELETE from courses where id = ?');
                $del->execute([$id]);
                //delete old picture
                unlink("../uploads/images/course/$imgName");

                session_start();
                $_SESSION['msg'] = "course was deleted";
                header("location:../admin/pages/tables/courses.php");
            }
        }
    }


    /*

get new data 
check if admin upload new image or not  
-delete old image 
update dtae 
updete session
header location

*/


    public static function updateCourse()
    {

        global $conn;

        $title = $_POST['title'];
        $price = $_POST['price'];
        $body = $_POST['body'];
        $cat_id = $_POST['cat_id'];
        $id = $_POST['course_id'];
        $img_old_name = $_POST['img_old_name'];



        if (!empty($_FILES['img']['name'])) {
            // delete old image 
            unlink("../admin/pages/upload/$img_old_name");
            $img = $_FILES['img'];

            $imgName = $img['name'];
            $imgTmpName = $img['tmp_name'];
            $imgType = $img['type'];
            // $imgSize = $img['size'];
            // $imgError= $img['error'];

            $extension = courses::imageCheckType($imgType);

            if ($extension == 0) {
                session_start();
                $_SESSION['error'] = " u must upload correct file";
                header("location:../admin/pages/forms/update-course.php?id=" . $id);

                print_r($imgType);
                die();
            }

            $avatarName  = courses::checkImageExcist(time() . '_' . $imgName);
            $imgLink = dirname(__FILE__) . '/../uploads/images/course/';
            move_uploaded_file($imgTmpName, $imgLink . $avatarName);
        } else {
            $avatarName =  $img_old_name;
        }
        $update = $conn->prepare("UPDATE  courses set title = ? ,price =?,img= ?,body = ? ,cat_id =? where id = ? ");

        $var =  $update->execute([$title, $price, $avatarName, $body, $cat_id, $id]);

        if ($var) {
            session_start();
            $_SESSION['msg'] = "course was updated ";
            header("location:../admin/pages/tables/courses.php");
        } else {
            session_start();
            $_SESSION['error'] = "error during update in query ";
            header("location:../admin/pages/forms/update-course.php?id=" . $id);
        }
    }
}


if (isset($_POST['add'])) {

    courses::addCourse();
}
if (isset($_POST['delete'])) {

    courses::deleteCourse();
}

if (isset($_POST['update'])) {

    courses::updateCourse();
}
