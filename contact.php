<?php
require_once('functions/function.php');

get_header();
?>
<!-- Page Header Start -->
<div class="container-fluid page-header py-5 mb-5 wow fadeIn" style="background: linear-gradient(rgba(0, 0, 0, .5), rgba(0, 0, 0, .5)), url(./img/carousel-1.jpg) center center no-repeat;" data-wow-delay="0.1s">
    <div class="container py-5">
        <h1 class="display-1 text-white animated slideInDown">Contact Us</h1>
        <nav aria-label="breadcrumb animated slideInDown">
            <ol class="breadcrumb text-uppercase mb-0">
                <li class="breadcrumb-item"><a class="text-white" href="#">Home</a></li>
                <li class="breadcrumb-item"><a class="text-white" href="#">Pages</a></li>
                <li class="breadcrumb-item text-primary active" aria-current="page">Contact Us</li>
            </ol>
        </nav>
    </div>
</div>
<!-- Page Header End -->


<!-- Contact Start -->
<div class="container-xxl py-5">
    <div class="container">
        <?php
        $sel = "SELECT * FROM contacts ORDER BY cons_id ASC LIMIT 0,1";
        $Q = mysqli_query($con, $sel);
        while ($contact = mysqli_fetch_assoc($Q)) {
        ?>
            <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
                <h4 class="section-title"><?= $contact['cons_title'] ?></h4>
                <h1 class="display-5 mb-4"><?= $contact['cons_subtitle'] ?></h1>
            </div>
        <?php } ?>
        <div class="row g-5">
            <?php
            $sel = "SELECT * FROM contacts ORDER BY cons_id ASC LIMIT 0,1";
            $Q = mysqli_query($con, $sel);
            while ($contact = mysqli_fetch_assoc($Q)) {
            ?>
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="d-flex flex-column justify-content-between h-100">
                        <div class="bg-light d-flex align-items-center w-100 p-4 mb-4">
                            <div class="d-flex flex-shrink-0 align-items-center justify-content-center bg-dark" style="width: 55px; height: 55px;">
                                <i class="fa fa-map-marker-alt text-primary"></i>
                            </div>
                            <div class="ms-4">
                                <p class="mb-2">Address</p>
                                <h3 class="mb-0"><?= $contact['cons_address'] ?></h3>
                            </div>
                        </div>
                        <div class="bg-light d-flex align-items-center w-100 p-4 mb-4">
                            <div class="d-flex flex-shrink-0 align-items-center justify-content-center bg-dark" style="width: 55px; height: 55px;">
                                <i class="fa fa-phone-alt text-primary"></i>
                            </div>
                            <div class="ms-4">
                                <p class="mb-2">Call Us Now</p>
                                <h3 class="mb-0"><?= $contact['cons_phone'] ?></h3>
                            </div>
                        </div>
                        <div class="bg-light d-flex align-items-center w-100 p-4">
                            <div class="d-flex flex-shrink-0 align-items-center justify-content-center bg-dark" style="width: 55px; height: 55px;">
                                <i class="fa fa-envelope-open text-primary"></i>
                            </div>
                            <div class="ms-4">
                                <p class="mb-2">Mail Us Now</p>
                                <h3 class="mb-0"><?= $contact['cons_email'] ?></h3>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>
            <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.5s">
                <?php
                if (!empty($_POST)) {
                    $name = htmlentities($_POST['name'], ENT_QUOTES);
                    $email = htmlentities($_POST['email'], ENT_QUOTES);
                    $subject = htmlentities($_POST['subject'], ENT_QUOTES);
                    $message = htmlentities($_POST['message'], ENT_QUOTES);

                    $insert = "INSERT INTO contact(con_name,con_email,con_subject,con_message)VALUES('$name','$email','$subject','$message')";

                    if (!empty($name)) {
                        if (mysqli_query($con, $insert)) {
                            echo "Successfuly send your message";
                        }
                    } else {
                        echo "Please enter your name";
                    }
                }
                ?>
                <form method="post" action="">
                    <div class="row g-3">
                        <div class="col-md-6">
                            <div class="form-floating">
                                <input type="text" class="form-control" name="name" id="name" placeholder="Your Name">
                                <label for="name">Your Name</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-floating">
                                <input type="email" class="form-control" name="email" id="email" placeholder="Your Email">
                                <label for="email">Your Email</label>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-floating">
                                <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject">
                                <label for="subject">Subject</label>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-floating">
                                <textarea class="form-control" placeholder="Leave a message here" name="message" id="message" style="height: 100px"></textarea>
                                <label for="message">Message</label>
                            </div>
                        </div>
                        <div class="col-12">
                            <button class="btn btn-primary w-100 py-3" type="submit">Send Message</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- Contact End -->


<!-- Google Map Start -->
<?php
$sel = "SELECT * FROM contacts ORDER BY cons_id ASC LIMIT 0,1";
$Q = mysqli_query($con, $sel);
while ($contact = mysqli_fetch_assoc($Q)) {
?>
    <div class="container-xxl pt-5 px-0 wow fadeIn" data-wow-delay="0.1s">
        <iframe class="w-100 mb-n2" style="height: 450px;" src="<?= $contact['cons_map']?>" frameborder="0" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
    </div>
<?php } ?>
<!-- Google Map End -->
<?php

get_footer();

?>