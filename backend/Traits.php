
<?php

include_once("conn.php");

trait  Traits
{

    public static function checkRequest($course_id)
    {
        global $conn;

        $request = $conn->prepare("SELECT * FROM requests where course_id = ?");
        $request->execute([$course_id]);
    }



    public static function imageCheckType($imgType)
    {

        $imgExtensions = ['image/jpeg', 'image/jpg', 'image/gif', 'image/png'];

        if (in_array($imgType, $imgExtensions)) {
            return 1;
        }

        return 0;
    }



    // if image uploadede or not
    public static function checkImageExcist($imgName)
    {

        global $conn;

        $check = $conn->prepare("SELECT * from courses where img = ? limit 1 ");
        $check->execute([$imgName]);

        if (empty($check->fetchColumn())) {
            return $imgName;
        }

        $imgName = rand(0000, 9999) . '_' . $imgName;
        return $imgName;
    }
}


?>