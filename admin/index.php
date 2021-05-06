<?php
session_start();
ob_start();


if (!isset($_SESSION['role'])) {

  $_SESSION['error'] = "login first ";
  header("location:login.php");
}

include 'includes/navbar.php';

include("../backend/handle-index.php");

$counters = adminHome::getCounters();


?>


<?php if (isset($_SESSION['msg'])) { ?>
  <div class="alert alert-success">

    <?php echo $_SESSION['msg']; ?>
  </div>
<?php     }
unset($_SESSION['msg']); ?>

<?php if (isset($_SESSION['error'])) { ?>
  <div class="alert alert-danger">

    <?php echo $_SESSION['error']; ?>
  </div>
<?php     }
unset($_SESSION['error']); ?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Dashboard</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Admin Dashboard</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-lg-3 col-6">
          <!-- small box -->

          <div class="small-box bg-info">
            <div class="inner">
              <h3><?= $counters['requestCount']; ?></h3>

              <p>Requests</p>
            </div>
            <div class="icon">
              <i class="ion ion-bag"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-success">
            <div class="inner">
              <h3><?= $counters['courseCount']; ?></h3>

              <p>Courses</p>
            </div>
            <div class="icon">
              <i class="ion ion-stats-bars"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>

      </div>
      <!-- /.row -->
      <!-- Main row -->
      <div class="row">


      </div>
      <!-- /.row (main row) -->
    </div><!-- /.container-fluid -->
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->


<?php
include 'includes/footer.php';

?>