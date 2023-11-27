<?php
require_once("functions/function.php");

needLogged();

if ($_SESSION['role'] == 1) {

  get_header();

  get_sidebar();

  $id = $_GET['et'];
  $sel = "SELECT * FROM teams WHERE tm_id='$id'";
  $Q = mysqli_query($con, $sel);
  $data = mysqli_fetch_assoc($Q);

  if (!empty($_POST)) {
    $tm_title=$_POST['tm_title'];
    $tm_subtitle=$_POST['tm_subtitle'];
    $tm_name=$_POST['tm_name'];
    $tm_desig=$_POST['tm_desig'];
    $tm_icon1=$_POST['tm_icon1'];
    $tm_icon2=$_POST['tm_icon2'];
    $tm_icon3=$_POST['tm_icon3'];
    $tm_img=$_FILES['pic'];
    $imageName='';

    $update = "UPDATE teams SET tm_title='$tm_title', tm_subtitle='$tm_subtitle', tm_name='$tm_name', tm_desig='$tm_desig', tm_icon1='$tm_icon1', tm_icon2='$tm_icon2', tm_icon3='$tm_icon3' WHERE tm_id='$id'";

    if (mysqli_query($con, $update)) {
      // echo "Successfully update banner information.";
      if ($tm_img['name'] != '') {
        $imageName = 'team_' . time() . '_' . rand(100000, 10000000) . '.' . pathinfo($tm_img['name'], PATHINFO_EXTENSION);
        $updimg = "UPDATE teams SET tm_img='$imageName' WHERE tm_id='$id'";
        if (mysqli_query($con, $updimg)) {
          move_uploaded_file($tm_img['tmp_name'], 'uploads/' . $imageName);
          header('Location: view-team.php?vt=' . $id);
        } else {
          echo "Team image update failed.";
        }
      }
      header('Location: view-team.php?vt=' . $id);
    } else {
      echo "Opps! Team information update failed";
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
                <i class="fab fa-gg-circle"></i>Update Team Information
              </div>
              <div class="col-md-4 card_button_part">
                <a href="all-team.php" class="btn btn-sm btn-dark"><i class="fas fa-th"></i>All Team</a>
              </div>
            </div>
          </div>
          <div class="card-body">
            <div class="row mb-3">
              <label class="col-sm-3 col-form-label col_form_label">Team Title<span class="req_star">*</span>:</label>
              <div class="col-sm-7">
                <input type="text" class="form-control form_control" id="" name="tm_title" value="<?= $data['tm_title']; ?>">
              </div>
            </div>
            <div class="row mb-3">
              <label class="col-sm-3 col-form-label col_form_label">Team Subtitle:</label>
              <div class="col-sm-7">
                <input type="text" class="form-control form_control" id="" name="tm_subtitle" value="<?= $data['tm_subtitle']; ?>">
              </div>
            </div>
            <div class="row mb-3">
              <label class="col-sm-3 col-form-label col_form_label">Team Name:</label>
              <div class="col-sm-7">
                <input type="text" class="form-control form_control" id="" name="tm_name" value="<?= $data['tm_name']; ?>">
              </div>
            </div>
            <div class="row mb-3">
              <label class="col-sm-3 col-form-label col_form_label">Team Designation:</label>
              <div class="col-sm-7">
                <input type="text" class="form-control form_control" id="" name="tm_desig" value="<?= $data['tm_desig']; ?>">
              </div>
            </div>
            <div class="row mb-3">
              <label class="col-sm-3 col-form-label col_form_label">Team Icon1:</label>
              <div class="col-sm-7">
                <input type="text" class="form-control form_control" id="" name="tm_icon1" value="<?= $data['tm_icon1']; ?>">
              </div>
            </div>
            <div class="row mb-3">
              <label class="col-sm-3 col-form-label col_form_label">Team Icon2:</label>
              <div class="col-sm-7">
                <input type="text" class="form-control form_control" id="" name="tm_icon2" value="<?= $data['tm_icon2']; ?>">
              </div>
            </div>
            <div class="row mb-3">
              <label class="col-sm-3 col-form-label col_form_label">Team Icon3:</label>
              <div class="col-sm-7">
                <input type="text" class="form-control form_control" id="" name="tm_icon3" value="<?= $data['tm_icon3']; ?>">
              </div>
            </div>
            <div class="row mb-3">
              <label class="col-sm-3 col-form-label col_form_label">Team Image:</label>
              <div class="col-sm-4">
                <input type="file" class="form-control form_control" id="" name="pic">
              </div>
              <div class="col-md-2">
                <?php if ($data['tm_img'] != '') { ?>
                  <img height="100px" class="img200" src="uploads/<?= $data['tm_img']; ?>" alt="Team" />
                <?php } else { ?>
                  <img height="100" class="img200" src="images/avatar.jpg" alt="Team" />
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