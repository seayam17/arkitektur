<?php
require_once('functions/function.php');

get_header();
?>
<!-- Carousel Start -->
<div class="container-fluid p-0 pb-5 wow fadeIn" data-wow-delay="0.1s">
    <div class="owl-carousel header-carousel position-relative">
        <?php
        $selb = "SELECT * FROM banners ORDER BY ban_id DESC LIMIT 0,3";
        $Qb = mysqli_query($con, $selb);
        while ($banner = mysqli_fetch_assoc($Qb)) {
        ?>
            <div class="owl-carousel-item position-relative" data-dot="<img src='admin/uploads/<?= $banner['ban_image']; ?>'>">
                <img class="img-fluid" src="admin/uploads/<?= $banner['ban_image']; ?>" alt="">
                <div class="owl-carousel-inner">
                    <div class="container">
                        <div class="row justify-content-start">
                            <div class="col-10 col-lg-8">
                                <h1 class="display-1 text-white animated slideInDown"><?= $banner['ban_title']; ?></h1>
                                <p class="fs-5 fw-medium text-white mb-4 pb-3"><?= $banner['ban_subtitle']; ?></p>
                                <a href="" class="btn btn-primary py-3 px-5 animated slideInLeft"><?= $banner['ban_button']; ?></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>
</div>
<!-- Carousel End -->

<!-- Facts Start -->
<div class="container-xxl py-5">
    <div class="container pt-5">
        <div class="row g-4">
            <?php
            $sel = "SELECT * FROM facts ORDER BY fact_id DESC LIMIT 0,3";
            $Q = mysqli_query($con, $sel);
            while ($fact = mysqli_fetch_assoc($Q)) {
            ?>
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="fact-item text-center bg-light h-100 p-5 pt-0">
                        <div class="fact-icon">
                            <img src="admin/uploads/<?= $fact['fact_icon']; ?>" alt="Icon">
                        </div>
                        <h3 class="mb-3"><?= $fact['fact_title']; ?></h3>
                        <p class="mb-0"><?= $fact['fact_subtitle']; ?></p>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
</div>
<!-- Facts End -->
<?php
get_about();

get_service();

get_project();

get_team();

get_footer();
?>