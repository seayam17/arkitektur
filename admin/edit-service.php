<?php
require_once("functions/function.php");

needLogged();

if ($_SESSION['role'] == 1) {

  get_header();

  get_sidebar();

  $id = $_GET['es'];
  $sel = "SELECT * FROM services WHERE ser_id='$id'";
  $Q = mysqli_query($con, $sel);
  $data = mysqli_fetch_assoc($Q);

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

    $update = "UPDATE services SET ser_title='$ser_title', ser_subtitle='$ser_subtitle', ser_name='$ser_name', ser_para='$ser_para',  ser_button='$ser_button' WHERE ser_id='$id'";

    if (mysqli_query($con, $update)) {
      // echo "Successfully update banner information.";
      if ($ser_image['name'] != '') {
        $imageName = 'service_' . time() . '_' . rand(100000, 10000000) . '.' . pathinfo($ser_image['name'], PATHINFO_EXTENSION);
        $updimg = "UPDATE services SET ser_img='$imageName' WHERE ser_id='$id'";
        if (mysqli_query($con, $updimg)) {
          move_uploaded_file($ser_image['tmp_name'], 'uploads/' . $imageName);
          header('Location: view-service.php?vs=' . $id);
        } else {
          echo "Service image update failed.";
        }
      }
      if ($ser_icon['name'] != '') {
        $iconName = 'service_' . time() . '_' . rand(100000, 10000000) . '.' . pathinfo($ser_icon['name'], PATHINFO_EXTENSION);
        $updicon = "UPDATE services SET ser_icon='$iconName' WHERE ser_id='$id'";
        if (mysqli_query($con, $updicon)) {
          move_uploaded_file($ser_icon['tmp_name'], 'uploads/' . $iconName);
          header('Location: view-service.php?vs=' . $id);
        } else {
          echo "Service icon update failed.";
        }
      }
      header('Location: view-service.php?vs=' . $id);
    } else {
      echo "Opps! Service information update failed";
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
                <i class="fab fa-gg-circle"></i>Update Service Information
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
                <input type="text" class="form-control form_control" id="" name="ser_title" value="<?= $data['ser_title']; ?>">
              </div>
            </div>
            <div class="row mb-3">
              <label class="col-sm-3 col-form-label col_form_label">Service Subtitle:</label>
              <div class="col-sm-7">
                <input type="text" class="form-control form_control" id="" name="ser_subtitle" value="<?= $data['ser_subtitle']; ?>">
              </div>
            </div>
            <div class="row mb-3">
              <label class="col-sm-3 col-form-label col_form_label">Service Name:</label>
              <div class="col-sm-7">
                <input type="text" class="form-control form_control" id="" name="ser_name" value="<?= $data['ser_name']; ?>">
              </div>
            </div>
            <div class="row mb-3">
              <label class="col-sm-3 col-form-label col_form_label">Service Paragraph:</label>
              <div class="col-sm-7">
                <input type="text" class="form-control form_control" id="" name="ser_para" value="<?= $data['ser_para']; ?>">
              </div>
            </div>
            <div class="row mb-3">
              <label class="col-sm-3 col-form-label col_form_label">Service Button:</label>
              <div class="col-sm-7">
                <input type="text" class="form-control form_control" id="" name="ser_btn" value="<?= $data['ser_button']; ?>">
              </div>
            </div>
            <div class="row mb-3">
              <label class="col-sm-3 col-form-label col_form_label">Service Image:</label>
              <div class="col-sm-4">
                <input type="file" class="form-control form_control" id="" name="pic">
              </div>
              <div class="col-md-2">
                <?php if ($data['ser_img'] != '') { ?>
                  <img height="100px" class="img200" src="uploads/<?= $data['ser_img']; ?>" alt="Service" />
                <?php } else { ?>
                  <img height="100" class="img200" src="images/avatar.jpg" alt="Service" />
                <?php } ?>
              </div>
            </div>
            <div class="row mb-3">
              <label class="col-sm-3 col-form-label col_form_label">Service Icon:</label>
              <div class="col-sm-4">
                <input type="file" class="form-control form_control" id="" name="ser_icon">
              </div>
              <div class="col-md-2">
                <?php if ($data['ser_icon'] != '') { ?>
                  <img height="50px" class="img200" src="uploads/<?= $data['ser_icon']; ?>" alt="Service" />
                <?php } else { ?>
                  <img height="100" class="img200" src="images/avatar.jpg" alt="Service" />
                <?php } ?>
              </div>
            </div>
          </div>
          <div class="card-footer text-center">
            <button type="submit" class="btn btn-sm btn-dark">UPDATE</button>
          </div>
        </div>
      </form>
    </div>
  </div>

<?php

  get_footer();
} else{
  header('Location: index.php');
}
?>