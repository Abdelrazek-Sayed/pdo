<?php
 
include 'assets/navbar.php';

$id = $_GET['cat_id'];

include_once("../../../backend/handle-category.php");
$cat = category::getById($id)->fetch();

?>
<!-- Main content -->
<section class="content">
  <div class="row">

    <div class="col-md-12">
      <!-- general form elements -->
      <div class="card card-primary">
        <div class="card-header">
          <h3 class="card-title">Update Category</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->



        <form method="POST" action="../../../backend/handle-category.php">
        
          <div class="form-group">
            <label for="name">Name</label>
            <input type="text" name="name" class="form-control" value="<?= $cat['name']; ?>">
          </div>

          <div class="card-footer">
            <form method="POST" action="../../../backend/handle-category.php">
              <!-- hidden input more secure -->
              <input type="hidden" name="cat_id" value="<?= $cat['id']; ?>">
              <!-- honey pot -->
              <input type="hidden" name="script">
              <button type="submit" name="update" class="btn btn-info">Update</button>
            </form>
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