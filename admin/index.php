<?php
require ($_SERVER['DOCUMENT_ROOT'].'/config/dbconnect.php');
require "header.php";

  if (isset($_POST['addcourse']))
  {
    $ccode = $_POST['coursecode'];
    $cname = $_POST['coursename'];
    $cdesc = $_POST['coursedescription'];
    $ccost = $_POST['coursecost'];
    $cextras = $_POST['courseextras'];
    $clocation = $_POST['courselocation'];
    $cstartdate = $_POST['coursestart'];
    $cenddate = $_POST['courseend'];

    $stmt = $db->prepare("INSERT INTO courses (coursecode, name, description, cost, extras, location, startdate, enddate) VALUES (:coursecode, :coursename, :cdesc, :coursecost, :courseextras, :courselocation, :coursestart, :courseend)");

    $stmt->bindParam(':coursecode', $ccode, PDO::PARAM_INT, 20);
    $stmt->bindParam(':coursename', $cname, PDO::PARAM_STR, 100);
    $stmt->bindParam(':cdesc', $cdesc, PDO::PARAM_STR, 100000);
    $stmt->bindParam(':coursecost', $ccost, PDO::PARAM_STR, 10);
    $stmt->bindParam(':courseextras', $cextras, PDO::PARAM_STR, 200);
    $stmt->bindParam(':courselocation', $clocation, PDO::PARAM_STR, 30);
    $stmt->bindParam(':coursestart', $cstartdate, PDO::PARAM_STR, 20);
    $stmt->bindParam(':courseend', $cenddate, PDO::PARAM_STR, 20);

    try {
      $stmt->execute();
      echo "<div class='alert alert-success' role='alert'>Successsfull added course</div>";
      } catch (PDOException $e) {
        echo "<div class='alert alert-danger' role='alert'>Something went wrong " . print($e) . "</div>";
      }
              $stmt = null;
  }


  echo "<div id='fh5co-main'>
  			<div class='container'>
  			<div class='row'>
  			<div class='col-md-8'>
        <h2>Course Management</h2>";;
 ?>
                  <?php
                  $courses = $db->query("SELECT courses.id, courses.name, courses.description, courses.cost, courses.extras, courses.location, courses.startdate, courses.duration, courses.availability, locations.lid, locations.address, locations.city, locations.postcode from courses INNER JOIN locations ON courses.location=locations.lid");
                  echo "<form action='' method='post'>";
                  echo "<table class='table table-striped'><tr><th>Course Name</th><th>Location</th><th>Start Date</th><th>Duration</th><th>View Details</th><th>Edit</th></td>";
                  while($u = $courses->fetch(PDO::FETCH_ASSOC)){
                    echo "<tr><td>" . $u['name'] . "</td>";
                    echo "<td>" . $u['city'] . "</td>";
                    echo "<td>" . $u['startdate'] . "</td>";
                    echo "<td>" . $u['duration'] . " Days</td>";
                    echo "<td><a href='overview.php?courseid=" . $u['id'] ."'>View</a></td>";
                    echo "<td><a href='editcourse.php?id=" . $u['id'] ."'>Edit</a></td></tr>";

                  }
                  echo "</table>";
                  ?>

            </div>

            <!-- Side Bar -->
                  <div class="col-md-4">
                    <div class="fh5co-sidebox">
                      <div class="fh5co-sidebox">
                        <h3 class="fh5co-sidebox-lead">Need Help?</h3>
                        <p><a href='manual.png'>Download the Admin Facility Manual</a></p>
                    </div>

                    </div>

                    </div>

                </div>
              </div>
            </div>
