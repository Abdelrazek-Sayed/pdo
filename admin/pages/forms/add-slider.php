<?php
include 'assets/navbar.php';
?>
<!-- Main content -->
<section class="content">
  <div class="row">

    <div class="col-md-12">
      <!-- general form elements -->
      <div class="card card-primary">
        <div class="card-header">
          <h3 class="card-title">Add Slider</h3>
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

            </div>

            <div class="card-body">
              <img src="#" id="showImage" alt="">
            </div>
          </div>

          <div class="card-footer">
            <button type="submit" name="add" class="btn btn-primary">Add</button>
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