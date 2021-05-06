<?php
include 'Assets/navbar.php';
?>


<div class="category">
    <div class="container">
        <h3>Category Course</h3>
        <br>
        <div class="row">
            <?php

            include_once "backend/handle-courses.php";

            $courses = courses::getCourses();

            while ($course = $courses->fetchObject()) {

            ?>
                <div class="course col-md-4">
                    <div class="card" style="width: 18rem;">
                        <img src="uploads/images/course/<?= $course->img; ?>" class="card-img-top" style="height:150px; width:300px;">
                        <div class="card-body">
                            <h5 class="card-title"><?= $course->title; ?></h5>
                            <p class="card-text"><?= substr($course->body, 0, 50); ?></p>
                        </div>
                        <div class="card-body">

                            <a href="course-details.php?id=<?= $course->id; ?>"  class="btn btn-primary">See More</a>
                        </div>
                    </div>
                </div>
            <?php } ?>


        </div>
    </div>
</div>




<?php
include 'Assets/footer.php';
?>