<?php

include "conn.php";

class adminHome
{

    public static function getCounters()
    {

        global $conn;

        $requests = $conn->prepare("SELECT count(id) from requests");
        $requests->execute();
        $requestCount = $requests->fetchColumn();

        $courses = $conn->prepare("SELECT count(id) from courses");
        $courses->execute();
        $courseCount = $courses->fetchColumn();


        $counters =
            [
                'requestCount' => $requestCount,
                'courseCount' => $courseCount
            ];


        return $counters;
    }
}
