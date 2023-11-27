<?php
 require_once("functions/function.php");

 needLogged();
 if($_SESSION['role']==1){

 get_header();

 get_sidebar();

 $id=$_GET['vf'];
 $sel="SELECT * FROM footers  WHERE  f_id='$id'";
 $Q=mysqli_query($con,$sel);
 $data=mysqli_fetch_assoc($Q);
?>
    
  <div class="row">
      <div class="col-md-12">
          <div class="card mb-3">
            <div class="card-header">
              <div class="row">
                  <div class="col-md-8 card_title_part">
                      <i class="fab fa-gg-circle"></i>View Footer Information
                  </div>  
                  <div class="col-md-4 card_button_part">
                      <a href="all-footer.php" class="btn btn-sm btn-dark"><i class="fas fa-th"></i>All Footer</a>
                  </div>  
              </div>
            </div>
            <div class="card-body">
              <div class="row">
                  <div class="col-md-2"></div>
                  <div class="col-md-8">
                      <table class="table table-bordered table-striped table-hover custom_view_table">
                        <tr>
                          <td>Footer Title</td>  
                          <td>:</td>  
                          <td><?= $data['f_title'];?></td>  
                        </tr>
                        <tr>
                          <td>Footer Address</td>  
                          <td>:</td>  
                          <td><?= $data['f_address'];?></td>  
                        </tr>
                        <tr>
                          <td>Footer Phone</td>  
                          <td>:</td>  
                          <td><?= $data['f_phone'];?></td>  
                        </tr>
                        <tr>
                          <td>Footer Email</td>  
                          <td>:</td>  
                          <td><?= $data['f_email'];?></td>  
                        </tr>
                        <tr>
                          <td>Footer Icon1</td>  
                          <td>:</td>  
                          <td><?= $data['f_icon1'];?></td>  
                        </tr>
                        <tr>
                          <td>Footer Icon2</td>  
                          <td>:</td>  
                          <td><?= $data['f_icon2'];?></td>  
                        </tr>
                        <tr>
                          <td>Footer Icon3</td>  
                          <td>:</td>  
                          <td><?= $data['f_icon3'];?></td>  
                        </tr>
                        <tr>
                          <td>Footer Icon4</td>  
                          <td>:</td>  
                          <td><?= $data['f_icon4'];?></td>  
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