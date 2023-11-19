<?php
require_once("functions/function.php");

needLogged();

if ($_SESSION['role'] == 1) {

  get_header();

  get_sidebar();

  $id = $_GET['efc'];
  $sel = "SELECT * FROM facts WHERE fact_id='$id'";
  $Q = mysqli_query($con, $sel);
  $data = mysqli_fetch_assoc($Q);

  if (!empty($_POST)) {
    $fact_title=$_POST['fact_title'];
    $fact_subtitle=$_POST['fact_subtitle'];
    $fact_icon=$_FILES['pic'];
    $imageName = '';

    $update = "UPDATE facts SET fact_title='$fact_title', fact_subtitle='$fact_subtitle' WHERE fact_id='$id'";

    if (mysqli_query($con, $update)) {
      // echo "Successfully update banner information.";
      if ($fact_icon['name'] != '') {
        $imageName = 'fact_' . time() . '_' . rand(100000, 10000000) . '.' . pathinfo($fact_icon['name'], PATHINFO_EXTENSION);
        $updicon = "UPDATE facts SET fact_icon='$imageName' WHERE fact_id='$id'";
        if (mysqli_query($con, $updicon)) {
          move_uploaded_file($fact_icon['tmp_name'], 'uploads/' . $imageName);
          header('Location: view-fact.php?vfc=' . $id);
        } else {
          echo "Fact icon update failed.";
        }
      }
      header('Location: view-fact.php?vfc=' . $id);
    } else {
      echo "Opps! Fact information update failed";
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
                <i class="fab fa-gg-circle"></i>Update Fact Information
              </div>
              <div class="col-md-4 card_button_part">
                <a href="all-fact.php" class="btn btn-sm btn-dark"><i class="fas fa-th"></i>All Fact</a>
              </div>
            </div>
          </div>
          <div class="card-body">
            <div class="row mb-3">
              <label class="col-sm-3 col-form-label col_form_label">Fact Title<span class="req_star">*</span>:</label>
              <div class="col-sm-7">
                <input type="text" class="form-control form_control" id="" name="fact_title" value="<?= $data['fact_title']; ?>">
              </div>
            </div>
            <div class="row mb-3">
              <label class="col-sm-3 col-form-label col_form_label">Fact Subtitle:</label>
              <div class="col-sm-7">
                <input type="text" class="form-control form_control" id="" name="fact_subtitle" value="<?= $data['fact_subtitle']; ?>">
              </div>
            </div>
            <div class="row mb-3">
              <label class="col-sm-3 col-form-label col_form_label">Icon:</label>
              <div class="col-sm-4">
                <input type="file" class="form-control form_control" id="" name="pic">
              </div>
              <div class="col-md-2">
                <?php if ($data['fact_icon'] != '') { ?>
                  <img height="100px" class="img200" src="uploads/<?= $data['fact_icon']; ?>" alt="Fact" />
                <?php } else { ?>
                  <img height="100" class="img200" src="images/avatar.jpg" alt="Fact" />
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
} {
  header('Location: index.php');
}
?>