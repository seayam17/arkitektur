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
              <i class="fab fa-gg-circle"></i>All Project Information
            </div>
            <div class="col-md-4 card_button_part">
              <a href="add-project.php" class="btn btn-sm btn-dark"><i class="fas fa-plus-circle"></i>Add Project</a>
            </div>
          </div>
        </div>
        <div class="card-body">
          <table class="table table-bordered table-striped table-hover custom_table">
            <thead class="table-dark">
              <tr>
                <th>Sl NO.</th>
                <th>Project Title</th>
                <th>Project Subtitle</th>
                <th>Project Name</th>
                <th>Project Title1</th>
                <th>Project Subitle1</th>
                <th>Project OPT1</th>
                <th>Project OPT2</th>
                <th>Project OPT3</th>
                <th>Project Button</th>
                <th>Project Image</th>
                <th>Manage</th>
              </tr>
            </thead>
            <tbody>
              <?php
              $i = 1;
              $sel = "SELECT * FROM projects ORDER BY pj_id DESC";
              $Q = mysqli_query($con, $sel);
              while ($data = mysqli_fetch_assoc($Q)) {
              ?>
                <tr>
                  <td><?= $i++ ?></td>
                  <td><?= $data['pj_title']; ?></td>
                  <td><?= substr($data['pj_subtitle'],0,30); ?>...</td>
                  <td><?= $data['pj_name']; ?></td>
                  <td><?= $data['pj_title1']; ?></td>
                  <td><?= substr($data['pj_subtitle1'],0,30); ?>...</td>
                  <td><?= $data['pj_opt1']; ?></td>
                  <td><?= $data['pj_opt2']; ?></td>
                  <td><?= $data['pj_opt3']; ?></td>
                  <td><?= $data['pj_btn']; ?></td>
                  <td>
                    <?php if ($data['pj_img'] != '') { ?>
                      <img height="40px" class="img200" src="uploads/<?= $data['pj_img']; ?>" alt="Project" />
                    <?php } else { ?>
                      <img height="40" class="img200" src="images/avatar.jpg" alt="Project" />
                    <?php } ?>
                  </td>
                  <td>
                    <div class="btn-group btn_group_manage" role="group">
                      <button type="button" class="btn btn-sm btn-dark dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">Manage</button>
                      <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="view-project.php?vp=<?= $data['pj_id']; ?>">View</a></li>
                        <li><a class="dropdown-item" href="edit-project.php?ep=<?= $data['pj_id']; ?>">Edit</a></li>
                        <li><a class="dropdown-item" href="delete-project.php?dp=<?= $data['pj_id']; ?>">Delete</a></li>
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