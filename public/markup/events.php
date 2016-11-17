<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
	<title>DCFTA</title>
	<script src="js/jquery-3.1.1.min.js" type="text/javascript"></script>
	<script src="js/materialize.min.js" type="text/javascript"></script>
	<script src="js/script.js?time=<?=time()?>" type="text/javascript"></script>
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="css/materialize.min.css" />
	<link rel="stylesheet" type="text/css" href="css/style.css?time=<?=time()?>" />
</head>
<body>

<header>
	<section class="top">
		<section class="centerWidth topCenter">
			<section class="top-box">
				<section class="social-networks">
					<ul>
						<li class="fb"><a href=""></a></li>
						<li class="tw"><a href=""></a></li>
						<li class="yt"><a href=""></a></li>
					</ul>
				</section>
				<section class="languages">
					<ul>
						<li><a href="">GEO</a></li>
						<li><a href="" class="active">ENG</a></li>
						<li><a href="">RUS</a></li>
					</ul>
				</section>
			</section>
		</section>
	</section>

	<section class="topBottom">
		<section class="centerWidth">
			<section class="logo">
				<div class="flags">
					<p><img src="img/geo.png" alt="Georgian Flag" /></p>
					<p><img src="img/eur.png" alt="Georgian Flag" /></p>
					<p>dcfta.gov.ge</p>
				</div>
				<div class="text">Georgia-EU Deep &amp; Comprehensive Free Trade Area</div>
			</section>
			<section class="search">
				<i class="material-icons">search</i>
				<div class="input-field">
					<input id="searchInput" type="text" value="Search" data-val="Search" onclick="searchInputOn()" onblur="searchInputOff()" />
				</div>
			</section>
	
			<section class="nav_bg">
				<div class="nav_bar" onclick="openNavigation()">
					<div class="c-hamburger c-hamburger--htx">
					<span>toggle menu</span>
				</div>
			</section>


		</section>

		<section class="navigation">
			<ul>
				<li><a href="index.php"><span>Home</span></a></li>
				<li class="sub" data-sub="i24">
					<a href="about.php" class="slide"><span>About</span></a>  <i class="arrow"></i>
					<ul class="i24">
						<li><a href=""><span>About us</span></a></li>
						<li><a href=""><span>Our Team</span></a></li>
					</ul>
				</li>
				<li><a href="agreement.php"><span>Agreement</span></a></li>
				<li><a href="implimentation.php"><span>Implimentation</span></a></li>
				<li><a href="coordination.php"><span>Coordination</span></a></li>
				<li><a href="legislation.php"><span>Legislation</span></a></li>
				<li><a href="is.php"><span>International Support</span></a></li>
				<li class="sub" data-sub="i25">
					<a href="dcfta.php" class="slide"><span>DCFTA for bussiness</span></a> <i class="arrow"></i>
					<ul class="i25">
						<li><a href=""><span>Sectors</span></a></li>
						<li><a href=""><span>Technical requirements</span></a></li>
						<li><a href=""><span>Public services</span></a></li>
						<li><a href=""><span>Standarts</span></a></li>
						<li><a href=""><span>Certifications</span></a></li>
						<li><a href=""><span>Rules of origin</span></a></li>
						<li><a href=""><span>Custom procedures</span></a></li>
					</ul>
				</li>
				<li><a href="news.php" class="active"><span>News &amp; Events</span></a></li>
				<li><a href="contact.php"><span>Contact</span></a></li>
			</ul>
		</section>


		
	</section>

</header>

<section class="mobileNavigation">
	<section class="yellowBox"></section>
	<section class="blueBox"></section>
</section>

