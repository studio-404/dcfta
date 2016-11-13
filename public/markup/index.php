<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
	<title>DCFTA</title>
	<script src="js/jquery-3.1.1.min.js" type="text/javascript"></script>
	<script src="js/materialize.min.js" type="text/javascript"></script>
	<script src="js/script.js" type="text/javascript"></script>
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="css/materialize.min.css" />
	<link rel="stylesheet" type="text/css" href="css/style.css" />
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
				<li><a href="" class="active">Home</a></li>
				<li><a href="">About</a></li>
				<li><a href="">Agreement</a></li>
				<li><a href="">Implimentation</a></li>
				<li><a href="">Coordination</a></li>
				<li><a href="">Legislation</a></li>
				<li><a href="">International Support</a></li>
				<li><a href="">DCFTA for bussiness</a></li>
				<li><a href="">News &amp; Events</a></li>
				<li><a href="">Contact</a></li>
			</ul>
		</section>


		
	</section>

</header>

<section class="mobileNavigation">
	<section class="yellowBox"></section>
	<section class="blueBox">
		<ul>
			<li><a href="" class="active">Home</a></li>
			<li><a href="">About</a></li>
		</ul>
	</section>
</section>

<main>
	<section class="centerWidth">
		<section class="row">
			<section class="col s8 leftSide">
				left side
			</section>
			<section class="col s4 rightSide">
				right side
			</section>
		</section>
	</section>	
</main>

</body>
</html>