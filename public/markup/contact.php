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
				<li><a href=""><span>Agreement</span></a></li>
				<li><a href=""><span>Implimentation</span></a></li>
				<li><a href=""><span>Coordination</span></a></li>
				<li><a href=""><span>Legislation</span></a></li>
				<li><a href="is.php"><span>International Support</span></a></li>
				<li class="sub" data-sub="i25">
					<a href="?dcfta-for-bussiness" class="slide"><span>DCFTA for bussiness</span></a> <i class="arrow"></i>
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
				<li><a href=""><span>News &amp; Events</span></a></li>
				<li><a href="contact.php" class="active"><span>Contact</span></a></li>
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
			
			<section class="col s12 m6 l8 leftSide">
				<section class="headerText">
					<div class="line"></div>
					<div class="title">Get in touch</div>
				</section>
				
				<section class="contactForm">
					<form action="" method="post">
						<section class="marginminus10">
							<div class="input-field col s12 m6 l4">
					          <input id="subject" type="text" class="validate">
					          <label for="subject">Subject</label>
					        </div>
					        <div class="clearer"></div>
							
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

					        <div class="input-field col s12 m6 l8">
					          <input id="first_name" type="text" class="validate">
					          <label for="first_name">Comment</label>
					        </div>

					        <div class="col s12 m12 l12">
					        	<a class="waves-effect waves-light btn submit">Submit</a>
					        </div>
				        </section>
				        
					</form>
				</section>

			</section>

			<section class="col s12 m6 l4 rightSide">
				<section class="justTitle">Contact details</section>
				<section class="contactDetails">
					<p>Tbilisi Office</p>
					<p>Address: 18 Chovelidze str. 0102</p>
					<p>Tbilisi, Georgia</p>
					<p>Hotline: +995 32 2 95 00 07</p>
					<p>E-mail: info@dcfta.org.ge</p>
				</section>

				<section class="map">
					<section class="header">MOEFSD</section>
					<section class="init-map"></section>
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