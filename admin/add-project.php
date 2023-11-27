<?php
require_once("functions/function.php");

needLogged();

if ($_SESSION['role'] == 1) {

  get_header();

  get_sidebar();

  if(!empty($_POST)){
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

    if($pj_img['name'] != ''){
      $imageName='project_'.time().'_'.rand(100000,10000000).'.'.pathinfo($pj_img['name'],PATHINFO_EXTENSION);
    }

    $insert="INSERT INTO projects(pj_title,pj_subtitle,pj_name,pj_title1,pj_subtitle1,pj_opt1,pj_opt2,pj_opt3,pj_btn,pj_img)VALUES('$pj_title','$pj_subtitle','$pj_name','$pj_title1','$pj_subtitle1','$pj_opt1','$pj_opt2','$pj_opt3','$pj_btn','$imageName')";

    if(!empty($pj_title)){
      if(mysqli_query($con,$insert)){
        move_uploaded_file($pj_img['tmp_name'],'uploads/'.$imageName);
        echo "Project upload success";
      }else{
        echo "Project upload failed";
      }
    }else{
      echo "Please enter project title";
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
                <i class="fab fa-gg-circle"></i>Add Project Information
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
                <input type="text" class="form-control form_control" id="" name="pj_title">
              </div>
            </div>
            <div class="row mb-3">
              <label class="col-sm-3 col-form-label col_form_label">Project Subtitle:</label>
              <div class="col-sm-7">
                <input type="text" class="form-control form_control" id="" name="pj_subtitle">
              </div>
            </div>
            <div class="row mb-3">
              <label class="col-sm-3 col-form-label col_form_label">Project Name:</label>
              <div class="col-sm-7">
                <input type="text" class="form-control form_control" id="" name="pj_name">
              </div>
            </div>
            <div class="row mb-3">
              <label class="col-sm-3 col-form-label col_form_label">Project Title1:</label>
              <div class="col-sm-7">
                <input type="text" class="form-control form_control" id="" name="pj_title1">
              </div>
            </div>
            <div class="row mb-3">
              <label class="col-sm-3 col-form-label col_form_label">Project Subtitle1:</label>
              <div class="col-sm-7">
                <input type="text" class="form-control form_control" id="" name="pj_subtitle1">
              </div>
            </div>
            <div class="row mb-3">
              <label class="col-sm-3 col-form-label col_form_label">Project OPT1:</label>
              <div class="col-sm-7">
                <input type="text" class="form-control form_control" id="" name="pj_opt1">
              </div>
            </div>
            <div class="row mb-3">
              <label class="col-sm-3 col-form-label col_form_label">Project OPT2:</label>
              <div class="col-sm-7">
                <input type="text" class="form-control form_control" id="" name="pj_opt2">
              </div>
            </div>
            <div class="row mb-3">
              <label class="col-sm-3 col-form-label col_form_label">Project OPT3:</label>
              <div class="col-sm-7">
                <input type="text" class="form-control form_control" id="" name="pj_opt3">
              </div>
            </div>
            <div class="row mb-3">
              <label class="col-sm-3 col-form-label col_form_label">Project Button<span class="req_star">*</span>:</label>
              <div class="col-sm-7">
                <input type="text" class="form-control form_control" id="" name="pj_btn">
              </div>
            </div>
            <div class="row mb-3">
              <label class="col-sm-3 col-form-label col_form_label">Project Image:</label>
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