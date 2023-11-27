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
              <i class="fab fa-gg-circle"></i>All Footer Information
            </div>
            <div class="col-md-4 card_button_part">
              <a href="add-footer.php" class="btn btn-sm btn-dark"><i class="fas fa-plus-circle"></i>Add Footer</a>
            </div>
          </div>
        </div>
        <div class="card-body">
          <table class="table table-bordered table-striped table-hover custom_table">
            <thead class="table-dark">
              <tr>
                <th>Sl NO.</th>
                <th>Footer Title</th>
                <th>Footer Address</th>
                <th>Footer Phone</th>
                <th>Footer Email</th>
                <th>Footer Icon1</th>
                <th>Footer Icon2</th>
                <th>Footer Icon3</th>
                <th>Footer Icon4</th>
                <th>Manage</th>
              </tr>
            </thead>
            <tbody>
              <?php
              $i = 1;
              $sel = "SELECT * FROM footers ORDER BY f_id DESC";
              $Q = mysqli_query($con, $sel);
              while ($data = mysqli_fetch_assoc($Q)) {
              ?>
                <tr>
                  <td><?= $i++ ?></td>
                  <td><?= $data['f_title']; ?></td>
                  <td><?= substr($data['f_address'],0,30); ?></td>
                  <td><?= $data['f_phone']; ?></td>
                  <td><?= $data['f_email']; ?></td>
                  <td><?= $data['f_icon1']; ?></td>
                  <td><?= $data['f_icon2']; ?></td>
                  <td><?= $data['f_icon3']; ?></td>
                  <td><?= $data['f_icon4']; ?></td>
                  <td>
                    <div class="btn-group btn_group_manage" role="group">
                      <button type="button" class="btn btn-sm btn-dark dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">Manage</button>
                      <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="view-footer.php?vf=<?= $data['f_id']; ?>">View</a></li>
                        <li><a class="dropdown-item" href="edit-footer.php?ef=<?= $data['f_id']; ?>">Edit</a></li>
                        <li><a class="dropdown-item" href="delete-footer.php?df=<?= $data['f_id']; ?>">Delete</a></li>
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