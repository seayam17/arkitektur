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
              <i class="fab fa-gg-circle"></i>All Fact Information
            </div>
            <div class="col-md-4 card_button_part">
              <a href="add-fact.php" class="btn btn-sm btn-dark"><i class="fas fa-plus-circle"></i>Add Fact</a>
            </div>
          </div>
        </div>
        <div class="card-body">
          <table class="table table-bordered table-striped table-hover custom_table">
            <thead class="table-dark">
              <tr>
                <th>Sl NO.</th>
                <th>Fact Title</th>
                <th>Fact Subtitle</th>
                <th>Icon</th>
                <th>Manage</th>
              </tr>
            </thead>
            <tbody>
              <?php
              $i = 1;
              $sel = "SELECT * FROM facts ORDER BY fact_id DESC";
              $Q = mysqli_query($con, $sel);
              while ($data = mysqli_fetch_assoc($Q)) {
              ?>
                <tr>
                  <td><?= $i++ ?></td>
                  <td><?= $data['fact_title']; ?></td>
                  <td><?= substr($data['fact_subtitle'],0,30); ?>...</td>
                  <td>
                    <?php if ($data['fact_icon'] != '') { ?>
                      <img height="40px" class="img200" src="uploads/<?= $data['fact_icon']; ?>" alt="Fact" />
                    <?php } else { ?>
                      <img height="40" class="img200" src="images/avatar.jpg" alt="Fact" />
                    <?php } ?>
                  </td>
                  <td>
                    <div class="btn-group btn_group_manage" role="group">
                      <button type="button" class="btn btn-sm btn-dark dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">Manage</button>
                      <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="view-fact.php?vfc=<?= $data['fact_id']; ?>">View</a></li>
                        <li><a class="dropdown-item" href="edit-fact.php?efc=<?= $data['fact_id']; ?>">Edit</a></li>
                        <li><a class="dropdown-item" href="delete-fact.php?dfc=<?= $data['fact_id']; ?>">Delete</a></li>
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