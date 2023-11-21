<?php
 require_once("functions/function.php");

 needLogged();
 if($_SESSION['role']==1){

 get_header();

 get_sidebar();

 $id=$_GET['va'];
 $sel="SELECT * FROM about  WHERE  about_id='$id'";
 $Q=mysqli_query($con,$sel);
 $data=mysqli_fetch_assoc($Q);
?>
    
  <div class="row">
      <div class="col-md-12">
          <div class="card mb-3">
            <div class="card-header">
              <div class="row">
                  <div class="col-md-8 card_title_part">
                      <i class="fab fa-gg-circle"></i>View About Information
                  </div>  
                  <div class="col-md-4 card_button_part">
                      <a href="all-about.php" class="btn btn-sm btn-dark"><i class="fas fa-th"></i>All About</a>
                  </div>  
              </div>
            </div>
            <div class="card-body">
              <div class="row">
                  <div class="col-md-2"></div>
                  <div class="col-md-8">
                      <table class="table table-bordered table-striped table-hover custom_view_table">
                        <tr>
                          <td>About Title</td>  
                          <td>:</td>  
                          <td><?= $data['about_title'];?></td>  
                        </tr>
                        <tr>
                          <td>About Subtitle</td>  
                          <td>:</td>  
                          <td><?= $data['about_subtitle'];?></td>  
                        </tr>
                        <tr>
                          <td>About Paragraph1</td>  
                          <td>:</td>  
                          <td><?= $data['about_para1'];?></td>  
                        </tr>
                        <tr>
                          <td>About Paragraph2</td>  
                          <td>:</td>  
                          <td><?= $data['about_para2'];?></td>  
                        </tr>
                        <tr>
                          <td>About Counter</td>  
                          <td>:</td>  
                          <td><?= $data['about_counter'];?></td>  
                        </tr>
                        <tr>
                          <td>About Ctitle1</td>  
                          <td>:</td>  
                          <td><?= $data['about_ctitle1'];?></td>  
                        </tr>
                        <tr>
                          <td>About Ctitle2</td>  
                          <td>:</td>  
                          <td><?= $data['about_ctitle2'];?></td>  
                        </tr>
                        <tr>
                          <td>About Ctitle3</td>  
                          <td>:</td>  
                          <td><?= $data['about_ctitle3'];?></td>  
                        </tr>
                        <tr>
                          <td>About Button</td>  
                          <td>:</td>  
                          <td><?= $data['about_button'];?></td>  
                        </tr>
                        <tr>
                          <td>About Image1</td>  
                          <td>:</td>  
                          <td>
                          <?php if($data['about_img1']!=''){ ?>
                          <img height="100px" class="img200" src="uploads/<?= $data['about_img1']; ?>" alt="About1"/>
                          <?php }else{ ?>
                            <img height="100" class="img200" src="images/avatar.jpg" alt="About1"/>
                          <?php } ?>  
                          </td>  
                        </tr>
                        <tr>
                          <td>About Image2</td>  
                          <td>:</td>  
                          <td>
                          <?php if($data['about_img2']!=''){ ?>
                          <img height="100px" class="img200" src="uploads/<?= $data['about_img2']; ?>" alt="About2"/>
                          <?php }else{ ?>
                            <img height="100" class="img200" src="images/avatar.jpg" alt="About2"/>
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