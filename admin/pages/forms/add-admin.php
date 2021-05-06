<?php

include 'assets/navbar.php';
?>
<!-- Main content -->
<section class="content">


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
  <div class="row">




    <div class="col-md-8">
      <!-- general form elements -->
      <div class="card card-primary">
        <div class="card-header">
          <h3 class="card-title">Add Admin</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form method="POST" action="../../../backend/handle-admins.php">

          <div class="form-group">
            <label for="name">Name</label>
            <input type="text" name="name" class="form-control" placeholder="Name" required>
          </div>
          <div class="form-group">
            <label for="name">Email</label>
            <input type="text" name="email" class="form-control" placeholder="Email" required>
          </div>
          <div class="form-group">
            <label for="name">Password</label>
            <input type="password" name="password" class="form-control" required>
          </div>
          <div class="form-group">
            <label for="name">Confirm password</label>
            <input type="password" name="confirm_password" class="form-control" required>
          </div>
          <div class="form-group">
            <label for="name">Role</label>

            <select class="form-control" aria-label="Default select example" name="role" required>
        
              <option value="0">Admin</option>
              <option value="1">SuperAdmin</option>
            </select>
          </div>

          <input type="hidden" name="script">

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


<?php
include 'assets/footer.php';
?>