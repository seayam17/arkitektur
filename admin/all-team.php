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
              <i class="fab fa-gg-circle"></i>All Team Information
            </div>
            <div class="col-md-4 card_button_part">
              <a href="add-team.php" class="btn btn-sm btn-dark"><i class="fas fa-plus-circle"></i>Add Team</a>
            </div>
          </div>
        </div>
        <div class="card-body">
          <table class="table table-bordered table-striped table-hover custom_table">
            <thead class="table-dark">
              <tr>
                <th>Sl NO.</th>
                <th>Team Title</th>
                <th>Team Subtitle</th>
                <th>Team Name</th>
                <th>Team Designation</th>
                <th>Team Icon1</th>
                <th>Team Icon2</th>
                <th>Team Icon3</th>
                <th>Team Image</th>
                <th>Manage</th>
              </tr>
            </thead>
            <tbody>
              <?php
              $i = 1;
              $sel = "SELECT * FROM teams ORDER BY tm_id DESC";
              $Q = mysqli_query($con, $sel);
              while ($data = mysqli_fetch_assoc($Q)) {
              ?>
                <tr>
                  <td><?= $i++ ?></td>
                  <td><?= $data['tm_title']; ?></td>
                  <td><?= substr($data['tm_subtitle'],0,30); ?></td>
                  <td><?= $data['tm_name']; ?></td>
                  <td><?= $data['tm_desig']; ?></td>
                  <td><?= $data['tm_icon1']; ?></td>
                  <td><?= $data['tm_icon2']; ?></td>
                  <td><?= $data['tm_icon3']; ?></td>
                  <td>
                    <?php if ($data['tm_img'] != '') { ?>
                      <img height="40px" class="img200" src="uploads/<?= $data['tm_img']; ?>" alt="Team" />
                    <?php } else { ?>
                      <img height="40" class="img200" src="images/avatar.jpg" alt="Team" />
                    <?php } ?>
                  </td>
                  <td>
                    <div class="btn-group btn_group_manage" role="group">
                      <button type="button" class="btn btn-sm btn-dark dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">Manage</button>
                      <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="view-team.php?vt=<?= $data['tm_id']; ?>">View</a></li>
                        <li><a class="dropdown-item" href="edit-team.php?et=<?= $data['tm_id']; ?>">Edit</a></li>
                        <li><a class="dropdown-item" href="delete-team.php?dt=<?= $data['tm_id']; ?>">Delete</a></li>
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