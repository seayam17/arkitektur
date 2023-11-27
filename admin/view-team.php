<?php
 require_once("functions/function.php");

 needLogged();
 if($_SESSION['role']==1){

 get_header();

 get_sidebar();

 $id=$_GET['vt'];
 $sel="SELECT * FROM teams  WHERE  tm_id='$id'";
 $Q=mysqli_query($con,$sel);
 $data=mysqli_fetch_assoc($Q);
?>
    
  <div class="row">
      <div class="col-md-12">
          <div class="card mb-3">
            <div class="card-header">
              <div class="row">
                  <div class="col-md-8 card_title_part">
                      <i class="fab fa-gg-circle"></i>View Team Information
                  </div>  
                  <div class="col-md-4 card_button_part">
                      <a href="all-team.php" class="btn btn-sm btn-dark"><i class="fas fa-th"></i>All Team</a>
                  </div>  
              </div>
            </div>
            <div class="card-body">
              <div class="row">
                  <div class="col-md-2"></div>
                  <div class="col-md-8">
                      <table class="table table-bordered table-striped table-hover custom_view_table">
                        <tr>
                          <td>Team Title</td>  
                          <td>:</td>  
                          <td><?= $data['tm_title'];?></td>  
                        </tr>
                        <tr>
                          <td>Team Subtitle</td>  
                          <td>:</td>  
                          <td><?= $data['tm_subtitle'];?></td>  
                        </tr>
                        <tr>
                          <td>Team Name</td>  
                          <td>:</td>  
                          <td><?= $data['tm_name'];?></td>  
                        </tr>
                        <tr>
                          <td>Team Designation</td>  
                          <td>:</td>  
                          <td><?= $data['tm_desig'];?></td>  
                        </tr>
                        <tr>
                          <td>Team Icon1</td>  
                          <td>:</td>  
                          <td><?= $data['tm_icon1'];?></td>  
                        </tr>
                        <tr>
                          <td>Team Icon2</td>  
                          <td>:</td>  
                          <td><?= $data['tm_icon2'];?></td>  
                        </tr>
                        <tr>
                          <td>Team Icon3</td>  
                          <td>:</td>  
                          <td><?= $data['tm_icon3'];?></td>  
                        </tr>
                        <tr>
                          <td>Team Photo</td>  
                          <td>:</td>  
                          <td>
                          <?php if($data['tm_img']!=''){ ?>
                          <img height="100px" class="img200" src="uploads/<?= $data['tm_img']; ?>" alt="Team"/>
                          <?php }else{ ?>
                            <img height="100" class="img200" src="images/avatar.jpg" alt="Team"/>
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