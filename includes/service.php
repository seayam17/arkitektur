<?php
$db_name = "arkitektur";
$db_user = "root";
$db_pass = "";
$db_host = "localhost";

$con = mysqli_connect($db_host, $db_user, $db_pass, $db_name);

if (!$con) {
    echo "Database connection error";
}
?>
<div class="container-xxl py-5">
    <div class="container">
        <?php
        $sel = "SELECT * FROM services ORDER BY ser_id DESC LIMIT 0,1";
        $Q = mysqli_query($con, $sel);
        while ($service = mysqli_fetch_assoc($Q)) {
        ?>
            <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
                <h4 class="section-title"><?= $service['ser_title'] ?></h4>
                <h1 class="display-5 mb-4"><?= $service['ser_subtitle'] ?></h1>
            </div>
        <?php } ?>
        <div class="row g-4">
            <?php
            $sel = "SELECT * FROM services ORDER BY ser_id DESC LIMIT 0,6";
            $Q = mysqli_query($con, $sel);
            while ($service = mysqli_fetch_assoc($Q)) {;
            ?>
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="service-item d-flex position-relative text-center h-100">
                        <img class="bg-img" src="admin/uploads/<?= $service['ser_img'] ?>" alt="">
                        <div class="service-text p-5">
                            <img class="mb-4" src="admin/uploads/<?= $service['ser_icon'] ?>" alt="Icon">
                            <h3 class="mb-3"><?= $service['ser_name'] ?></h3>
                            <p class="mb-4"><?= $service['ser_para'] ?></p>
                            <a class="btn" href=""><i class="fa fa-plus text-primary me-3"></i><?= $service['ser_button'] ?></a>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
</div>