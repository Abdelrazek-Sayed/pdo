<?php

session_start();
session_unset();
session_destroy();

// exite();

header("location:../admin/login.php");



?>