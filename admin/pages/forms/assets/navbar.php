<?php
session_start();
ob_start();

if (!isset($_SESSION['role'])) {

    $_SESSION['error'] = "login first ";
    header("location:../../login.php");
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>AdminL | Editors</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../../dist/css/adminlte.min.css">
    <!-- summernote -->
    <link rel="stylesheet" href="../../plugins/summernote/summernote-bs4.min.css">
    <!-- CodeMirror -->
    <link rel="stylesheet" href="../../plugins/codemirror/codemirror.css">
    <link rel="stylesheet" href="../../plugins/codemirror/theme/monokai.css">
    <!-- SimpleMDE -->
    <link rel="stylesheet" href="../../plugins/simplemde/simplemde.min.css">
</head>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">

        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="index3.html" class="nav-link">Home</a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="#" class="nav-link">Contact</a>
                </li>
            </ul>

            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">


            </ul>
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="index3.html" class="brand-link">
                <img src="../../dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
                <span class="brand-text font-weight-light">Admin</span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">


                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">


                        <li class="nav-item">
                            <a href="../tables/Courses.php" class="nav-link">
                                <i class="nav-icon fas fa-book"></i>
                                <p>
                                    Courses
                                </p>
                            </a>
                        </li>


                        <li class="nav-item">
                            <a href="../tables/Categories.php" class="nav-link">
                                <i class="nav-icon fas fa-book"></i>
                                <p>
                                    Categories
                                </p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="../tables/Requests.php" class="nav-link">
                                <i class="nav-icon fas fa-edit"></i>
                                <p>
                                    Requests
                                </p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="../tables/Sliders.php" class="nav-link">
                                <i class="nav-icon fas fa-edit"></i>
                                <p>
                                    Slider
                                </p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="update-about.php" class="nav-link">
                                <i class="nav-icon fas fa-edit"></i>
                                <p>
                                    About Us
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="../tables/Admins.php" class="nav-link">
                                <i class="nav-icon fas fa-edit"></i>
                                <p>
                                    Admins
                                </p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="../../../backend/logout.php" class="nav-link">
                                <i class="nav-icon fas fa-edit"></i>
                                <p>
                                    Logout
                                </p>
                            </a>
                        </li>



                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">


                    </div>
                </div><!-- /.container-fluid -->
            </section>