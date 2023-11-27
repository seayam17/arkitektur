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
        $sel = "SELECT * FROM teams ORDER BY tm_id DESC LIMIT 0,1";
        $Q = mysqli_query($con, $sel);
        while ($team = mysqli_fetch_assoc($Q)) {
        ?>
            <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
                <h4 class="section-title"><?= $team['tm_title'] ?></h4>
                <h1 class="display-5 mb-4"><?= $team['tm_subtitle'] ?></h1>
            </div>
        <?php } ?>
        <div class="row g-0 team-items">
            <?php
            $sel = "SELECT * FROM teams ORDER BY tm_id ASC LIMIT 0,4";
            $Q = mysqli_query($con, $sel);
            while ($team = mysqli_fetch_assoc($Q)) {
            ?>
                <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="team-item position-relative">
                        <div class="position-relative">
                            <img class="img-fluid" src="admin/uploads/<?= $team['tm_img']?>" alt="">
                            <div class="team-social text-center">
                                <a class="btn btn-square" href=""><i class="<?= $team['tm_icon1']?>"></i></a>
                                <a class="btn btn-square" href=""><i class="<?= $team['tm_icon2']?>"></i></a>
                                <a class="btn btn-square" href=""><i class="<?= $team['tm_icon3']?>"></i></a>
                            </div>
                        </div>
                        <div class="bg-light text-center p-4">
                            <h3 class="mt-2"><?= $team['tm_name']?></h3>
                            <span class="text-primary"><?= $team['tm_desig']?></span>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
</div>