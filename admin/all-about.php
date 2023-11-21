<?php
require_once("functions/function.php");

needLogged();
if ($_SESSION['role'] == 1) {

  get_header();

  get_sidebar();
?>
  <div class="row">
    <div class="col-md-12">
      <div class="card mb-3">
        <div class="card-header">
          <div class="row">
            <div class="col-md-8 card_title_part">
              <i class="fab fa-gg-circle"></i>All About Information
            </div>
            <div class="col-md-4 card_button_part">
              <a href="add-about.php" class="btn btn-sm btn-dark"><i class="fas fa-plus-circle"></i>Add About</a>
            </div>
          </div>
        </div>
        <div class="card-body">
          <table class="table table-bordered table-striped table-hover custom_table">
            <thead class="table-dark">
              <tr>
                <th>Sl NO.</th>
                <th>About Title</th>
                <th>About Subtitle</th>
                <th>About Paragraph1</th>
                <th>About Paragraph2</th>
                <th>About Counter</th>
                <th>About Ctitle1</th>
                <th>About Ctitle2</th>
                <th>About Ctitle3</th>
                <th>About Button</th>
                <th>About Image1</th>
                <th>About Image2</th>
                <th>Manage</th>
              </tr>
            </thead>
            <tbody>
              <?php
              $i = 1;
              $sel = "SELECT * FROM about ORDER BY about_id DESC";
              $Q = mysqli_query($con, $sel);
              while ($data = mysqli_fetch_assoc($Q)) {
              ?>
                <tr>
                  <td><?= $i++ ?></td>
                  <td><?= $data['about_title']; ?></td>
                  <td><?= substr($data['about_subtitle'], 0, 20); ?>...</td>
                  <td><?= substr($data['about_para1'], 0, 20); ?>...</td>
                  <td><?= substr($data['about_para2'], 0, 20); ?>...</td>
                  <td><?= $data['about_counter']; ?></td>
                  <td><?= $data['about_ctitle1']; ?></td>
                  <td><?= $data['about_ctitle2']; ?></td>
                  <td><?= $data['about_ctitle3']; ?></td>
                  <td><?= $data['about_button']; ?></td>
                  <td>
                    <?php if ($data['about_img1'] != '') { ?>
                      <img height="40px" class="img200" src="uploads/<?= $data['about_img1']; ?>" alt="About1" />
                    <?php } else { ?>
                      <img height="40" class="img200" src="images/avatar.jpg" alt="About1" />
                    <?php } ?>
                  </td>
                  <td>
                    <?php if ($data['about_img2'] != '') { ?>
                      <img height="40px" class="img200" src="uploads/<?= $data['about_img2']; ?>" alt="About2" />
                    <?php } else { ?>
                      <img height="40" class="img200" src="images/avatar.jpg" alt="About2" />
                    <?php } ?>
                  </td>
                  <td>
                    <div class="btn-group btn_group_manage" role="group">
                      <button type="button" class="btn btn-sm btn-dark dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">Manage</button>
                      <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="view-about.php?va=<?= $data['about_id']; ?>">View</a></li>
                        <li><a class="dropdown-item" href="edit-about.php?ea=<?= $data['about_id']; ?>">Edit</a></li>
                        <li><a class="dropdown-item" href="delete-about.php?da=<?= $data['about_id']; ?>">Delete</a></li>
                      </ul>
                    </div>
                  </td>
                </tr>
              <?php } ?>
            </tbody>
          </table>
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
} else{
  header('Location: index.php');
}
?>