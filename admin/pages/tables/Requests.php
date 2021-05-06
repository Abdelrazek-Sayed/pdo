<?php include("assets/navbar.php");

include '../../../backend/handle-requests.php';
$requests = requests::getRequests();

?>



<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Requests</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Requests</li>
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
            <!-- <div class="card-header">
              <h3 class="card-title">All Requests with CRUD</h3><br>
                  <a href="../forms/add-request.php" class="btn btn-success">Add Requests</a>
              </div> -->


            <!-- /.card-header -->
            <div class="card-body">
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


              <table id="database-table">
                <tr>
                  <th>ID</th>
                  <th>Name</th>
                  <th>Email</th>
                  <th>PHone</th>
                  <th>Course</th>
                  <th>Status</th>
                  <th>Action</th>
                </tr>

                <?php for ($counter = 1; $request = $requests->fetchObject(); $counter++) { ?>
                  <tr>
                    <td><?= $counter; ?></td>
                    <td><?= $request->name; ?></td>
                    <td><?= $request->email; ?></td>
                    <td><?= $request->phone; ?></td>
                    <td><?= $request->courseName; ?></td>
                    <?php if ($request->status == 0) { ?>
                      <td>
                        <form method="POST" action="../../../backend/handle-requests.php">
                          <!-- <input type="hidden" name="request_id" value="<? //= $request->status;
                                                                              ?>"> -->
                          <input type="hidden" name="request_id" value="<?= $request->id; ?>">
                          <button type="submit" name="accept" class="btn btn-success">Accept</button>

                        </form>
                      </td>
                    <?php   } else {   ?>
                      <td>
                        <p>Accepted</p>
                      </td>
                    <?php  } ?>



                    <td>

                      <div class="container">
                        <div class="row">
                          <div class="col-6">
                            <form method="POST" action="../../../backend/handle-requests.php">
                              <input type="hidden" name="request_id" value="<?= $request->id; ?>">
                              <!-- <input type="hidden" name="img_name" value="<//?= $slider->img;?>"> -->

                              <input type="hidden" name="script">
                              <button name="delete" class="btn btn-danger">Delete</button>
                            </form>
                          </div>
                        </div>
                      </div>
                      <!-- <a href="#" class="btn btn-danger">Delete</a> -->

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

<?php
include("assets/footer.php");



?>