<main>
	<section class="centerWidth">
		<section class="row">
			<section class="col s12 m6 l8">
				<section class="headerText">
					<div class="line"></div>
					<div class="title">Events</div>
				</section>
				<section class="event">
					<img src="img/event.jpg" width="350" height="218" alt="" align="left" style="margin: 0 10px 10px 0px" />
					<section class="justTitle">Meeting with International donor organisations</section> 
					<section class="justDate">published: 12 January 2017</section>
					<section class="mainText"><p>The economy of Georgia is an emerging free market. Its gross domestic product fell sharply following the collapse of the Soviet Union but recovered in the mid-2000s, growing in double digits  The economy of Georgia is an emerging free market. Its gross domestic product fell sharply following the collapse of the Soviet Union but recovered in the mid-2000s, growing in double digits  reforms brought by the peaceful Rose Revolution. </p>

					<section class="justTitle marginTop40">Register for this event</section>
					
					<section class="contactForm">
					<form action="" method="post">
						<section class="marginminus10">							
							<div class="input-field col s12 m6 l4">
					          <input id="first_name" type="text" class="validate">
					          <label for="first_name">Your Name</label>
					        </div>

					        <div class="input-field col s12 m6 l4">
					          <input id="first_name" type="text" class="validate">
					          <label for="first_name">Organization</label>
					        </div>

					        <div class="input-field col s12 m6 l4">
					          <input id="first_name" type="text" class="validate">
					          <label for="first_name">Email Address</label>
					        </div>

					        <div class="input-field col s12 m6 l4">
					          <input id="first_name" type="text" class="validate">
					          <label for="first_name">Phone</label>
					        </div>

					        <div class="col s12 m12 l12">
					        	<a class="waves-effect waves-light btn submit" style="text-decoration: none;">Submit</a>
					        </div>
				        </section>
				        
					</form>
				</section>



					</section>
				</section>
			</section>
			<section class="col s12 m6 l4">
				<section class="justTitle">Event Calendar</section>
				<section class="CalendarBox">
					<?php 
					@include('calendar.php'); 
					$calendar = new calendar();
					echo $calendar->index("en"); 
					?>
				</section>

				<section class="justTitle marginTop40">Publications</section>
				<section class="files files-desktop" style="margin: 10px 0px; width: 100%">
					<section class="col s12 m12 l12 reports">
						<section class="file">
							<a href="">
								<p class="pdfIcon"></p>
								<p class="downloadIcon"></p>
								<p class="title"><span>Georgia-EU Deep & Comprehensive Free Trade Area  Report 2016</span><br /><b>355kb</b></p>
							</a>
						</section>

						<section class="file">
							<a href="">
								<p class="pdfIcon"></p>
								<p class="downloadIcon"></p>
								<p class="title"><span>Georgia-EU Deep & Comprehensive Free Trade Area  Report 2016</span><br /><b>355kb</b></p>
							</a>
						</section>

						<section class="file">
							<a href="">
								<p class="pdfIcon"></p>
								<p class="downloadIcon"></p>
								<p class="title"><span>Georgia-EU Deep & Comprehensive Free Trade Area  Report 2016</span><br /><b>355kb</b></p>
							</a>
						</section>

						<section class="file">
							<a href="">
								<p class="pdfIcon"></p>
								<p class="downloadIcon"></p>
								<p class="title"><span>Georgia-EU Deep & Comprehensive Free Trade Area  Report 2016</span><br /><b>355kb</b></p>
							</a>
						</section>
					</section>
				</section>
			</section>

		</section>	
	</section>
</main>

<footer>
	<section class="centerWidth">		
		<section class="row marginBottom55">
			<section class="marginminus10">
				<section class="col s12 m12 l12">
					<section class="col s6 m3 l3"><a href=""><img src="img/geoeuro.jpg" alt="" class="bigImage" /></a></section>
					<section class="col s6 m3 l2"><a href=""><img src="img/giz.jpg" alt="" /></a></section>
					<section class="col s12 m3 l5 mobileMarginTop20"><p>This website has been produced with support of the EU funded project “SME Development and DCFTA in Georgia” implemented by Deutsche Gesellschaft für Internationale Zusammenarbeit (GIZ) GmbH on behalf of German Federal Ministry for Economic Cooperation and Development (BMZ). The contents of this website do not necessarily reflect the views of the European Union.</p></section>	
					<section class="col s12 m2 l3"></section>				
				</section>
			</section>
		</section>

		<section class="footerText">
			<section class="marginminus10" style="margin:0">
			<p class="left">Ministry of Economy and Sustainable Development of Georgia 2016. DCFTA.gov.ge</p>
			<p class="right"><a href=""><img src="img/logo.png" alt="logo" class="logo" /></a></p>
			</section>
		</section>
	</section>
</footer>

</body>
</html>