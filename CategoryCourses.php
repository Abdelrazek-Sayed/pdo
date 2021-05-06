<?php
include 'Assets/navbar.php';
$catId = $_GET['cat_id'];
include_once('backend/handle-category.php');
$cat = category::getById($catId)->fetchObject();


?>


<div class="category">
    <div class="container">
        <h3><?= $cat->name; ?></h3>
        <div class="row">

            <?php

            include_once "backend/handle-courses.php";

            $courses = courses::getCoursesCat($catId);

            $counter = 0;

            while ($course = $courses->fetchObject()) {
                $counter++;
            ?>
                <div class="course col-md-4">
                    <div class="card" style="width: 18rem;">
                        <img src="uploads/images/course/<?= $course->img; ?>" class="card-img-top" height="150px">
                        <div class="card-body">
                            <h5 class="card-title"><?= $course->title; ?></h5>
                            <p class="card-text"><?= substr($course->body, 0, 50); ?></p>
                        </div>
                        <div class="card-body">
                            <a href="course-details.php?id=<?= $course->id; ?>"><button type="button" class="btn btn-primary">See More</button></a>
                        </div>
                    </div>
                </div>

            <?php }

            if ($counter == 0) { ?>
                <div class="alert alert-primary">
                    <p>No courses found </p>
                </div>
            <?php } ?>


        </div>
    </div>
</div>


<?php
include 'Assets/footer.php';
?>