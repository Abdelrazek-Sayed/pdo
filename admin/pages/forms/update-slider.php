<?php
include 'assets/navbar.php';
$sliderId = $_GET['slider_id'];
$imgName = $_GET['img_name'];


?>
<!-- Main content -->
<section class="content">
  <div class="row">

    <div class="col-md-12">
      <!-- general form elements -->
      <div class="card card-primary">
        <div class="card-header">
          <h3 class="card-title">Edit Slider</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form method="POST" action="../../../backend/handle-sliders.php" enctype="multipart/form-data">

          <div class="form-group">
            <label for="exampleInputFile">Image</label>
            <div class="input-group">
              <div class="custom-file">

                <input type="file" name="img" class="custom-file-input" onchange="readURL(this);" id="exampleInputFile">
                <label class="custom-file-label" for="exampleInputFile">Choose file</label>

              </div>

              <div class="card-body">
            <img src="../../../uploads/images/slider/<?= $imgName; ?>" id="showImage"  style="height:150px; width:300px">
               
            </div>

            </div>
          </div>

          <div class="card-footer">
            <div class="col-2">
              <form method="POST" action="../../../backend/handle-sliders.php">
                <input type="hidden" name="slider_id" value="<?= $sliderId; ?>">
                <input type="hidden" name="img_name" value="<?= $imgName; ?>">

                <input type="hidden" name="script">
                <button name="update" class="btn btn-primary">update</button>
              </form>
            </div>

          </div>
        </form>
      </div>

    </div>


  </div>
  <!-- ./row -->
</section>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->

<?php
include 'assets/footer.php';
?>