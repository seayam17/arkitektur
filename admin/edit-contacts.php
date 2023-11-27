<?php
require_once("functions/function.php");

needLogged();

if ($_SESSION['role'] == 1) {

  get_header();

  get_sidebar();

  $id = $_GET['ec'];
  $sel = "SELECT * FROM contacts WHERE cons_id='$id'";
  $Q = mysqli_query($con, $sel);
  $data = mysqli_fetch_assoc($Q);

  if (!empty($_POST)) {
    $cons_title=$_POST['cons_title'];
    $cons_subtitle=$_POST['cons_subtitle'];
    $cons_address=$_POST['cons_address'];
    $cons_phone=$_POST['cons_phone'];
    $cons_email=$_POST['cons_email'];
    $cons_map=$_POST['cons_map'];

    $update = "UPDATE contacts SET cons_title='$cons_title', cons_subtitle='$cons_subtitle', cons_address='$cons_address', cons_phone='$cons_phone', cons_email='$cons_email', cons_map='$cons_map' WHERE cons_id='$id'";

    if (mysqli_query($con, $update)) {
      header('Location: view-contacts.php?vc=' . $id);
    } else {
      echo "Opps! Contacts information update failed";
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
                <i class="fab fa-gg-circle"></i>Update Contacts Information
              </div>
              <div class="col-md-4 card_button_part">
                <a href="all-contacts.php" class="btn btn-sm btn-dark"><i class="fas fa-th"></i>All Contacts</a>
              </div>
            </div>
          </div>
          <div class="card-body">
            <div class="row mb-3">
              <label class="col-sm-3 col-form-label col_form_label">Contact Title<span class="req_star">*</span>:</label>
              <div class="col-sm-7">
                <input type="text" class="form-control form_control" id="" name="cons_title" value="<?= $data['cons_title']; ?>">
              </div>
            </div>
            <div class="row mb-3">
              <label class="col-sm-3 col-form-label col_form_label">Contact Subtitle:</label>
              <div class="col-sm-7">
                <input type="text" class="form-control form_control" id="" name="cons_subtitle" value="<?= $data['cons_subtitle']; ?>">
              </div>
            </div>
            <div class="row mb-3">
              <label class="col-sm-3 col-form-label col_form_label">Contact Address:</label>
              <div class="col-sm-7">
                <input type="text" class="form-control form_control" id="" name="cons_address" value="<?= $data['cons_address']; ?>">
              </div>
            </div>
            <div class="row mb-3">
              <label class="col-sm-3 col-form-label col_form_label">Contact Phone:</label>
              <div class="col-sm-7">
                <input type="text" class="form-control form_control" id="" name="cons_phone" value="<?= $data['cons_phone']; ?>">
              </div>
            </div>
            <div class="row mb-3">
              <label class="col-sm-3 col-form-label col_form_label">Contact Email:</label>
              <div class="col-sm-7">
                <input type="text" class="form-control form_control" id="" name="cons_email" value="<?= $data['cons_email']; ?>">
              </div>
            </div>
            <div class="row mb-3">
              <label class="col-sm-3 col-form-label col_form_label">Contact Map:</label>
              <div class="col-sm-7">
                <textarea type="text" class="form-control form_control" id="" name="cons_map"><?= $data['cons_map']; ?></textarea>
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