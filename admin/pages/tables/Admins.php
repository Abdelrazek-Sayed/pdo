<?php
include("assets/navbar.php");
include("../../../backend/handle-admins.php"); ?>




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
          <h1>Admins</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Admins</li>
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

          <div class="card">
            <div class="card-header">
              <h3 class="card-title">All Admins with CRUD</h3><br>
              <a href="../forms/add-admin.php" class="btn btn-success">Add Admin</a>
            </div>
            <!-- /.card-header -->
            <div class="card-body">

              <table id="database-table">

                <tr>
                  <th>ID</th>
                  <th>Name</th>
                  <th>Email</th>
                  <th>Role</th>
                  <th>Action</th>

                </tr>


                <tr>
                  <?php
                  $admins =  admins::getAdmin();

                  for ($counter = 1; $admin = $admins->fetchObject(); $counter++) {


                  ?>
                    <td><?= $counter; ?></td>
                    <td><?= $admin->name; ?></td>
                    <td><?= $admin->email; ?></td>

                    <?php if ($admin->role == 0) { ?>
                      <td><?= "Admin" ?></td>
                    <?php } elseif ($admin->role == 1) { ?>
                      <td><?= "SuperAdmin" ?></td>
                    <?php } ?>
                    <td>

                      <div class="container">
                        <div class="row">
                          <div class="col-6">
                            <form method="POST" action="../../../backend/handle-admins.php">
                              <input type="hidden" name="admin_id" value="<?= $admin->id; ?>">
                              <input type="hidden" name="script">
                              <button type="submit" name="delete" class="btn btn-danger">Delete</button>
                            </form>
                          </div>
                          <a class="btn btn-info" href="../forms/update-admin.php?admin_id=<?= $admin->id; ?>">Update</a>
                        </div>
                      </div>

                    </td>

                </tr>

              <?php  } ?>
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