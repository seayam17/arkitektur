<?php
require_once("functions/function.php");

needLogged();

if ($_SESSION['role'] == 1) {

  get_header();

  get_sidebar();

  if (!empty($_POST)) {
    $ser_title = $_POST['ser_title'];
    $ser_subtitle = $_POST['ser_subtitle'];
    $ser_name = $_POST['ser_name'];
    $ser_para = $_POST['ser_para'];
    $ser_button = $_POST['ser_btn'];
    $ser_image = $_FILES['pic'];
    $ser_icon = $_FILES['ser_icon'];
    $imageName = '';
    $iconName = '';

    if ($ser_image['name'] != '') {
      $imageName = 'service_' . time() . '_' . rand(100000, 10000000) . '.' . pathinfo($ser_image['name'], PATHINFO_EXTENSION);
    }
    if ($ser_icon['name'] != '') {
      $iconName = 'service_' . time() . '_' . rand(100000, 10000000) . '.' . pathinfo($ser_icon['name'], PATHINFO_EXTENSION);
    }

    $insert = "INSERT INTO services(ser_title,ser_subtitle,ser_name,ser_para,ser_button,ser_img,ser_icon)VALUES('$ser_title','$ser_subtitle','$ser_name','$ser_para','$ser_button','$imageName','$iconName')";

    if (!empty($ser_title)) {
      if (mysqli_query($con, $insert)) {
        move_uploaded_file($ser_image['tmp_name'], 'uploads/' . $imageName);
        move_uploaded_file($ser_icon['tmp_name'], 'uploads/' . $iconName);
        echo "Service img upload success";
      } else {
        echo "Service img upload failed";
      }
    } else {
      echo "Please enter service title";
    }
  }
?>
  <div class="row">
    <div class="col-md-12 ">
      <form method="post" action="" enctype="multipart/form-data">
        <div class="card mb-3">
          <div class="card-header">
            <div class="row">
              <div class="col-md-8 card_title_part">
                <i class="fab fa-gg-circle"></i>Add Service Information
              </div>
              <div class="col-md-4 card_button_part">
                <a href="all-service.php" class="btn btn-sm btn-dark"><i class="fas fa-th"></i>All Service</a>
              </div>
            </div>
          </div>
          <div class="card-body">
            <div class="row mb-3">
              <label class="col-sm-3 col-form-label col_form_label">Service Title<span class="req_star">*</span>:</label>
              <div class="col-sm-7">
                <input type="text" class="form-control form_control" id="" name="ser_title">
              </div>
            </div>
            <div class="row mb-3">
              <label class="col-sm-3 col-form-label col_form_label">Service Subtitle:</label>
              <div class="col-sm-7">
                <input type="text" class="form-control form_control" id="" name="ser_subtitle">
              </div>
            </div>
            <div class="row mb-3">
              <label class="col-sm-3 col-form-label col_form_label">Service Name:</label>
              <div class="col-sm-7">
                <input type="text" class="form-control form_control" id="" name="ser_name">
              </div>
            </div>
            <div class="row mb-3">
              <label class="col-sm-3 col-form-label col_form_label">Service Paragraph:</label>
              <div class="col-sm-7">
                <input type="text" class="form-control form_control" id="" name="ser_para">
              </div>
            </div>
            <div class="row mb-3">
              <label class="col-sm-3 col-form-label col_form_label">Service Button<span class="req_star">*</span>:</label>
              <div class="col-sm-7">
                <input type="text" class="form-control form_control" id="" name="ser_btn">
              </div>
            </div>
            <div class="row mb-3">
              <label class="col-sm-3 col-form-label col_form_label">Service Image:</label>
              <div class="col-sm-4">
                <input type="file" class="form-control form_control" id="" name="pic">
              </div>
            </div>
            <div class="row mb-3">
              <label class="col-sm-3 col-form-label col_form_label">Service Icon:</label>
              <div class="col-sm-4">
                <input type="file" class="form-control form_control" id="" name="ser_icon">
              </div>
            </div>
          </div>
          <div class="card-footer text-center">
            <button type="submit" class="btn btn-sm btn-dark">UPLOAD</button>
          </div>
        </div>
      </form>
    </div>
  </div>

<?php

  get_footer();
} else {
  header('Location: index.php');
}
?>