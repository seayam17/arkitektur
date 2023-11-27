<?php
 require_once("functions/function.php");

 needLogged();
 if($_SESSION['role']==1){

 get_header();

 get_sidebar();

 $id=$_GET['vc'];
 $sel="SELECT * FROM contacts  WHERE  cons_id='$id'";
 $Q=mysqli_query($con,$sel);
 $data=mysqli_fetch_assoc($Q);
?>
    
  <div class="row">
      <div class="col-md-12">
          <div class="card mb-3">
            <div class="card-header">
              <div class="row">
                  <div class="col-md-8 card_title_part">
                      <i class="fab fa-gg-circle"></i>View Contacts Information
                  </div>  
                  <div class="col-md-4 card_button_part">
                      <a href="all-contacts.php" class="btn btn-sm btn-dark"><i class="fas fa-th"></i>All Contacts</a>
                  </div>  
              </div>
            </div>
            <div class="card-body">
              <div class="row">
                  <div class="col-md-2"></div>
                  <div class="col-md-8">
                      <table class="table table-bordered table-striped table-hover custom_view_table">
                        <tr>
                          <td>Contact Title</td>  
                          <td>:</td>  
                          <td><?= $data['cons_title'];?></td>  
                        </tr>
                        <tr>
                          <td>Contact Subtitle</td>  
                          <td>:</td>  
                          <td><?= $data['cons_subtitle'];?></td>  
                        </tr>
                        <tr>
                          <td>Contact Address</td>  
                          <td>:</td>  
                          <td><?= $data['cons_address'];?></td>  
                        </tr>
                        <tr>
                          <td>Contact Phone</td>  
                          <td>:</td>  
                          <td><?= $data['cons_phone'];?></td>  
                        </tr>
                        <tr>
                          <td>Contact Email</td>  
                          <td>:</td>  
                          <td><?= $data['cons_email'];?></td>  
                        </tr>
                        <tr>
                          <td>Contact Map</td>  
                          <td>:</td>  
                          <td><?= substr($data['cons_map'],0,100); ?>...</td>  
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