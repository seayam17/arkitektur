<?php
require_once("functions/function.php");

needLogged();

if ($_SESSION['role'] == 1) {

  get_header();

  get_sidebar();

  if(!empty($_POST)){
    $ab_title=$_POST['ab_title'];
    $ab_subtitle=$_POST['ab_subtitle'];
    $ab_para1=$_POST['ab_para2'];
    $ab_para2=$_POST['ab_para2'];
    $ab_counter=$_POST['ab_counter'];
    $ab_ctitle1=$_POST['ab_ctitle1'];
    $ab_ctitle2=$_POST['ab_ctitle2'];
    $ab_ctitle3=$_POST['ab_ctitle3'];
    $ab_button=$_POST['ab_button'];
    $ab_img1=$_FILES['pic1'];
    $ab_img2=$_FILES['pic2'];
    $imageName1='';
    $imageName2='';

    if($ab_img1['name'] != ''){
      $imageName1='about1_'.time().'_'.rand(100000,10000000).'.'.pathinfo($ab_img1['name'],PATHINFO_EXTENSION);
    }
    if($ab_img2['name'] != ''){
      $imageName2='about2_'.time().'_'.rand(100000,10000000).'.'.pathinfo($ab_img2['name'],PATHINFO_EXTENSION);
    }

    $insert="INSERT INTO about(about_title,about_subtitle,about_para1,about_para2,about_counter,about_ctitle1,about_ctitle2,about_ctitle3,about_button,about_img1,about_img2)VALUES('$ab_title','$ab_subtitle','$ab_para1','$ab_para2','$ab_counter','$ab_ctitle1','$ab_ctitle2','$ab_ctitle3','$ab_button','$imageName1','$imageName2')";

    if(!empty($ab_title)){
      if(mysqli_query($con,$insert)){
        move_uploaded_file($ab_img1['tmp_name'],'uploads/'.$imageName1);
        move_uploaded_file($ab_img2['tmp_name'],'uploads/'.$imageName2);
        echo "About information add success";
      }else{
        echo "Opps! operation failed";
      }
    }else{
      echo "Please enter about title";
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
                <i class="fab fa-gg-circle"></i>Add About Information
              </div>
              <div class="col-md-4 card_button_part">
                <a href="all-about.php" class="btn btn-sm btn-dark"><i class="fas fa-th"></i>All About</a>
              </div>
            </div>
          </div>
          <div class="card-body">
            <div class="row mb-3">
              <label class="col-sm-3 col-form-label col_form_label">About Title<span class="req_star">*</span>:</label>
              <div class="col-sm-7">
                <input type="text" class="form-control form_control" id="" name="ab_title">
              </div>
            </div>
            <div class="row mb-3">
              <label class="col-sm-3 col-form-label col_form_label">About Subtitle:</label>
              <div class="col-sm-7">
                <input type="text" class="form-control form_control" id="" name="ab_subtitle">
              </div>
            </div>
            <div class="row mb-3">
              <label class="col-sm-3 col-form-label col_form_label">About Paragraph1:</label>
              <div class="col-sm-7">
                <textarea type="text" class="form-control form_control" id="" name="ab_para1"></textarea>
              </div>
            </div>
            <div class="row mb-3">
              <label class="col-sm-3 col-form-label col_form_label">About Paragraph2:</label>
              <div class="col-sm-7">
                <textarea type="text" class="form-control form_control" id="" name="ab_para2"></textarea>
              </div>
            </div>
            <div class="row mb-3">
              <label class="col-sm-3 col-form-label col_form_label">About Counter:</label>
              <div class="col-sm-7">
                <input type="number" class="form-control form_control" id="" name="ab_counter">
              </div>
            </div>
            <div class="row mb-3">
              <label class="col-sm-3 col-form-label col_form_label">About Ctitle1:</label>
              <div class="col-sm-7">
                <input type="text" class="form-control form_control" id="" name="ab_ctitle1">
              </div>
            </div>
            <div class="row mb-3">
              <label class="col-sm-3 col-form-label col_form_label">About Ctitle2:</label>
              <div class="col-sm-7">
                <input type="text" class="form-control form_control" id="" name="ab_ctitle2">
              </div>
            </div>
            <div class="row mb-3">
              <label class="col-sm-3 col-form-label col_form_label">About Ctitle3:</label>
              <div class="col-sm-7">
                <input type="text" class="form-control form_control" id="" name="ab_ctitle3">
              </div>
            </div>
            <div class="row mb-3">
              <label class="col-sm-3 col-form-label col_form_label">About Button:</label>
              <div class="col-sm-7">
                <input type="text" class="form-control form_control" id="" name="ab_button">
              </div>
            </div>
            <div class="row mb-3">
              <label class="col-sm-3 col-form-label col_form_label">About Image1:</label>
              <div class="col-sm-4">
                <input type="file" class="form-control form_control" id="" name="pic1">
              </div>
            </div>
            <div class="row mb-3">
              <label class="col-sm-3 col-form-label col_form_label">About Image2:</label>
              <div class="col-sm-4">
                <input type="file" class="form-control form_control" id="" name="pic2">
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
}else{
  header('Location: index.php');
}
?>