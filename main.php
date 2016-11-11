<?php
require_once "config/dbconnect.php";
require_once "header.php";

echo "<aside class='fh5co-page-heading'><div class='container'><div class='row'><div class='col-md-12'>
			<h1 class='fh5co-page-heading-lead'>Your Bookings
   		<span class='fh5co-border'></span>
			</h1>
			</div></div></div></aside>";

echo "<div id='fh5co-main'>
			<div class='container'>
			<div class='row'>
			<div class='col-md-8'>";;

$bookings = $db->query("SELECT bookings.bid, bookings.courseid, bookings.userid, bookings.timebooked, courses.name, courses.id FROM bookings INNER JOIN courses ON bookings.courseid=courses.id WHERE userid = '$_SESSION[userid]'");

if(count($bookings) > 0) {
  echo "<h2>View Your Bookings</h2>";
  echo "<table class='table table-striped'>
        <tr>
        <th>Course Name</th>
        <th>Booked</th></tr>";
        while($o = $bookings->fetch(PDO::FETCH_ASSOC)){
        echo "<tr><td><a href='viewcourse.php?courseid=" . $o['courseid'] . "'>" . $o['name'] ."</td>";
        echo "<td>";
        echo date("j F Y - g:i a", strtotime($o['timebooked']));
        echo "</td></tr>";
      }
      echo "</table>";
      echo "<br />";
}
 ?>
</div>


<!-- Side Bar -->
      <div class="col-md-4">
        <div class="fh5co-sidebox">
          <div class="fh5co-sidebox">
            <h3 class="fh5co-sidebox-lead">Have a problem?</h3>
            <p>You can contact us by using the support page regarding any issues with your booking</p>
        </div>

          <h3 class="fh5co-sidebox-lead">Other Courses</h3>
          <ul class="fh5co-post">
            <li>
              <a href="#">
                <div class="fh5co-post-media"><img src="images/slide_1.jpg" alt="FREEHTML5.co Free HTML5 Template"></div>
                <div class="fh5co-post-blurb">
                  Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                  <span class="fh5co-post-meta">Oct. 12, 2015</span>
                </div>
              </a>
            </li>
            <li>
              <a href="#">
                <div class="fh5co-post-media"><img src="images/slide_2.jpg" alt="FREEHTML5.co Free HTML5 Template"></div>
                <div class="fh5co-post-blurb">
                  Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                  <span class="fh5co-post-meta">Oct. 12, 2015</span>
                </div>
              </a>
            </li>
            <li>
              <a href="#">
                <div class="fh5co-post-media"><img src="images/slide_3.jpg" alt="FREEHTML5.co Free HTML5 Template"></div>
                <div class="fh5co-post-blurb">
                  Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                  <span class="fh5co-post-meta">Oct. 12, 2015</span>
                </div>
              </a>
            </li>
          </ul>

        </div>

    </div>
  </div>
</div>

<div class="fh5co-spacer fh5co-spacer-lg"></div>
<?php require_once "footer.php"; ?>
