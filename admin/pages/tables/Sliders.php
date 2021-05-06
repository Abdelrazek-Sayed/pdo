<?php include("assets/navbar.php"); ?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">

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

  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Sliders</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Sliders</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <?php

          include("../../../backend/handle-sliders.php");

          $sliders = sliders::getSlider();

          ?>
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">All Sliders with CRUD</h3><br>
              <a href="../forms/add-slider.php" class="btn btn-success">Add Slider</a>
            </div>
            <!-- /.card-header -->
            <div class="card-body">

              <table id="database-table">
                <tr>
                  <th class="text-center">ID</th>
                  <th class="text-center">Image</th>
                  <th class="text-center" width="35%">Action</th>
                </tr>

                <?php for ($counter = 1; $slider = $sliders->fetchObject(); $counter++) { ?>

                  <tr>
                    <td class="text-center"><?= $counter; ?></td>
                    <td class="text-center">

                      <img src="../../../uploads/images/slider/<?= $slider->img; ?>" style="height:100px; width:150px;">

                    </td>
                    <td class="text-center">
                      <div class="container">
                        <div class="row">
                          <div class="col-3">
                            <form method="POST" action="../../../backend/handle-sliders.php">
                              <input type="hidden" name="slider_id" value="<?= $slider->id; ?>">
                              <input type="hidden" name="img_name" value="<?= $slider->img; ?>">

                              <input type="hidden" name="script">
                              <button name="delete" class="btn btn-danger">Delete</button>
                            </form>
                          </div>
                          <div class="col-2">

                            <a class="btn btn-ms btn-info" href="../forms/update-slider.php?slider_id=<?= $slider->id; ?>&img_name=<?= $slider->img; ?>">Update</a>

                          </div>

                        </div>
                      </div>


                    </td>

                  </tr>
                <?php } ?>
              </table>


            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<?php include("assets/footer.php"); ?>