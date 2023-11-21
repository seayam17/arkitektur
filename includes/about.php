<?php
  
    $db_name="arkitektur";
    $db_user="root";
    $db_pass="";
    $db_host="localhost";

    $con=mysqli_connect($db_host,$db_user,$db_pass,$db_name);

    if(!$con){
        echo "Database connection error";
    }
?>
<div class="container-xxl py-5">
    <div class="container">
        <div class="row g-5">
            <?php
            $sel = "SELECT * FROM about ORDER BY about_id DESC LIMIT 0,1";
            $Q = mysqli_query($con, $sel);
            $about = mysqli_fetch_assoc($Q);
            ?>
            <div class="col-lg-6 wow fadeIn" data-wow-delay="0.1s">
                <div class="about-img">
                    <img class="img-fluid" src="admin/uploads/<?= $about['about_img1']; ?>" alt="">
                    <img class="img-fluid" src="admin/uploads/<?= $about['about_img2']; ?>" alt="">
                </div>
            </div>
            <div class="col-lg-6 wow fadeIn" data-wow-delay="0.5s">
                <h4 class="section-title"><?= $about['about_title']; ?></h4>
                <h1 class="display-5 mb-4"><?= $about['about_subtitle']; ?></h1>
                <p><?= $about['about_para1']; ?></p>
                <p class="mb-4"><?= $about['about_para2']; ?></p>
                <div class="d-flex align-items-center mb-5">
                    <div class="d-flex flex-shrink-0 align-items-center justify-content-center border border-5 border-primary" style="width: 120px; height: 120px;">
                        <h1 class="display-1 mb-n2" data-toggle="counter-up"><?= $about['about_counter']; ?></h1>
                    </div>
                    <div class="ps-4">
                        <h3><?= $about['about_ctitle1']; ?></h3>
                        <h3><?= $about['about_ctitle2']; ?></h3>
                        <h3 class="mb-0"><?= $about['about_ctitle3']; ?></h3>
                    </div>
                </div>
                <a class="btn btn-primary py-3 px-5" href=""><?= $about['about_button']; ?></a>
            </div>
        </div>
    </div>
</div>