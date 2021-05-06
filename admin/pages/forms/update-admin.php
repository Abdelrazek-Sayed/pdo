<?php
 
include 'assets/navbar.php';


$id = $_GET['admin_id'];


include_once("../../../backend/handle-admins.php");
$admin = admins::getById($id)->fetchObject();

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
            <input type="text" name="name" class="form-control" value="<?= $admin->name; ?>"  >
          </div>
          <div class="form-group">
            <label for="name">Email</label>
            <input type="text" name="email" class="form-control" value="<?= $admin->email; ?>"    >
          </div>
          <div class="form-group">
            <label for="name">Password</label>
            <input type="password" name="password" class="form-control"  >
          </div>
          <div class="form-group">
            <label for="name">Confirm password</label>
            <input type="password" name="confirm_password" class="form-control"  >
          </div>
          <div class="form-group">
            <label for="name">Role</label>
            <?php if ($admin->role == 1) {
              $role = "superAdmin";
            } elseif ($admin->role == 0) {
              $role = "Admin";
            }
            ?>
            <input type="text" name="role" class="form-control" value="<?= $role;?>"  >



          </div>

          <input type="hidden" name="script">
          <input type="hidden" name="admin_id" value="<?= $admin->id; ?>">

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


<?php
include 'assets/footer.php';
?>