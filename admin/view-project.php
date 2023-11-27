<?php
 require_once("functions/function.php");

 needLogged();
 if($_SESSION['role']==1){

 get_header();

 get_sidebar();

 $id=$_GET['vp'];
 $sel="SELECT * FROM projects  WHERE  pj_id='$id'";
 $Q=mysqli_query($con,$sel);
 $data=mysqli_fetch_assoc($Q);
?>
    
  <div class="row">
      <div class="col-md-12">
          <div class="card mb-3">
            <div class="card-header">
              <div class="row">
                  <div class="col-md-8 card_title_part">
                      <i class="fab fa-gg-circle"></i>View Project Information
                  </div>  
                  <div class="col-md-4 card_button_part">
                      <a href="all-project.php" class="btn btn-sm btn-dark"><i class="fas fa-th"></i>All Project</a>
                  </div>  
              </div>
            </div>
            <div class="card-body">
              <div class="row">
                  <div class="col-md-2"></div>
                  <div class="col-md-8">
                      <table class="table table-bordered table-striped table-hover custom_view_table">
                        <tr>
                          <td>Project Title</td>  
                          <td>:</td>  
                          <td><?= $data['pj_title'];?></td>  
                        </tr>
                        <tr>
                          <td>Project Subtitle</td>  
                          <td>:</td>  
                          <td><?= $data['pj_subtitle'];?></td>  
                        </tr>
                        <tr>
                          <td>Project Name</td>  
                          <td>:</td>  
                          <td><?= $data['pj_name'];?></td>  
                        </tr>
                        <tr>
                          <td>Project Title1</td>  
                          <td>:</td>  
                          <td><?= $data['pj_title1'];?></td>  
                        </tr>
                        <tr>
                          <td>Project Subtitle1</td>  
                          <td>:</td>  
                          <td><?= $data['pj_subtitle1'];?></td>  
                        </tr>
                        <tr>
                          <td>Project OPT1</td>  
                          <td>:</td>  
                          <td><?= $data['pj_opt1'];?></td>  
                        </tr>
                        <tr>
                          <td>Project OPT2</td>  
                          <td>:</td>  
                          <td><?= $data['pj_opt2'];?></td>  
                        </tr>
                        <tr>
                          <td>Project OPT3</td>  
                          <td>:</td>  
                          <td><?= $data['pj_opt3'];?></td>  
                        </tr>
                        <tr>
                          <td>Project Button</td>  
                          <td>:</td>  
                          <td><?= $data['pj_btn'];?></td>  
                        </tr>
                        <tr>
                          <td>Project Photo</td>  
                          <td>:</td>  
                          <td>
                          <?php if($data['pj_img']!=''){ ?>
                          <img height="100px" class="img200" src="uploads/<?= $data['pj_img']; ?>" alt="Project"/>
                          <?php }else{ ?>
                            <img height="100" class="img200" src="images/avatar.jpg" alt="Project"/>
                          <?php } ?>  
                          </td>  
                        </tr>
                      </table>
                  </div>
                  <div class="col-md-2"></div>
              </div>
            </div>
            <div class="card-footer">
              <div class="btn-group" role="group" aria-label="Button group">
                <button type="button" class="btn btn-sm btn-dark">Print</button>
                <button type="button" class="btn btn-sm btn-secondary">PDF</button>
                <button type="button" class="btn btn-sm btn-dark">Excel</button>
              </div>
            </div>  
          </div>
      </div>
 </div>

<?php

  get_footer();
  }else{
    header('Location: index.php');
  }
?>