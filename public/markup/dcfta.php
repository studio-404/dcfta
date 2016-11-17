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
					<a href="dcfta.php" class="slide active"><span>DCFTA for bussiness</span></a> <i class="arrow"></i>
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
				<li><a href="news.php"><span>News &amp; Events</span></a></li>
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
			<section class="col s12 m6 l3 leftSide">

				<section class="leftNavigation">
					<section class="yellowBG"></section>
					<section class="nav">
						<ul>
							<li><a href="">Sectors</a></li>
							<li><a href="">Technical requirements</a></li>
							<li><a href="" class="active">Public services</a></li>
							<li><a href="">Standarts</a></li>
							<li><a href="">Certifications</a></li>
							<li><a href="">Rules of origin</a></li>
							<li><a href="">Custom procedures</a></li>
						</ul>
					</section>
				</section>

				<section class="justTitle">Links and publications</section>
				<ul class="usefullLinks">
					<li>
						<a href="" class="waves-effect waves-light">
							<img src="img/eur2.png" alt="">
							<span>European Union Commission</span>
						</a>
					</li>
					<li>
						<a href="" class="waves-effect waves-light">
							<img src="img/eur2.png" alt="">
							<span>European Parliament</span>
						</a>
					</li>
					<li>
						<a href="" class="waves-effect waves-light"><img src="img/eur2.png" alt="">
							<span>European consillium</span>
						</a>
					</li>
				</ul>


				<section class="files-no-bg">
					<section class="file">
						<a href="">
							<p class="pdfIcon"></p>
							<p class="downloadIcon"></p>
							<p class="title"><span>Georgia-EU Deep &amp; Comprehensive Free Trade Area  Report 2016</span><br><b>355kb</b></p>
						</a>
					</section>

					<section class="file">
						<a href="">
							<p class="pdfIcon"></p>
							<p class="downloadIcon"></p>
							<p class="title"><span>Georgia-EU Deep &amp; Comprehensive Free Trade Area  Report 2016</span><br><b>355kb</b></p>
						</a>
					</section>
				</section>
			</section>

			<section class="col s12 m6 l9 rightSite">
				<section class="justTitle">Public services</section>
				<section class="justSubTitle">The agreement has been signed, six nations - one target</section>
				<section class="justDate">published: 12 January 2017</section>

				<section class="mainText">
					<p>The economy of Georgia is an emerging free market. Its gross domestic product fell sharply following the collapse of the Soviet Union but recovered in the mid-2000s, growing in double digits  reforms brought by the peaceful Rose Revolution. Georgia continued its economic progress since, "moving from a near-failed state in 2003 to a relatively well-functioning market economy in 2014".[19] In 2007, the World Bank named Georgia the World's number one economic reformer,[20][21] and has consistently ranked the country at the top of its ease of doing business index.

Georgia's economy is supported by a relatively free and transparent atmosphere in the country. According to Transparency International's 2015 report, Georgia is the least corrupt nation in the Black Sea region, outperforming all of its immediate neighbors, as well as nearby European Union states.[22] With a mixed news media environment, Georgia is also the only country in its immediate neighborhood where the press is not deemed unfree.[23]</p>
			<p>The economy of Georgia is an <a href="">emerging free market.</a> Its gross domestic product fell sharply following the collapse of the Soviet Union but recovered in the mid-2000s, growing in double digits  reforms brought by the peaceful Rose Revolution. Georgia continued its economic progress since, "moving from a near-failed state in 2003 to a relatively well-functioning market economy in 2014".[19] In 2007, the World Bank named Georgia the World's number one economic reformer,[20][21] and has consistently ranked the country at the top of its ease of doing business index.
</p>
<p>Georgia's economy is supported by a relatively free and transparent atmosphere in the country. According to Transparency International's 2015 report, Georgia is the least corrupt nation in the Black Sea region, outperforming all of its immediate neighbors, as well as nearby European Union states.[22] With a mixed news media environment, Georgia is also the only country in its immediate neighborhood where the press is not deemed unfree.[23]</p>
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