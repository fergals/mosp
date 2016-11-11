<?php
require_once "config/dbconnect.php";
require_once "header.php";

$courseid = $_GET['courseid'];

$course = $db->query("SELECT id, name, description, cost, startdate, duration, location, extras, availability FROM courses WHERE id = '$courseid'");
while ($c = $course->fetch(PDO::FETCH_ASSOC)){
echo "<aside class='fh5co-page-heading'><div class='container'><div class='row'><div class='col-md-12'>
			<h1 class='fh5co-page-heading-lead'>". $c['name'] ."
   		<span class='fh5co-border'></span>
			</h1>
			</div></div></div></aside>";

echo "<div id='fh5co-main'>
			<div class='container'>
			<div class='row'>
			<div class='col-md-8'>
			<h2>". $c['name'] ."</h2>
			<p>". $c['description'] ."</p>

			</div>";

//SIDE BAR
echo "<div class='col-md-4'>

			<div class='fh5co-sidebox'>
			<h3 class='fh5co-sidebox-lead'>Your Selected Course</h3>
			<ul class='fh5co-list-check'>
			<li>". $c['name'] ."</li>
			<li>Starts: ". $c['startdate'] ."</li>
			<li>Duration: ". $c['duration'] ." Days</li>
			<li>Current Availability: ". $c['availability'] ." Spaces</li>
			<li>Extras: ". $c['extras'] ."</li>
			<li>Cost: £". $c['cost'] ."</li>
			</ul>
			</div>";

//If logged in go straight to payment or else go to register
if (isset($_SESSION['loggedin']) == true) {
	echo "<div class='fh5co-sidebox'><br><a href='payment.php?courseid=". $c['id'] ."&uid=" . $_SESSION['userid'] . "' class='btn btn-primary'>Enrol on Course</a></div>";
}
	else {
		echo "<div class='fh5co-sidebox'><br><a href='bookcourse.php?courseid=". $c['id'] ."' class='btn btn-primary'>Enrol on Course</a></div>";
		}


//Google MAPS API - AIzaSyAPwGMnxRk6lIG3F25EPvUEW_dx7hrrEk8
$stmt = $db->query("SELECT location from courses WHERE id = '$courseid'");
$locationid = $stmt->fetchColumn(0);

$location = $db->query("SELECT courses.id, courses.location, locations.lid, locations.address, locations.city, locations.postcode from courses INNER JOIN locations ON courses.location=locations.lid WHERE id = '$courseid'");
while ($l = $location->fetch(PDO::FETCH_ASSOC)){

if ($locationid == 7) {
	echo "<div class='fh5co-sidebox'>
				<h3 class='fh5co-sidebox-lead'>Location</h3><br>";
	echo $l['address'] . ", " . $l['city'] . " - " . $l['postcode'];
	echo "<iframe width='270' height='400' frameborder='0' style='border:0' src='https://www.google.com/maps/embed/v1/search?key=AIzaSyAPwGMnxRk6lIG3F25EPvUEW_dx7hrrEk8&q=69+Buchanan+St,+Glasgow,+UK'></iframe>
				</div>";
}

if ($locationid == 8) {
	echo "<div class='fh5co-sidebox'>
				<h3 class='fh5co-sidebox-lead'>Location</h3><br>";
	echo $l['address'] . ", " . $l['city'] . " - " . $l['postcode'];
	echo "<iframe width='270' height='400' frameborder='0' style='border:0' src='https://www.google.com/maps/embed/v1/search?key=AIzaSyAPwGMnxRk6lIG3F25EPvUEW_dx7hrrEk8&q=20+Woodside+Place,+Glasgow,+UK'></iframe>
				</div>";
}

if ($locationid == 9) {
	echo "<div class='fh5co-sidebox'>
				<h3 class='fh5co-sidebox-lead'>Location</h3><br>";
	echo $l['address'] . ", " . $l['city'] . " - " . $l['postcode'];
	echo "<iframe width='270' height='400' frameborder='0' style='border:0' src='https://www.google.com/maps/embed/v1/search?key=AIzaSyAPwGMnxRk6lIG3F25EPvUEW_dx7hrrEk8&q=1+Berry+Street,+Aberdeen,+UK'></iframe>
				</div>";
}

if ($locationid == 10) {
	echo "<div class='fh5co-sidebox'>
				<h3 class='fh5co-sidebox-lead'>Location</h3><br>";
	echo $l['address'] . ", " . $l['city'] . " - " . $l['postcode'];
	echo "<iframe width='270' height='400' frameborder='0' style='border:0' src='https://www.google.com/maps/embed/v1/search?key=AIzaSyAPwGMnxRk6lIG3F25EPvUEW_dx7hrrEk8&q=Riverside+Drive,+Aberdeen,+UK'></iframe>
				</div>";
}

if ($locationid == 11) {
	echo "<div class='fh5co-sidebox'>
				<h3 class='fh5co-sidebox-lead'>Location</h3><br>";
	echo $l['address'] . ", " . $l['city'] . " - " . $l['postcode'];
	echo "<iframe width='270' height='400' frameborder='0' style='border:0' src='https://www.google.com/maps/embed/v1/search?key=AIzaSyAPwGMnxRk6lIG3F25EPvUEW_dx7hrrEk8&q=83+Princes+Street,+Edinburgh,+UK'></iframe>
				</div>";
}

if ($locationid == 12) {
	echo "<div class='fh5co-sidebox'>
				<h3 class='fh5co-sidebox-lead'>Location</h3><br>";
	echo $l['address'] . ", " . $l['city'] . " - " . $l['postcode'];
	echo "<iframe width='270' height='400' frameborder='0' style='border:0' src='https://www.google.com/maps/embed/v1/search?key=AIzaSyAPwGMnxRk6lIG3F25EPvUEW_dx7hrrEk8&q=93+George+Street,+Edinburgh,+UK'></iframe>
				</div>";
}

echo "</div>
			</div>
			</div>
			</div>";
}
}
?>


<div class="fh5co-spacer fh5co-spacer-lg"></div>
<?php require_once "footer.php"; ?>
