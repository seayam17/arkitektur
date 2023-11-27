<?php
require_once("functions/function.php");

needLogged();

if ($_SESSION['role'] == 1) {

  get_header();

  get_sidebar();

  $id = $_GET['ep'];
  $sel = "SELECT * FROM projects WHERE pj_id='$id'";
  $Q = mysqli_query($con, $sel);
  $data = mysqli_fetch_assoc($Q);

  if (!empty($_POST)) {
    $pj_title=$_POST['pj_title'];
    $pj_subtitle=$_POST['pj_subtitle'];
    $pj_name=$_POST['pj_name'];
    $pj_title1=$_POST['pj_title1'];
    $pj_subtitle1=$_POST['pj_subtitle1'];
    $pj_opt1=$_POST['pj_opt1'];
    $pj_opt2=$_POST['pj_opt2'];
    $pj_opt3=$_POST['pj_opt3'];
    $pj_btn=$_POST['pj_btn'];
    $pj_img=$_FILES['pic'];
    $imageName='';

    $update = "UPDATE projects SET pj_title='$pj_title', pj_subtitle='$pj_subtitle', pj_name='$pj_name', pj_title1='$pj_title1', pj_subtitle1='$pj_subtitle1', pj_opt1='$pj_opt1', pj_opt2='$pj_opt2', pj_opt3='$pj_opt3', pj_btn='$pj_btn' WHERE pj_id='$id'";

    if (mysqli_query($con, $update)) {
      // echo "Successfully update banner information.";
      if ($pj_img['name'] != '') {
        $imageName = 'project_' . time() . '_' . rand(100000, 10000000) . '.' . pathinfo($pj_img['name'], PATHINFO_EXTENSION);
        $updimg = "UPDATE projects SET pj_img='$imageName' WHERE pj_id='$id'";
        if (mysqli_query($con, $updimg)) {
          move_uploaded_file($pj_img['tmp_name'], 'uploads/' . $imageName);
          header('Location: view-project.php?vp=' . $id);
        } else {
          echo "Project image update failed.";
        }
      }
      header('Location: view-project.php?vp=' . $id);
    } else {
      echo "Opps! Project information update failed";
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
                <i class="fab fa-gg-circle"></i>Update Project Information
              </div>
              <div class="col-md-4 card_button_part">
                <a href="all-project.php" class="btn btn-sm btn-dark"><i class="fas fa-th"></i>All Project</a>
              </div>
            </div>
          </div>
          <div class="card-body">
            <div class="row mb-3">
              <label class="col-sm-3 col-form-label col_form_label">Project Title<span class="req_star">*</span>:</label>
              <div class="col-sm-7">
                <input type="text" class="form-control form_control" id="" name="pj_title" value="<?= $data['pj_title']; ?>">
              </div>
            </div>
            <div class="row mb-3">
              <label class="col-sm-3 col-form-label col_form_label">Project Subtitle:</label>
              <div class="col-sm-7">
                <input type="text" class="form-control form_control" id="" name="pj_subtitle" value="<?= $data['pj_subtitle']; ?>">
              </div>
            </div>
            <div class="row mb-3">
              <label class="col-sm-3 col-form-label col_form_label">Project Name:</label>
              <div class="col-sm-7">
                <input type="text" class="form-control form_control" id="" name="pj_name" value="<?= $data['pj_name']; ?>">
              </div>
            </div>
            <div class="row mb-3">
              <label class="col-sm-3 col-form-label col_form_label">Project Title1:</label>
              <div class="col-sm-7">
                <input type="text" class="form-control form_control" id="" name="pj_title1" value="<?= $data['pj_title1']; ?>">
              </div>
            </div>
            <div class="row mb-3">
              <label class="col-sm-3 col-form-label col_form_label">Project Subtitle1:</label>
              <div class="col-sm-7">
                <input type="text" class="form-control form_control" id="" name="pj_subtitle1" value="<?= $data['pj_subtitle1']; ?>">
              </div>
            </div>
            <div class="row mb-3">
              <label class="col-sm-3 col-form-label col_form_label">Project OPT1:</label>
              <div class="col-sm-7">
                <input type="text" class="form-control form_control" id="" name="pj_opt1" value="<?= $data['pj_opt1']; ?>">
              </div>
            </div>
            <div class="row mb-3">
              <label class="col-sm-3 col-form-label col_form_label">Project OPT2:</label>
              <div class="col-sm-7">
                <input type="text" class="form-control form_control" id="" name="pj_opt2" value="<?= $data['pj_opt2']; ?>">
              </div>
            </div>
            <div class="row mb-3">
              <label class="col-sm-3 col-form-label col_form_label">Project OPT3:</label>
              <div class="col-sm-7">
                <input type="text" class="form-control form_control" id="" name="pj_opt3" value="<?= $data['pj_opt3']; ?>">
              </div>
            </div>
            <div class="row mb-3">
              <label class="col-sm-3 col-form-label col_form_label">Project Button:</label>
              <div class="col-sm-7">
                <input type="text" class="form-control form_control" id="" name="pj_btn" value="<?= $data['pj_btn']; ?>">
              </div>
            </div>
            <div class="row mb-3">
              <label class="col-sm-3 col-form-label col_form_label">Project Image:</label>
              <div class="col-sm-4">
                <input type="file" class="form-control form_control" id="" name="pic">
              </div>
              <div class="col-md-2">
                <?php if ($data['pj_img'] != '') { ?>
                  <img height="100px" class="img200" src="uploads/<?= $data['pj_img']; ?>" alt="Project" />
                <?php } else { ?>
                  <img height="100" class="img200" src="images/avatar.jpg" alt="Project" />
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