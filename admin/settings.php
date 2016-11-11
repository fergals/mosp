<?php
require ($_SERVER['DOCUMENT_ROOT'].'/config/dbconnect.php');
require "header.php";

  if (isset($_POST['submitsettings']))
  {
    $adminemail = $_POST['adminemail'];

    $stmt = $db->prepare("UPDATE settings SET adminemail=:adminemail");

    $stmt->bindParam(':adminemail', $adminemail, PDO::PARAM_INT, 20);

    try {
      $stmt->execute();
      echo "<div class='alert alert-success' role='alert'>Successsfull updated admin email</div>";
      } catch (PDOException $e) {
        echo "<div class='alert alert-danger' role='alert'>Something went wrong " . print($e) . "</div>";
      }
              $stmt = null;
  }


  echo "<div id='fh5co-main'>
  			<div class='container'>
  			<div class='row'>
  			<div class='col-md-8'>
        <h2>Settings</h2>";;

echo "<form action='' method='post' enctype='multipart/form-data'>";

$admin = $db->query("SELECT adminemail from settings");
while ($a = $admin->fetch(PDO::FETCH_ASSOC)){

echo "<div class='form-group'><label>Administrator Email Address</label>";
echo "<input type='text' class='form-control' name='adminemail' value='" . $a['adminemail'] ."'>";
      if (isset($coursecost_error)) echo $coursecost_error;
echo "</div>";
}

  echo "<div class='form-group text-center'><button type='submit' class='btn btn-outline' name='submitsettings'>Update Settings</button></form></div>";


 ?>
            </div>

              <!-- Blog Sidebar Widgets Column -->
              <div class="col-md-4">
                  <!-- Blog Categories Well -->
                  <div class="well">
                      <h4>Admin Settings</h4>
                      <div class="row">
                          <div class="col-lg-12">
                            This page allows you to update some of the settings used within the Napier Management Training Admin facility
                          </div>
                      </div>
                      <!-- /.row -->
                  </div>

              </div>

          </div>
          <!-- /.row -->
