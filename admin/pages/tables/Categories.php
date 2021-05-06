<?php include("assets/navbar.php");
require_once("../../../backend/conn.php");

include_once("../../../backend/handle-category.php");
$cats = category::all();

?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->

  <!-- msg  -->
  <?php if (isset($_SESSION['msg'])) { ?>
    <div class="alert alert-success">
      <?php echo $_SESSION['msg']; ?>
    </div>
  <?php     }
  unset($_SESSION['msg']); ?>
  <!-- error  -->
  <?php if (isset($_SESSION['error'])) { ?>
    <div class="alert alert-success">

      <?php echo $_SESSION['error']; ?>
    </div>
  <?php     }
  unset($_SESSION['error']); ?>


  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Categories</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Categories</li>
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
              <h3 class="card-title">All Categories with CRUD</h3><br>
              <a href="../forms/add-category.php" class="btn btn-success">Add Category</a>
            </div>




            <!-- /.card-header -->
            <div class="card-body">

              <table id="database-table">
                <tr>
                  <th>ID</th>
                  <th>name</th>
                  <th>Action</th>
                </tr>



                <?php
                $i = 1;
                while ($cat = $cats->fetch()) {  ?>
                  <tr>
                    <td><?= $i++; ?></td>

                    <td><?= $cat['name']; ?></td>

                    <!-- <td><a href="#" class="btn btn-danger">Delete</a></td> -->
                    <td>
                      <div class="container">
                        <div class="row">
                          <div class="col-6">

                            <form method="POST" action="../../../backend/handle-category.php">
                              <!-- hidden input more secure -->
                              <input type="hidden" name="cat_id" value="<?= $cat['id']; ?>">
                              <!-- honey pot -->
                              <input type="hidden" name="script">
                              <button type="submit" name="delete" class="btn btn-danger">Delete</button>

                            </form>

                          </div>

                          <div class="col-2">
                            <a class="btn btn-ms btn-info" href="../forms/update-category.php?cat_id=<?= $cat['id']; ?>">Update</a>
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