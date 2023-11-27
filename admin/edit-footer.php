<?php
require_once("functions/function.php");

needLogged();

if ($_SESSION['role'] == 1) {

  get_header();

  get_sidebar();

  $id = $_GET['ef'];
  $sel = "SELECT * FROM footers WHERE f_id='$id'";
  $Q = mysqli_query($con, $sel);
  $data = mysqli_fetch_assoc($Q);

  if (!empty($_POST)) {
    $f_title=$_POST['f_title'];
    $f_address=$_POST['f_address'];
    $f_phone=$_POST['f_phone'];
    $f_email=$_POST['f_email'];
    $f_icon1=$_POST['f_icon1'];
    $f_icon2=$_POST['f_icon2'];
    $f_icon3=$_POST['f_icon3'];
    $f_icon4=$_POST['f_icon4'];

    $update = "UPDATE footers SET f_title='$f_title', f_address='$f_address', f_phone='$f_phone', f_email='$f_email', f_icon1='$f_icon1', f_icon2='$f_icon2', f_icon3='$f_icon3', f_icon4='$f_icon4' WHERE f_id='$id'";

    if (mysqli_query($con, $update)) {
      header('Location: view-footer.php?vf=' . $id);
    } else {
      echo "Opps! User information update failed";
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
                <i class="fab fa-gg-circle"></i>Update Footer Information
              </div>
              <div class="col-md-4 card_button_part">
                <a href="all-footer.php" class="btn btn-sm btn-dark"><i class="fas fa-th"></i>All Footer</a>
              </div>
            </div>
          </div>
          <div class="card-body">
            <div class="row mb-3">
              <label class="col-sm-3 col-form-label col_form_label">Footer Title<span class="req_star">*</span>:</label>
              <div class="col-sm-7">
                <input type="text" class="form-control form_control" id="" name="f_title" value="<?= $data['f_title']; ?>">
              </div>
            </div>
            <div class="row mb-3">
              <label class="col-sm-3 col-form-label col_form_label">Footer Address<span class="req_star">*</span>:</label>
              <div class="col-sm-7">
                <input type="text" class="form-control form_control" id="" name="f_address" value="<?= $data['f_address']; ?>">
              </div>
            </div>
            <div class="row mb-3">
              <label class="col-sm-3 col-form-label col_form_label">Footer Phone<span class="req_star">*</span>:</label>
              <div class="col-sm-7">
                <input type="text" class="form-control form_control" id="" name="f_phone" value="<?= $data['f_phone']; ?>">
              </div>
            </div>
            <div class="row mb-3">
              <label class="col-sm-3 col-form-label col_form_label">Footer Email<span class="req_star">*</span>:</label>
              <div class="col-sm-7">
                <input type="email" class="form-control form_control" id="" name="f_email" value="<?= $data['f_email']; ?>">
              </div>
            </div>
            <div class="row mb-3">
              <label class="col-sm-3 col-form-label col_form_label">Footer Icon1<span class="req_star">*</span>:</label>
              <div class="col-sm-7">
                <input type="text" class="form-control form_control" id="" name="f_icon1" value="<?= $data['f_icon1']; ?>">
              </div>
            </div>
            <div class="row mb-3">
              <label class="col-sm-3 col-form-label col_form_label">Footer Icon2<span class="req_star">*</span>:</label>
              <div class="col-sm-7">
                <input type="text" class="form-control form_control" id="" name="f_icon2" value="<?= $data['f_icon2']; ?>">
              </div>
            </div>
            <div class="row mb-3">
              <label class="col-sm-3 col-form-label col_form_label">Footer Icon3<span class="req_star">*</span>:</label>
              <div class="col-sm-7">
                <input type="text" class="form-control form_control" id="" name="f_icon3" value="<?= $data['f_icon3']; ?>">
              </div>
            </div>
            <div class="row mb-3">
              <label class="col-sm-3 col-form-label col_form_label">Footer Icon4<span class="req_star">*</span>:</label>
              <div class="col-sm-7">
                <input type="text" class="form-control form_control" id="" name="f_icon4" value="<?= $data['f_icon4']; ?>">
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