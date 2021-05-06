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
          <h3 class="card-title">Add Category</h3>
        </div>

        <?php if (isset($_SESSION['msg'])) { ?>
          <div class="alert alert-success">
            <?php echo $_SESSION['msg']; ?>
          </div>
        <?php     }
        unset($_SESSION['msg']); ?>

         <form method="POST" action="../../../backend/handle-category.php">

          <div class="form-group">
            <label for="name">Name</label>
            <input type="text" name="name" class="form-control" id="name" placeholder=" Category Name">
          </div>

          <div class="card-footer">
            <button type="submit" name="create" class="btn btn-primary">Submit</button>
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
