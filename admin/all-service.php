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
              <i class="fab fa-gg-circle"></i>All Service Information
            </div>
            <div class="col-md-4 card_button_part">
              <a href="add-service.php" class="btn btn-sm btn-dark"><i class="fas fa-plus-circle"></i>Add Service</a>
            </div>
          </div>
        </div>
        <div class="card-body">
          <table class="table table-bordered table-striped table-hover custom_table">
            <thead class="table-dark">
              <tr>
                <th>Sl NO.</th>
                <th>Service Title</th>
                <th>Service Subtitle</th>
                <th>Service Name</th>
                <th>Service Paragraph</th>
                <th>Service Button</th>
                <th>Service Image</th>
                <th>Service Icon</th>
                <th>Manage</th>
              </tr>
            </thead>
            <tbody>
              <?php
              $i = 1;
              $sel = "SELECT * FROM services ORDER BY ser_id DESC";
              $Q = mysqli_query($con, $sel);
              while ($data = mysqli_fetch_assoc($Q)) {
              ?>
                <tr>
                  <td><?= $i++ ?></td>
                  <td><?= $data['ser_title']; ?></td>
                  <td><?= substr($data['ser_subtitle'],0,30); ?>...</td>
                  <td><?= $data['ser_name']; ?></td>
                  <td><?= substr($data['ser_para'],0,30); ?>...</td>
                  <td><?= $data['ser_button']; ?></td>
                  <td>
                    <?php if ($data['ser_img'] != '') { ?>
                      <img height="40px" class="img200" src="uploads/<?= $data['ser_img']; ?>" alt="Service" />
                    <?php } else { ?>
                      <img height="40" class="img200" src="images/avatar.jpg" alt="Service" />
                    <?php } ?>
                  </td>
                  <td>
                    <?php if ($data['ser_icon'] != '') { ?>
                      <img height="40px" class="img200" src="uploads/<?= $data['ser_icon']; ?>" alt="Service" />
                    <?php } else { ?>
                      <img height="40" class="img200" src="images/avatar.jpg" alt="Service" />
                    <?php } ?>
                  </td>
                  <td>
                    <div class="btn-group btn_group_manage" role="group">
                      <button type="button" class="btn btn-sm btn-dark dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">Manage</button>
                      <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="view-service.php?vs=<?= $data['ser_id']; ?>">View</a></li>
                        <li><a class="dropdown-item" href="edit-service.php?es=<?= $data['ser_id']; ?>">Edit</a></li>
                        <li><a class="dropdown-item" href="delete-service.php?ds=<?= $data['ser_id']; ?>">Delete</a></li>
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