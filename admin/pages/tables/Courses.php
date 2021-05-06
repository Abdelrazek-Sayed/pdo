<?php include("assets/navbar.php"); ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Courses</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

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

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">

          <div class="card">
            <div class="card-header">
              
              <a href="../forms/add-course.php" class="btn btn-success">Add Course</a>
            </div>
            <!-- /.card-header -->
            <?php
            include_once("../../../backend/handle-courses.php");
            $courses = courses::getCourses();
            ?>

            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>ID</th>
                    <th>TITLE</th>
                    <th>PRICE</th>
                    <th>IMAGE</th>
                    <th>EDSCRIPTION</th>
                    <th>CATEGORY</th>
                    <th>ACTION</th>

                  </tr>
                </thead>
                <tbody>

                  <?php for ($counter = 1; $course = $courses->fetch(); $counter++) {  ?>
                    <tr>
                      <td><?= $counter; ?></td>
                      <td><?= $course['title']; ?></td>
                      <td><?= $course['price']; ?></td>
                      <td>
                        <img src="../../../uploads/images/course/<?= $course['img']; ?>" style="height:50px; width:80px;">
                      </td>
                      <td><?= substr($course['body'], 0, 50); ?></td>
                      <td><?= $course['catName']; ?></td>
                      <td>


                        <div class="container">
                          <div class="row">
                            <div class="col-6">

                              <form method="POST" action="../../../backend/handle-courses.php" >
                                <input type="hidden" name="course_id" value="<?= $course['id']; ?>">
                                <input type="hidden" name="img" value="<?= $course['img']; ?>">

                                <input type="hidden" name="script">
                                <button type="submit" id="delete" name="delete" class="btn btn-danger">Delete</button>
                              </form>

                            </div>

                            <div class="col-2">

                              <a class="btn btn-ms btn-info"  href="../forms/update-course.php?id=<?= $course['id']; ?>">Update</a>

                            </div>
                          </div>


                      </td>
                    </tr>
                  <?php } ?>
                  </tfoot>
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