<?php
 
include 'Assets/navbar.php';


$id = $_GET['id'];


include '../../../backend/handle-courses.php';
$course = courses::getCourseId($id)->fetchObject();


require_once("../../../backend/handle-category.php");
$cats = category::all();
?>

<?php if (isset($_SESSION['msg'])) { ?>
  <div class="alert alert-success">

    <?php echo $_SESSION['msg']; ?>
  </div>
<?php   }
unset($_SESSION['msg']); ?>

<?php if (isset($_SESSION['error'])) { ?>
  <div class="alert alert-danger">

    <?php echo $_SESSION['error']; ?>
  </div>
<?php     }
unset($_SESSION['error']); ?>



<!-- Main content -->
<section class="content">
  <div class="row">

    <div class="col-md-12">
      <!-- general form elements -->
      <div class="card card-primary">
        <div class="card-header">
          <h3 class="card-title">Edit Course</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form method="POST" action="../../../backend/handle-courses.php" enctype="multipart/form-data">
          <div class="card-body">
            <div class="form-group">
              <label for="title">Course Title</label>
              <input type="text" name="title" class="form-control" id="title" value="<?= $course->title; ?>">
            </div>

            <div class="form-group">
              <label for="price">Course Price</label>
              <input type="text" name="price" class="form-control" id="price" value="<?= $course->price; ?>">
            </div>




            <!-- /.card-header -->
            <div class="input-group">
              <div class="input-group-prepend">
                <span class="input-group-text">Body</span>
              </div>
              <textarea class="form-control" name="body" aria-label="With textarea"><?= $course->body; ?></textarea>
            </div>



          </div> <!-- /.card-body -->
          <div class="input-group mb-3  col-6">

            <div class="input-group-prepend">
              <label class="input-group-text" for="inputGroupSelect01">Options</label>
            </div>


            <select class="custom-select" id="inputGroupSelect01" name="cat_id">
              <option selected>Select Category</option>
              <?php
              while ($cat = $cats->fetchObject()) {
              ?>
                <option <?php if ($cat->id == $course->cat_id) {
                          echo "selected";
                        } ?> value="<?= $cat->id; ?>"> <?= $cat->name; ?></option>
              <?php } ?>

            </select>
            <input type="hidden" name="script">
            <input type="hidden" name="img_old_name" value="<?= $course->img; ?>">
            <input type="hidden" name="course_id" value="<?= $course->id; ?>">
          </div>

          <div class="form-group col-6">
            <label for="exampleInputFile">Image</label>
            <div class="input-group">
              <div class="custom-file">
                <input type="file" name="img" class="custom-file-input" onchange="readURL(this);" id="exampleInputFile">
                <label class="custom-file-label" for="exampleInputFile">Choose Image</label>
              </div>

            </div>

            <div class="card-body">
            <img src="../../../uploads/images/course/<?= $course->img; ?>" id="showImage"  style="height:150px; width:300px">
               
            </div>
          </div>
          <div class="card-footer">

            <button type="submit" name="update" class="btn btn-primary">update</button>
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