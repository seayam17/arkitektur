<?php
require_once("functions/function.php");

needLogged();

if ($_SESSION['role'] == 1) {

  get_header();

  get_sidebar();

  $id = $_GET['eb'];
  $selb = "SELECT * FROM banners WHERE ban_id='$id'";
  $Qb = mysqli_query($con, $selb);
  $data = mysqli_fetch_assoc($Qb);

  if (!empty($_POST)) {
    $title = $_POST['title'];
    $subtitle = $_POST['subtitle'];
    $button = $_POST['btn'];
    $image = $_FILES['pic'];
    $imageName = '';

    $update = "UPDATE banners SET ban_title='$title', ban_subtitle='$subtitle', ban_button='$button' WHERE ban_id='$id'";

    if (mysqli_query($con, $update)) {
      // echo "Successfully update banner information.";
      if ($image['name'] != '') {
        $imageName = 'banner_' . time() . '_' . rand(100000, 10000000) . '.' . pathinfo($image['name'], PATHINFO_EXTENSION);
        $updimg = "UPDATE banners SET ban_image='$imageName' WHERE ban_id='$id'";
        if (mysqli_query($con, $updimg)) {
          move_uploaded_file($image['tmp_name'], 'uploads/' . $imageName);
          header('Location: view-banner.php?vb=' . $id);
        } else {
          echo "User image update failed.";
        }
      }
      header('Location: view-banner.php?vb=' . $id);
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
                <i class="fab fa-gg-circle"></i>Update Banner Information
              </div>
              <div class="col-md-4 card_button_part">
                <a href="all-banner.php" class="btn btn-sm btn-dark"><i class="fas fa-th"></i>All Banner</a>
              </div>
            </div>
          </div>
          <div class="card-body">
            <div class="row mb-3">
              <label class="col-sm-3 col-form-label col_form_label">Title<span class="req_star">*</span>:</label>
              <div class="col-sm-7">
                <input type="text" class="form-control form_control" id="" name="title" value="<?= $data['ban_title']; ?>">
              </div>
            </div>
            <div class="row mb-3">
              <label class="col-sm-3 col-form-label col_form_label">Subtitle:</label>
              <div class="col-sm-7">
                <input type="text" class="form-control form_control" id="" name="subtitle" value="<?= $data['ban_subtitle']; ?>">
              </div>
            </div>
            <div class="row mb-3">
              <label class="col-sm-3 col-form-label col_form_label">Button:</label>
              <div class="col-sm-7">
                <input type="text" class="form-control form_control" id="" name="btn" value="<?= $data['ban_button']; ?>">
              </div>
            </div>
            <div class="row mb-3">
              <label class="col-sm-3 col-form-label col_form_label">Image:</label>
              <div class="col-sm-4">
                <input type="file" class="form-control form_control" id="" name="pic">
              </div>
              <div class="col-md-2">
                <?php if ($data['ban_image'] != '') { ?>
                  <img height="100px" class="img200" src="uploads/<?= $data['ban_image']; ?>" alt="Banner" />
                <?php } else { ?>
                  <img height="100" class="img200" src="images/avatar.jpg" alt="Banner" />
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