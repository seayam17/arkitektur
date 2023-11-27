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
              <i class="fab fa-gg-circle"></i>All Contacts Information
            </div>
            <div class="col-md-4 card_button_part">
              <a href="add-contacts.php" class="btn btn-sm btn-dark"><i class="fas fa-plus-circle"></i>Add Contacts</a>
            </div>
          </div>
        </div>
        <div class="card-body">
          <table class="table table-bordered table-striped table-hover custom_table">
            <thead class="table-dark">
              <tr>
                <th>Sl NO.</th>
                <th>Contact Title</th>
                <th>Contact Subtitle</th>
                <th>Contact Address</th>
                <th>Contact Phone</th>
                <th>Contact Email</th>
                <th>Contact Map</th>
                <th>Manage</th>
              </tr>
            </thead>
            <tbody>
              <?php
              $i = 1;
              $sel = "SELECT * FROM contacts ORDER BY cons_id DESC";
              $Q = mysqli_query($con, $sel);
              while ($data = mysqli_fetch_assoc($Q)) {
              ?>
                <tr>
                  <td><?= $i++ ?></td>
                  <td><?= $data['cons_title']; ?></td>
                  <td><?= substr($data['cons_subtitle'],0,30); ?>...</td>
                  <td><?= $data['cons_address']; ?></td>
                  <td><?= $data['cons_phone']; ?></td>
                  <td><?= $data['cons_email']; ?></td>
                  <td><?= substr($data['cons_map'],0,30); ?>...</td>
                  <td>
                    <div class="btn-group btn_group_manage" role="group">
                      <button type="button" class="btn btn-sm btn-dark dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">Manage</button>
                      <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="view-contacts.php?vc=<?= $data['cons_id']; ?>">View</a></li>
                        <li><a class="dropdown-item" href="edit-contacts.php?ec=<?= $data['cons_id']; ?>">Edit</a></li>
                        <li><a class="dropdown-item" href="delete-contacts.php?dc=<?= $data['cons_id']; ?>">Delete</a></li>
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