<?php

use App\Models\ContactUsModel;
use App\Controllers\ContactUsController;

     $contactModel = new ContactUsModel;
     $contactController = new ContactUsController($contactModel);
     $contactController->showAll();

?>

<?php include_once  trim(str_replace("public", "", VIEW_PATH)) . "/app/views/partials/_header.php"; ?>

<div class="container messages-table">
    <div class="container text-center bg-secondary text-white pt-3 pb-3 mt-1 mb-2">
      <h3>Here you can see all messages which was sent from contact us form.</h3>
    </div>
    <table id="formMsgTable" class="table table-striped table-bordered table-sm" cellspacing="0" width="100%">
  <thead>
    <tr>
      <th class="th-sm">Name </th>

      <th class="th-sm">Surename</th>
      
      <th class="th-sm">Email</th>
      
      <th class="th-sm">File</th>
      
      <th class="th-sm">Comments</th>
      
      <th class="th-sm">Gender</th>

      <th class="th-sm">Location</th>
    </tr>
  </thead>
  
  <tbody>

    <?php
        foreach ($contactController->showAll() as $row) {
            echo '<tr>';
            echo '<td>' . $row['name'] . '</td>';
            echo '<td>' . $row['surname'] . '</td>';
            echo '<td>' . $row['email'] . '</td>';
            if(!empty($row['file'])) {
              echo '<td><a href="data:application/octet-stream;base64,' . base64_encode($row['file']) . 
              '" download="contact-us-file">Download </a></td>';
            } else {
              echo '<td>' . '</td>';
            }
            echo '<td>' . $row['comments'] . '</td>';
            echo '<td>' . $row['gender'] . '</td>';
            echo '<td>' . $row['location'] . '</td>';
            echo '</tr>';
        }
    ?>
 
  </tbody>
  <tfoot>
    <tr>
      <th>Name</th>
      <th>Surename</th>
      <th>Email</th>
      <th>File</th>
      <th>Comments</th>
      <th>Gender</th>
      <th class="th-sm">Location</th>
    </tr>
  </tfoot>
</table>
</div>

<?php include_once  trim(str_replace("public", "", VIEW_PATH)) . "/app/views/partials/_footer.php"; ?>
