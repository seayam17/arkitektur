<?php
 require_once("functions/function.php");

 needLogged();
 if($_SESSION['role']==1){

 get_header();

 get_sidebar();

 $id=$_GET['vs'];
 $sel="SELECT * FROM services  WHERE  ser_id='$id'";
 $Q=mysqli_query($con,$sel);
 $data=mysqli_fetch_assoc($Q);
?>
    
  <div class="row">
      <div class="col-md-12">
          <div class="card mb-3">
            <div class="card-header">
              <div class="row">
                  <div class="col-md-8 card_title_part">
                      <i class="fab fa-gg-circle"></i>View Service Information
                  </div>  
                  <div class="col-md-4 card_button_part">
                      <a href="all-service.php" class="btn btn-sm btn-dark"><i class="fas fa-th"></i>All Service</a>
                  </div>  
              </div>
            </div>
            <div class="card-body">
              <div class="row">
                  <div class="col-md-2"></div>
                  <div class="col-md-8">
                      <table class="table table-bordered table-striped table-hover custom_view_table">
                        <tr>
                          <td>Service Title</td>  
                          <td>:</td>  
                          <td><?= $data['ser_title'];?></td>  
                        </tr>
                        <tr>
                          <td>Service Subtitle</td>  
                          <td>:</td>  
                          <td><?= $data['ser_subtitle'];?></td>  
                        </tr>
                        <tr>
                          <td>Service Name</td>  
                          <td>:</td>  
                          <td><?= $data['ser_name'];?></td>  
                        </tr>
                        <tr>
                          <td>Service Paragraph</td>  
                          <td>:</td>  
                          <td><?= $data['ser_para'];?></td>  
                        </tr>
                        <tr>
                          <td>Service Button</td>  
                          <td>:</td>  
                          <td><?= $data['ser_button'];?></td>  
                        </tr>
                        <tr>
                          <td>Service Photo</td>  
                          <td>:</td>  
                          <td>
                          <?php if($data['ser_img']!=''){ ?>
                          <img height="100px" class="img200" src="uploads/<?= $data['ser_img']; ?>" alt="Service"/>
                          <?php }else{ ?>
                            <img height="100" class="img200" src="images/avatar.jpg" alt="Service"/>
                          <?php } ?>  
                          </td>  
                        </tr>
                        <tr>
                          <td>Service Icon</td>  
                          <td>:</td>  
                          <td>
                          <?php if($data['ser_icon']!=''){ ?>
                          <img height="50px" class="img200" src="uploads/<?= $data['ser_icon']; ?>" alt="Service"/>
                          <?php }else{ ?>
                            <img height="100" class="img200" src="images/avatar.jpg" alt="Service"/>
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