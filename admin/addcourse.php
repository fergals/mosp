<?php
require ($_SERVER['DOCUMENT_ROOT'].'/config/dbconnect.php');
require ($_SERVER['DOCUMENT_ROOT'].'/functions.php');
getHeader();


$error = false;

if (isset($_POST['addcourse']))
{
  $validated = true;
    $cname = trim($_POST['coursename']);;
    $cdesc = trim($_POST['coursedescription']);
    $ccost = trim($_POST['coursecost']);
    $cextras = trim($_POST['courseextras']);
    $clocation = trim($_POST['courselocation']);
    $cstartdate = trim($_POST['coursestart']);
    $cenddate = trim($_POST['duration']);

    if(empty($cname )){
      $error = true;
      $coursename_error = "<font color='red'>Please enter the name of the course</font>";
    }

    if(empty($cdesc)){
      $error = true;
      $coursedescription_error = "<font color='red'>Please enter the course description</font>";
    }

    if(empty($ccost)){
      $error = true;
      $coursecost_error = "<font color='red'>Enter course cost without £</font>";
    }

    if(empty($cextras)){
      $error = true;
      $courseextras_error = "<font color='red'>If no course extras enter NONE</font>";
    }

    if(empty($cstartdate)){
      $error = true;
      $coursestart_error = "<font color='red'>Please enter start date for course</font>";
    }

    if(!is_numeric($cenddate)){
      $error = true;
      $courseduration_error = "<font color='red'>Please enter length of course in days (Number only)</font>";
    }

    if (!$error) {
        $stmt = $db->prepare("INSERT INTO courses (name, description, cost, extras, location, startdate, duration) VALUES (:coursename, :cdesc, :coursecost, :courseextras, :courselocation, :coursestart, :courseduration)");
        $stmt->bindParam(':coursename', $cname, PDO::PARAM_STR, 100);
        $stmt->bindParam(':cdesc', $cdesc, PDO::PARAM_STR, 100000);
        $stmt->bindParam(':coursecost', $ccost, PDO::PARAM_STR, 10);
        $stmt->bindParam(':courseextras', $cextras, PDO::PARAM_STR, 200);
        $stmt->bindParam(':courselocation', $clocation, PDO::PARAM_STR, 30);
        $stmt->bindParam(':coursestart', $cstartdate, PDO::PARAM_STR, 20);
        $stmt->bindParam(':courseduration', $cenddate, PDO::PARAM_STR, 20);
        $stmt->execute();

        echo "<div class='alert alert-success' role='alert'>Successsfull added course</div>";
      }
    }

            echo "<div id='fh5co-main'>
                  <div class='container'>
                  <div class='row'>
                  <div class='col-md-8'>";

            echo "<form action='' method='post' enctype='multipart/form-data'>";

            //Rich Editor
            echo "<textarea class='input-block-level' id='summernote' name='coursedescription' rows='19'></textarea>";


            echo "<div class='form-group text-center'><button type='submit' class='btn btn-outline' name='addcourse'>Add New Course</button></div>";

            echo "</div>";

            //SIDE BAR
            echo "<div class='col-md-4'>
                  <div class='fh5co-sidebox'>
                  <h3 class='fh5co-sidebox-lead'>Course Details</h3>";

            echo "<div class='form-group'><label>Course Name</label>";
            echo "<input type='text' class='form-control' name='coursename'>";
                  if (isset($coursename_error)) echo $coursename_error;
            echo "</div>";

            echo "<div class='form-group'><label>Course Cost</label>";
            echo "<input type='text' class='form-control' name='coursecost'>";
                  if (isset($coursecost_error)) echo $coursecost_error;
            echo "</div>";

            echo "<div class='form-group'><label>Course Start Date</label>";
            echo "<input type='text' class='form-control' name='coursestart' id='datepicker'>";
                  if (isset($coursestart_error)) echo $coursestart_error;
            echo "</div>";

            echo "<div class='form-group'><label>Duration (Days)</label>";
            echo "<input type='text' class='form-control' name='duration'>";
                  if (isset($courseduration_error)) echo $courseduration_error;
            echo "</div>";

            echo "<div class='form-group'><label>Course Extras</label>";
            echo "<input type='text' class='form-control' name='courseextras'>";
                  if (isset($courseextras_error)) echo $courseextras_error;
            echo "</div>";

            echo "<div class='form-group'><label>Course Location</label>";
            echo "<select class='form-control' name='courselocation'>";
            $stmt = $db->prepare("SELECT lid, city, address FROM locations ORDER BY city");
            $stmt->execute();
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            echo "<option value='" . $row['lid'] . "'>". $row['address'] . " - " . $row['city'] ."</option>";
            }
            echo "</select></div>";

            // echo "<div class='form-group'><label>Course Location</label>";
            // echo "<select class='form-control' name='courselocation'>";
            // echo "<option value='Aberdeen'>Aberdeen</option>";
            // echo "<option value='Edinburgh'>Edinburgh</option>";
            // echo "<option value='Glasgow'>Glasgow</option></select></div>";

            echo "</div>";

            echo "</div>
                  </div>
                  </div>
                  </div>";
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
