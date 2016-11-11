<?php
require_once "config/dbconnect.php";
require_once "header.php";

$courseid = $_GET['courseid'];
$userid = $_GET['uid'];

$course = $db->query("SELECT id, name, description, cost, startdate, duration, location, extras, availability FROM courses WHERE id = '$courseid'");
while ($c = $course->fetch(PDO::FETCH_ASSOC)){
echo "<aside class='fh5co-page-heading'><div class='container'><div class='row'><div class='col-md-12'>
			<h1 class='fh5co-page-heading-lead'>Payment
   		<span class='fh5co-border'></span>
			</h1>
			</div></div></div></aside>";

echo "<div id='fh5co-main'>
			<div class='container'>
			<div class='row'>
			<div class='col-md-8'>
			<h2>Thank you for registering</h2>
			<p>Please select your payment method and enter your credit card details to complete your course booking.</p>";

			echo "<form class='form-horizontal' role='form'>
						<fieldset>
						<!-- PayPal Logo --><table border='0' cellpadding='10' cellspacing='0' align='center'><tr><td align='center'></td></tr><tr><td align='center'><a href='https://www.paypal.com/uk/webapps/mpp/paypal-popup' title='How PayPal Works' onclick='javascript:window.open('https://www.paypal.com/uk/webapps/mpp/paypal-popup','WIPaypal','toolbar=no, location=no, directories=no, status=no, menubar=no, scrollbars=yes, resizable=yes, width=1060, height=700'); return false;'><img src='https://www.paypalobjects.com/webstatic/mktg/Logo/AM_SbyPP_mc_vs_ms_ae_UK.png' border='0' alt='PayPal Acceptance Mark'></a></td></tr></table><!-- PayPal Logo -->
						<div class='form-group'>
						<label class='col-sm-3 control-label' for='card-holder-name'>Name on Card</label>
						<div class='col-sm-9'>
							<input type='text' class='form-control' name='card-holder-name' id='card-holder-name' placeholder='John Smith'>
						</div>
					</div>
					<div class='form-group'>
						<label class='col-sm-3 control-label' for='card-number'>Card Number</label>
						<div class='col-sm-9'>
							<input type='text' class='form-control' name='card-number' id='card-number' placeholder='1600 3652 0369 8520'>
						</div>
					</div>
					<div class='form-group'>
						<label class='col-sm-3 control-label' for='expiry-month'>Expiration Date</label>
						<div class='col-sm-9'>
							<div class='row'>
								<div class='col-xs-3'>
									<select class='form-control col-sm-2' name='expiry-month' id='expiry-month'>
										<option>Month</option>
										<option value='01'>Jan (01)</option>
										<option value='02'>Feb (02)</option>
										<option value='03'>Mar (03)</option>
										<option value='04'>Apr (04)</option>
										<option value='05'>May (05)</option>
										<option value='06'>June (06)</option>
										<option value='07'>July (07)</option>
										<option value='08'>Aug (08)</option>
										<option value='09'>Sep (09)</option>
										<option value='10'>Oct (10)</option>
										<option value='11'>Nov (11)</option>
										<option value='12'>Dec (12)</option>
									</select>
								</div>
								<div class='col-xs-3'>
									<select class='form-control' name='expiry-year'>
										<option value='13'>2013</option>
										<option value='14'>2014</option>
										<option value='15'>2015</option>
										<option value='16'>2016</option>
										<option value='17'>2017</option>
										<option value='18'>2018</option>
										<option value='19'>2019</option>
										<option value='20'>2020</option>
										<option value='21'>2021</option>
										<option value='22'>2022</option>
										<option value='23'>2023</option>
									</select>
								</div>
							</div>
						</div>
					</div>
					<div class='form-group'>
						<label class='col-sm-3 control-label' for='cvv'>Card CVV</label>
						<div class='col-sm-3'>
							<input type='text' class='form-control' name='cvv' id='cvv' placeholder='123'>
						</div>
					</div>
					<div class='form-group'>
						<div class='col-sm-offset-3 col-sm-9'>
							<a href='confirmation.php?courseid=" . $courseid . "&uid=$userid'><button type='button' class='btn btn-primary'>Pay Now</button></a>
						</div>
					</div>
				</fieldset>
			</form>";

echo "</div>";

//SIDE BAR
echo "<div class='col-md-4'>

			<div class='fh5co-sidebox'>
			<h3 class='fh5co-sidebox-lead'>Your Selected Course</h3>
			<ul class='fh5co-list-check'>
			<li>". $c['name'] ."</li>
			<li>Starts: ". $c['startdate'] ."</li>
			<li>Duration: ". $c['duration'] ." Days</li>
			<li>Location: ". $c['location'] ."</li>
			<li>Current Availability: ". $c['availability'] ." Spaces</li>
			<li>Extras: ". $c['extras'] ."</li>
			<li>Cost: £". $c['cost'] ."</li>
			</ul>
			</div>";

echo "</div>
			</div>
			</div>
			</div>";
		}

?>


<div class="fh5co-spacer fh5co-spacer-lg"></div>
<?php require_once "footer.php"; ?>
