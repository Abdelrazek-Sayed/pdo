<?php
session_start();
include 'Assets/navbar.php';
$id = $_GET['id'];
include_once "backend/handle-courses.php";
$course = courses::getCourseId($id)->fetchObject();
?>

<div class="course-details">
    <div class="container">

        <div class="row">

            <div class="col-md-6 image">
                <img src="uploads/images/course/<?= $course->img; ?>" class="card-img-top" style="height:150px; width:300px;">
            </div>

            <div class="col-md-6">
                <h4><?= $course->title; ?></h4>
                <p><?= $course->body; ?></p>


            </div>


        </div>
    </div>
    <hr>

    <div class="container">

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

        <div class="row">
            <div class="col-md-12">

                <form method="POST" action="backend/handle-requests.php">

                    <input type="text" name="name" placeholder="Entre your name "><br><br>
                    <input type="email" name="email" placeholder="Entre your email "><br><br>
                    <input type="phone" name="phone" placeholder="Entre your phone "><br><br>

                    <input type="hidden" name="course_id" value="<?= $course->id; ?>">
                    <button class="btn btn-primary" type="submit" name="add_request">Submit</button>

                </form>
            </div>
        </div>
    </div>
</div>

<?php
include 'Assets/footer.php';
?>