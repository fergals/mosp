<?php
require_once "config/dbconnect.php";
require_once "header.php";

error_reporting(E_ALL);
ini_set('display_errors', 'on');

//check if user is logged in, if so redirect to index.php
  if ($user->is_logged_in() ) {
    header('Location: main.php');
  }

  //process login form if submitted
  if(isset($_POST['login'])){

  	$username = $_POST['loginemail'];
  	$password = $_POST['loginpassword'];

  	if($user->login($username,$password)){
  		$_SESSION['username'] = $username;
  		header('Location: main.php');
      exit;
  	}
    else $error[] = 'Wrong username or password! Please try again';
  }
?>


	<div class="fh5co-slider">
		<div class="owl-carousel owl-carousel-fullwidth">
		    <div class="item" style="background-image:url(images/slide_1.jpg)">
		    	<div class="fh5co-overlay"></div>
		    	<div class="container">
		    		<div class="row">
		    			<div class="col-md-8 col-md-offset-2">
			    			<div class="fh5co-owl-text-wrap">
						    	<div class="fh5co-owl-text text-center to-animate">
						    		<h1 class="fh5co-lead">NMT</h1>
									<h2 class="fh5co-sub-lead">Napier Management Training have provided the finest courses at the most affordable prices since 2008</h2>
						    	</div>
						    </div>
					    </div>
		    		</div>
		    	</div>
		    </div>
		    <div class="item" style="background-image:url(images/slide_2.jpg)">
		    	<div class="fh5co-overlay"></div>
		    	<div class="container">
		    		<div class="row">
		    			<div class="col-md-8 col-md-offset-2">
			    			<div class="fh5co-owl-text-wrap">
						    	<div class="fh5co-owl-text text-center to-animate">
						    		<h1 class="fh5co-lead">Near You</h1>
									<h2 class="fh5co-sub-lead">Courses are offered in Edinburgh, Glasgow and Aberdeen so you are never too far from succeeding.</h2>
						    	</div>
						    </div>
					    </div>
		    		</div>
		    	</div>
		    </div>
		    <div class="item" style="background-image:url(images/slide_3.jpg)">
		    	<div class="fh5co-overlay"></div>
		    	<div class="container">
		    		<div class="row">
		    			<div class="col-md-8 col-md-offset-2">
			    			<div class="fh5co-owl-text-wrap">
						    	<div class="fh5co-owl-text text-center to-animate">
						    		<h1 class="fh5co-lead">Something</h1>
									<h2 class="fh5co-sub-lead">Course offering to appear here</h2>
						    	</div>
						    </div>
					    </div>
		    		</div>
		    	</div>
		    </div>
		    <div class="item" style="background-image:url(images/slide_4.jpg)">
		    	<div class="fh5co-overlay"></div>
		    	<div class="container">
		    		<div class="row">
		    			<div class="col-md-8 col-md-offset-2">
			    			<div class="fh5co-owl-text-wrap">
						    	<div class="fh5co-owl-text text-center to-animate">
						    		<h1 class="fh5co-lead">Another Course</h1>
									<h2 class="fh5co-sub-lead">Another courses to appear here also</h2>
						    	</div>
						    </div>
					    </div>
		    		</div>
		    	</div>
		    </div>
		</div>
	</div>
	<div id="fh5co-main">
		<!-- Products -->
		<div class="container" id="fh5co-products">
			<div class="row text-left">
				<div class="col-md-8">
					<h2 class="fh5co-section-lead">Courses</h2>
					<h3 class="fh5co-section-sub-lead">Advantage Learning is a specialist provider of Best Practice accredited training, including PRINCE2, PRINCE2 Agile, MSP, MoP and Better Business Cases. We are dedicated to assisting organizations to deliver their projects in time, on budget and to the quality required, through training in best practice project and programme management.</h3>
				</div>
				<div class="fh5co-spacer fh5co-spacer-md"></div>
			</div>
			<div class="row">
				<div class="col-md-3 col-sm-6 col-xs-6 col-xxs-12 fh5co-mb30">
					<div class="fh5co-product">
						<img src="images/index/prince2.png" alt="PRINCE2 Foundation" class="img-responsive img-rounded to-animate">
						<h4>PRINCE2 Foundation</h4>
						<p>Suitable for all those who need to gain a good understanding of the PRINCE2:2009 methodology.</p>
						<p><a href="viewcourse.php?courseid=21">Read more</a></p>
					</div>
				</div>
				<div class="col-md-3 col-sm-6 col-xs-6 col-xxs-12 fh5co-mb30">
					<div class="fh5co-product">
						<img src="images/index/msp.png" alt="MSP Foundation" class="img-responsive img-rounded to-animate">
						<h4>MSP Foundation</h4>
						<p>This course provides a detailed knowledge of MSP's Principles, Governance Themes and Transformational Flow so that you can operate confidently in a MSP environment.</p>
						<p><a href="#">Read more</a></p>
					</div>
				</div>
				<div class="visible-sm-block visible-xs-block clearfix"></div>
				<div class="col-md-3 col-sm-6 col-xs-6 col-xxs-12 fh5co-mb30">
					<div class="fh5co-product">
						<img src="images/index/itilf.png" alt="ITIL Foundation" class="img-responsive img-rounded to-animate">
						<h4>ITIL Foundation</h4>
						<p> ITIL Foundation Certification shows that you can contribute to improving the maturity of an IT organisation. Training includes comprehensive coverage of Foundation certification exam topics, pre-course study, and overview maps of key concepts that will assist you in passing your ITIL Foundation exam.</p>
						<p><a href="viewcourse.php?courseid=22">Read more</a></p>
					</div>
				</div>
				<div class="col-md-3 col-sm-6 col-xs-6 col-xxs-12 fh5co-mb30">
					<div class="fh5co-product">
						<img src="images/index/ITILI.png" alt="ITL Intermediate" class="img-responsive img-rounded to-animate">
						<h4>ITIL Intermediate</h4>
						<p>You learn to plan, implement and optimise CSI processes. Course includes pre-course reading, evening study, the exam and overview maps that illustrate the ITIL lifecycle stages, reinforcing key concepts. The ITIL Intermediate Certificate is required to take the CSI exam.</p>
						<p><a href="viewcourse.php?courseid=24">Read more</a></p>
					</div>
				</div>

			</div>
		</div>
		<!-- Products -->
		<div class="fh5co-spacer fh5co-spacer-lg"></div>

		<div id="fh5co-clients">
			<div class="container">
				<div class="row">
					<div class="col-md-3 col-sm-6 col-xs-6 col-xxs-12 fh5co-client-logo text-center to-animate"><img src="images/client_prince2.png" class="img-responsive" alt="PRINCE2"></div>
					<div class="col-md-3 col-sm-6 col-xs-6 col-xxs-12 fh5co-client-logo text-center to-animate"><img src="images/client_itil.png"  class="img-responsive" alt="ITIL"></div>
					<div class="visible-sm-block visible-xs-block clearfix"></div>
					<div class="col-md-3 col-sm-6 col-xs-6 col-xxs-12 fh5co-client-logo text-center to-animate"><img src="images/client_microsoft.png"  class="img-responsive" alt="Microsoft"></div>
					<div class="col-md-3 col-sm-6 col-xs-6 col-xxs-12 fh5co-client-logo text-center to-animate"><img src="images/impg.png"  class="img-responsive" alt="IMPG"></div>
				</div>
			</div>
		</div>

		<div class="fh5co-bg-section" style="background-image: url(images/slide_2.jpg); background-attachment: fixed;">
			<div class="fh5co-overlay"></div>
			<div class="container">
				<div class="row">
					<div class="col-md-8 col-md-offset-2">
						<div class="fh5co-hero-wrap">
							<div class="fh5co-hero-intro text-center">
								<h4 class="fh5co-lead"><span class="quo">&ldquo;</span>Leadership is working with goals and vision; management is working with objectives. <span class="quo">&rdquo;</span></h4>
								<p class="author">&mdash; <cite>Steve Jobs</cite></p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

	</div>
<?php require_once "footer.php"; ?>
