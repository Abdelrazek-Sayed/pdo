<?php
include("conn.php");
include 'Traits.php';


class  sliders
{

    use Traits;

    public static function getSlider()
    {
        global $conn;
        $get = $conn->prepare("SELECT * FROM slider");
        $get->execute();
        return $get;
    }


    public static function addSlider()
    {
        global $conn;
        $imgName = $_FILES['img']['name'];
        $imgTmpName = $_FILES['img']['tmp_name'];
        $imgType = $_FILES['img']['type'];
        // $imgSize = $_FILES['img']['size'];
        // $imgError= $_FILES['img']['error'];

        $result = sliders::imageCheckType($imgType);

        if ($result == 0) {
            echo "sorry unallowed type =  ";
            print_r($imgType);
            die();
        }

        $avatarname = time() . $imgName;
        $imgLink = dirname(__FILE__) . '/../uploads/images/slider/';

        move_uploaded_file($imgTmpName, $imgLink . $avatarname);
        $add = $conn->prepare('INSERT INTO slider(img) values(?)');
        $add->execute([$avatarname]);
        session_start();
        $_SESSION['msg'] = "new slider was added ";
        header("location:../admin/pages/tables/sliders.php");
    }

    public static function updateSlider()
    {

        global $conn;
        $script = $_POST['script'];
        $sliderId = $_POST['slider_id'];
        $imgOldName = $_POST['img_name'];
        $imgName = $_FILES['img']['name'];
        $imgTmpName = $_FILES['img']['tmp_name'];
        $imgType = $_FILES['img']['type'];
        // $imgSize = $_FILES['img']['size'];
        // $imgError= $_FILES['img']['error'];
        if (!empty($script)) {
            session_start();
            $_SESSION['error'] = " u r script";
            header("location:../admin/pages/tables/sliders.php");
            die();
        } else {

            if (!empty($_FILES['img']['name'])) {

                unlink("../uploads/images/slider/" . $imgOldName);



                $avatarname = time() . $imgName;
                $imgLink = dirname(__FILE__) . '/../uploads/images/slider/';

                move_uploaded_file($imgTmpName, $imgLink . $avatarname);
            } else {
                $avatarname = $imgOldName;
            }


            $add = $conn->prepare('UPDATE  slider SET img = ? where id = ? ');
            $add->execute([$avatarname, $sliderId]);
            session_start();
            $_SESSION['msg'] = "  slider had updated successfully ";
            header("location:../admin/pages/tables/sliders.php");
        }
    }


    public static function deleteSlider()
    {

        global $conn;
        $script = $_POST['script'];
        $imgName = $_POST['img_name'];

        if (!empty($script)) {
            session_start();
            $_SESSION['error'] = " u r script";
            header("location:../admin/pages/tables/sliders.php");
            die();
        } else {

            unlink("../uploads/images/slider/" . $imgName);
            $sliderId = $_POST['slider_id'];
            $delete = $conn->prepare('DELETE from slider where id =? ');
            $delete->execute([$sliderId]);
            session_start();
            $_SESSION['msg'] = " slider was deleted successfully";
            header("location:../admin/pages/tables/sliders.php");
        }
    }
}


if (isset($_POST['add'])) {

    sliders::addSlider();
}

if (isset($_POST['delete'])) {

    sliders::deleteSlider();
}
if (isset($_POST['update'])) {

    sliders::updateSlider();
}
