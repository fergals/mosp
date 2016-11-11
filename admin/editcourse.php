<?php
require ($_SERVER['DOCUMENT_ROOT'].'/config/dbconnect.php');
require "header.php";

  $courseid = $_GET['id'];

  if (isset($_POST['deletecourse'])) {
    $stmt = $db->prepare("DELETE FROM courses WHERE id = '$courseid'");
    $stmt->execute();
    header ("Location: index.php");
    $stmt = null;
  }

  if (isset($_POST['editcourse'])){
    $cname = $_POST['coursename'];
    $cdesc = $_POST['coursedescription'];
    $ccost = $_POST['coursecost'];
    $cextras = $_POST['courseextras'];
    $clocation = $_POST['courselocation'];
    $cstartdate = $_POST['coursestart'];
    $cenddate = $_POST['duration'];

    $stmt = $db->prepare('UPDATE courses SET name=:coursename, description=:cdesc, cost=:coursecost, extras=:courseextras, location=:courselocation, startdate=:coursestart, duration=:courseduration  WHERE id = :courseid');

    $stmt->bindParam(':coursename', $cname, PDO::PARAM_STR, 100);
    $stmt->bindParam(':cdesc', $cdesc, PDO::PARAM_STR, 100000);
    $stmt->bindParam(':coursecost', $ccost, PDO::PARAM_STR, 10);
    $stmt->bindParam(':courseextras', $cextras, PDO::PARAM_STR, 200);
    $stmt->bindParam(':courselocation', $clocation, PDO::PARAM_STR, 30);
    $stmt->bindParam(':coursestart', $cstartdate, PDO::PARAM_STR, 20);
    $stmt->bindParam(':courseduration', $cenddate, PDO::PARAM_STR, 20);
    $stmt->bindParam(':courseid', $courseid, PDO::PARAM_STR, 20);

    try {
      $stmt->execute();
      echo "<div class='alert alert-success' role='alert'>Successsfull updated course</div>";
      } catch (PDOException $e) {
        echo "<div class='alert alert-danger' role='alert'>Something went wrong " . print($e) . "</div>";
      }
              $stmt = null;
  }
  $course = $db->query("SELECT courses.id, courses.name, courses.description, courses.cost, courses.startdate, courses.duration, courses.location, courses.extras, courses.availability, locations.lid, locations.address, locations.city, locations.postcode FROM courses INNER JOIN locations ON courses.location=locations.lid WHERE id = '$courseid'");
  while ($c = $course->fetch(PDO::FETCH_ASSOC)){

  echo "<div id='fh5co-main'>
  			<div class='container'>
  			<div class='row'>
  			<div class='col-md-8'>";

  echo "<form action='' method='post' enctype='multipart/form-data'>";

  //Rich Editor
  echo "<textarea class='input-block-level' id='summernote' name='coursedescription' rows='19'>" . $c['description'] ."</textarea>";


  echo "<div class='form-group text-center'><button type='submit' class='btn btn-outline' name='editcourse'>Update Course</button> <a href='deletelink'><button type='submit' class='btn btn-warning delete' name='deletecourse'>Delete Course</button></a></div>";

  echo "</div>";

  //SIDE BAR
  echo "<div class='col-md-4'>
  			<div class='fh5co-sidebox'>
  			<h3 class='fh5co-sidebox-lead'>Your Selected Course</h3>";

  echo "<div class='form-group'><label>Course Name</label>";
  echo "<input type='text' class='form-control' name='coursename' value='" . $c['name'] . "'></div>";

  echo "<div class='form-group'><label>Course Cost</label>";
  echo "<input type='text' class='form-control' name='coursecost' value='" . $c['cost'] . "'></div>";

  echo "<div class='form-group'><label>Course Start Date</label>";
  echo "<input type='text' class='form-control' id='datepicker' name='coursestart' value='" . $c['startdate'] . "'></div>";

  echo "<div class='form-group'><label>Duration (Days)</label>";
  echo "<input type='text' class='form-control' name='duration' value='" . $c['duration'] . "'></div>";

  echo "<div class='form-group'><label>Course Extras</label>";
  echo "<input type='text' class='form-control' name='courseextras' value='" . $c['extras'] . "'></div>";

  echo "<div class='form-group'><label>Course Location</label>";
  echo "<select class='form-control' name='courselocation'>";
  echo "<option selected='" . $c['address'] . " - " . $c['city'] . "' value='" . $c['lid'] ."'>" . $c['address'] . "</option>";
  echo "<option value='7'>69 Buchanan Street - Glasgow</option>";
  echo "<option value='8'>20-23 Woodside Place - Glasgow</option>";
  echo "<option value='9'>1 Berry Street - Aberdeen</option>";
  echo "<option value='10'>Riverside Drive - Aberdeen</option>";
  echo "<option value='11'>83 Princes Street - Edinburgh</option>";
  echo "<option value='12'>93 Princes Street - Edinburgh</option></select></div>";

  echo "</div>";

  echo "</div>
  			</div>
  			</div>
  			</div>";
  		}

  ?>
  <div id="summernote"></div>
    <script>
    $('#summernote').summernote({
      toolbar: [
        // [groupName, [list of button]]
        ['style', ['bold', 'italic', 'underline', 'clear']],
        ['fontsize', ['fontsize']],
        ['para', ['ul', 'ol', 'paragraph']],
        ['height', ['height']]
      ],
    });
    </script>

  <div class="fh5co-spacer fh5co-spacer-lg"></div>
