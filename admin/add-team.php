<?php
require_once("functions/function.php");

needLogged();

if ($_SESSION['role'] == 1) {

  get_header();

  get_sidebar();

  if(!empty($_POST)){
    $tm_title=$_POST['tm_title'];
    $tm_subtitle=$_POST['tm_subtitle'];
    $tm_name=$_POST['tm_name'];
    $tm_desig=$_POST['tm_desig'];
    $tm_icon1=$_POST['tm_icon1'];
    $tm_icon2=$_POST['tm_icon2'];
    $tm_icon3=$_POST['tm_icon3'];
    $tm_img=$_FILES['pic'];
    $imageName='';

    if($tm_img['name'] != ''){
      $imageName='team_'.time().'_'.rand(100000,10000000).'.'.pathinfo($tm_img['name'],PATHINFO_EXTENSION);
    }

    $insert="INSERT INTO teams(tm_title,tm_subtitle,tm_name,tm_desig,tm_icon1,tm_icon2,tm_icon3,tm_img)VALUES('$tm_title','$tm_subtitle','$tm_name','$tm_desig','$tm_icon1','$tm_icon2','$tm_icon3','$imageName')";

    if(!empty($tm_title)){
      if(mysqli_query($con,$insert)){
        move_uploaded_file($tm_img['tmp_name'],'uploads/'.$imageName);
        echo "Team information upload success";
      }else{
        echo "Team information upload failed";
      }
    }else{
      echo "Please enter team title";
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
                <i class="fab fa-gg-circle"></i>Add Team Information
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
                <input type="text" class="form-control form_control" id="" name="tm_title">
              </div>
            </div>
            <div class="row mb-3">
              <label class="col-sm-3 col-form-label col_form_label">Team Subtitle:</label>
              <div class="col-sm-7">
                <input type="text" class="form-control form_control" id="" name="tm_subtitle">
              </div>
            </div>
            <div class="row mb-3">
              <label class="col-sm-3 col-form-label col_form_label">Team Name:</label>
              <div class="col-sm-7">
                <input type="text" class="form-control form_control" id="" name="tm_name">
              </div>
            </div>
            <div class="row mb-3">
              <label class="col-sm-3 col-form-label col_form_label">Team Designation:</label>
              <div class="col-sm-7">
                <input type="text" class="form-control form_control" id="" name="tm_desig">
              </div>
            </div>
            <div class="row mb-3">
              <label class="col-sm-3 col-form-label col_form_label">Team Icon1:</label>
              <div class="col-sm-7">
                <input type="text" class="form-control form_control" id="" name="tm_icon1">
              </div>
            </div>
            <div class="row mb-3">
              <label class="col-sm-3 col-form-label col_form_label">Team Icon2:</label>
              <div class="col-sm-7">
                <input type="text" class="form-control form_control" id="" name="tm_icon2">
              </div>
            </div>
            <div class="row mb-3">
              <label class="col-sm-3 col-form-label col_form_label">Team Icon3:</label>
              <div class="col-sm-7">
                <input type="text" class="form-control form_control" id="" name="tm_icon3">
              </div>
            </div>
            <div class="row mb-3">
              <label class="col-sm-3 col-form-label col_form_label">Team Image:</label>
              <div class="col-sm-4">
                <input type="file" class="form-control form_control" id="" name="pic">
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
} else{
  header('Location: index.php');
}
?>