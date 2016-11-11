<?php
require_once "../config/dbconnect.php";
require_once "header.php";

$courseid = $_GET['courseid'];

echo "<div id='fh5co-main'>
			<div class='container'>
			<div class='row'>
			<div class='col-md-8'>
      <h2>Course Overview</h2>";;

$bookings = $db->query("SELECT bookings.bid, bookings.courseid, bookings.userid, bookings.timebooked, users.userid, users.firstname, users.lastname FROM bookings INNER JOIN users ON bookings.userid=users.userid WHERE courseid = $courseid");

if(count($bookings) > 0) {
  echo "<table class='table table-striped'>
        <tr>
        <th>Booking ID</th>
        <th>Delegate Name</th>
        <th>Date Booked</th></tr>";
        while($o = $bookings->fetch(PDO::FETCH_ASSOC)){
        echo "<tr><td>". $o['bid'] . "</td>";
        echo "<td>" . $o['firstname'] . " " . $o['lastname'] . "</td>";
        echo "<td>";
        echo date("j F Y - g:i a", strtotime($o['timebooked']));
        echo "</td></tr>";
      }
      echo "</table>";
      echo "<br />";
}
else {
				echo "There are no bookings for this course </td></tr>";
			}

 ?>
</div>


<!-- Side Bar -->
      <div class="col-md-4">
        <div class="fh5co-sidebox">
          <div class="fh5co-sidebox">
            <h3 class="fh5co-sidebox-lead">Course Information</h3>
						<?php
						$courseinfo = $db->query("SELECT courses.id, courses.name, courses.description, courses.cost, courses.extras, courses.location, courses.startdate, courses.duration, courses.availability, locations.lid, locations.address, locations.city, locations.postcode from courses INNER JOIN locations ON courses.location=locations.lid WHERE courses.id = '$courseid'");
						while($u = $courseinfo->fetch(PDO::FETCH_ASSOC)){
							echo "Location: " . $u['address'] . ", " . $u['city'] ."<br>";
							echo "Total Spaces: 15<br>";
							echo "Spaces Available: " . $u['availability'] . "";
						}
						 ?>
        </div>

        </div>

    </div>
  </div>
</div>


<div class="fh5co-spacer fh5co-spacer-lg"></div>
