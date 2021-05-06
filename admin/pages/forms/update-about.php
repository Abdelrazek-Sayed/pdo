<?php
include 'Assets/navbar.php';

include_once "../../../backend/handle-about.php";

$about = about::getAbout()->fetchObject();

?>
<!-- Main content -->
<section class="content">
  <div class="row">

    <div class="col-md-12">
      <!-- general form elements -->
      <div class="card card-primary">
        <div class="card-header">
          <h3 class="card-title">Update About</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form method="POST" action="../../../backend/handle-about.php">
          <div class="card-body">
            <div class="form-group">
              <label for="location">Location</label>
              <input type="text" name="location" class="form-control" id="location" value="<?= $about->location; ?>">
            </div>

            <div class="form-group">
              <label for="phone">Phone Number</label>
              <input type="text" name="phone" class="form-control" id="phone" value="<?= $about->phone; ?>">
            </div>

            <div class="form-group">
              <label for="email">Email</label>
              <input type="email" name="email" class="form-control" id="email" value="<?= $about->email; ?>">
            </div>
            <input type="hidden" name="about_id" value="<?= $about->id; ?>">
            <div class="card-footer">
              <button type="submit" name="update" class="btn btn-primary">Update</button>
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
include 'Assets/footer.php';
?>