<?php
include 'Assets/navbar.php';

include_once "backend/handle-sliders.php";
$sliders = sliders::getSlider();

?>

<!-- Start Slider Section -->

<div id="carouselExampleFade" class="carousel slide carousel-fade" data-ride="carousel">
    <div class="carousel-inner">
        <?php

        for ($counter = 1; $slider = $sliders->fetchObject(); $counter++) {
            if ($counter == 1) {
        ?>
                <div class="carousel-item active">
                    <img src="uploads/images/slider/<?= $slider->img; ?>" class="d-block w-100" alt="..." height="500px">
                </div>
            <?php } else { ?>

                <div class="carousel-item">
                    <img src="uploads/images/slider/<?= $slider->img; ?>" class="d-block w-100" alt="..." height="500px">
                </div>
        <?php }
        } ?>

    </div>
    <a class="carousel-control-prev" href="#carouselExampleFade" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleFade" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
</div>

<!-- End Slider Section -->

<!-- Start New Courses -->
<div class="new-courses">
    <div class="container">
        <h3> New Courses </h3>
        <br><br>
        <?php

        include_once "backend/handle-courses.php";

        $courses = courses::newCourses();

        while ($course = $courses->fetchObject()) {
        ?>
            <div class="row">
                <div class="course col-md-4">
                    <div class="card" style="width: 18rem;">
                        <img src="uploads/images/course/<?= $course->img; ?>" class="card-img-top" height="150px">
                        <div class="card-body">
                            <h5 class="card-title"><?= $course->title; ?></h5>
                            <p class="card-text"><?= substr($course->body, 0, 49); ?></p>
                        </div>
                        <div class="card-body">

                            <a class="btn btn-primary" href="course-details.php?id=<?= $course->id; ?>">See More</a>
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