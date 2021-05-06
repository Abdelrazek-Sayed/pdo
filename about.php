<?php
include 'Assets/navbar.php';

include 'backend/handle-about.php';
$about = about::getAbout()->fetchObject();

?>


<div class="about">
    <div class="container">
        <div class="row">
            <div class="col-md-6 image">
                <img src="uploads/images/about/img2.jpg" class="card-img-top" alt="...">
            </div>
            <div class="col-md-6">

                <h4>About Us</h4>
                <div>
                    <h5>location : </h5>
                    <p><?= $about->location; ?></p>
                </div>
                <div>
                    <h5>Phone : </h5>
                    <p><?= $about->phone; ?></p>
                </div>
                <div>
                    <h5>Email : </h5>
                    <p><?= $about->email; ?></p>
                </div>

            </div>
        </div>
    </div>
</div>



<?php
include 'Assets/footer.php';
?>