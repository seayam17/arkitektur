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
<div class="container-xxl project py-5">
    <div class="container">
        <?php
        $sel = "SELECT * FROM projects ORDER BY pj_id DESC LIMIT 0,1";
        $Q = mysqli_query($con, $sel);
        while ($project = mysqli_fetch_assoc($Q)) {
        ?>
            <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
                <h4 class="section-title"><?= $project['pj_title'] ?></h4>
                <h1 class="display-5 mb-4"><?= $project['pj_subtitle'] ?></h1>
            </div>
        <?php } ?>
        <div class="row g-4 wow fadeInUp" data-wow-delay="0.3s">
            <div class="col-lg-4">
                <div class="nav nav-pills d-flex justify-content-between w-100 h-100 me-4">
                    <?php
                    $i = 1;
                    $j = 1;
                    $sel = "SELECT * FROM projects ORDER BY pj_id DESC LIMIT 0,4";
                    $Q = mysqli_query($con, $sel);
                    while ($project = mysqli_fetch_assoc($Q)) {
                    ?>
                        <button class="nav-link w-100 d-flex align-items-center text-start p-4 mb-4" data-bs-toggle="pill" data-bs-target="#tab-pane-<?= $j++ ?>" type="button">
                            <h3 class="m-0"><?= $i++ ?>. <?= $project['pj_name'] ?></h3>
                        </button>
                    <?php } ?>
                </div>
            </div>
            <div class="col-lg-8">
                <?php
                $j = 1;
                $sel = "SELECT * FROM projects ORDER BY pj_id DESC";
                $Q = mysqli_query($con, $sel);
                while ($project = mysqli_fetch_assoc($Q)) {
                ?>
                    <div class="tab-content w-100">
                        <div class="tab-pane fade" id="tab-pane-<?= $j++ ?>">
                            <div class="row g-4">
                                <div class="col-md-6" style="min-height: 350px;">
                                    <div class="position-relative h-100">
                                        <img class="position-absolute img-fluid w-100 h-100" src="admin/uploads/<?= $project['pj_img'];?>" style="object-fit: cover;" alt="">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <h1 class="mb-3"><?= $project['pj_title1']?></h1>
                                    <p class="mb-4"><?= $project['pj_subtitle1']?></p>
                                    <p><i class="fa fa-check text-primary me-3"></i><?= $project['pj_opt1']?></p>
                                    <p><i class="fa fa-check text-primary me-3"></i><?= $project['pj_opt2']?></p>
                                    <p><i class="fa fa-check text-primary me-3"></i><?= $project['pj_opt3']?></p>
                                    <a href="" class="btn btn-primary py-3 px-5 mt-3"><?= $project['pj_btn']?></a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
            <!-- gg -->
        </div>
    </div>
</div>