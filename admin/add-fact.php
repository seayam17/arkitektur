<?php
require_once("functions/function.php");

needLogged();

if ($_SESSION['role'] == 1) {

  get_header();

  get_sidebar();

  if(!empty($_POST)){
    $fact_title=$_POST['fact_title'];
    $fact_subtitle=$_POST['fact_subtitle'];
    $fact_icon=$_FILES['pic'];
    $imageName='';

    if($fact_icon['name'] != ''){
      $imageName='fact_'.time().'_'.rand(100000,10000000).'.'.pathinfo($fact_icon['name'],PATHINFO_EXTENSION);
    }

    $insert="INSERT INTO facts(fact_title,fact_subtitle,fact_icon)VALUES('$fact_title','$fact_subtitle','$imageName')";

    if(!empty($fact_title)){
      if(mysqli_query($con,$insert)){
        move_uploaded_file($fact_icon['tmp_name'],'uploads/'.$imageName);
        echo "Fact Icon upload success";
      }else{
        echo "Fact Icon upload failed";
      }
    }else{
      echo "Please enter fact title";
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
                <i class="fab fa-gg-circle"></i>Add Fact Information
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
                <input type="text" class="form-control form_control" id="" name="fact_title">
              </div>
            </div>
            <div class="row mb-3">
              <label class="col-sm-3 col-form-label col_form_label">Fact Subtitle:</label>
              <div class="col-sm-7">
                <input type="text" class="form-control form_control" id="" name="fact_subtitle">
              </div>
            </div>
            <div class="row mb-3">
              <label class="col-sm-3 col-form-label col_form_label">Fact Icon:</label>
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