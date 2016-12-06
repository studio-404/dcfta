<?=$data['headerModule']?>
<header>
	<section class="top">
		<section class="centerWidth topCenter">
			<section class="top-box">
				<section class="social-networks">
					<?=$data['socialNetworksModule']?>
				</section>
				<section class="languages">
					<?=$data['languagesModule']?>
				</section>
			</section>
		</section>
	</section>

	<section class="topBottom">
		<section class="centerWidth">
			<section class="logo">
				<div class="flags">
					<p><img src="<?=$data['header']['public']?>img/geo.png" alt="Georgian Flag" /></p>
					<p><img src="<?=$data['header']['public']?>img/eur.png" alt="Georgian Flag" /></p>
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
			<?=$data['navigationModule']?>
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
					<div class="title">About DCFTA</div>
				</section>
				<section class="mainText">
					<img src="img/about.jpg" width="100%" alt="" /><br />
					<p>Georgia continued its economic progress since, "moving from a near-failed state in 2003 to a relatively well-functioning market economy in 2014".[19] In 2007, the World Bank named Georgia the World's number one economic reformer.
Georgia's economy is supported by a relatively free and transparent atmosphere in the country. According to Transparency International's 2015 report, Georgia is </p>
					<br>
					<p>Georgia continued its economic progress since, "moving from a near-failed state in 2003 to a relatively well-functioning market economy in 2014".[19] In 2007, the World Bank named Georgia the World's number one economic reformer.
Georgia's economy is supported by a relatively free and transparent atmosphere in the country. According to Transparency International's 2015 report, Georgia is </p>

					<ul>
						<li>Its gross domestic product fell sharply </li>
						<li>Georgia continued its economic progress since</li>
						<li>In 2007, the World Bank named Georgia the World's number one</li>
						<li>The country at the top of its ease of doing business index.</li>
					</ul>
				</section>
				
				

			</section>
			<section class="col s12 m6 l4 rightSide">
				<section class="justTitle">State Agencies</section>
				<ul class="usefullLinks">
					<li>
						<a href="" class="waves-effect waves-light">
							<img src="img/eur2.png" alt="" />
							<span>European Union Commission</span>
						</a>
					</li>
					<li>
						<a href="" class="waves-effect waves-light">
							<img src="img/eur2.png" alt="" />
							<span>European Parliament</span>
						</a>
					</li>
					<li>
						<a href="" class="waves-effect waves-light"><img src="img/eur2.png" alt="" />
							<span>European consillium</span>
						</a>
					</li>
					<li>
						<a href="" class="waves-effect waves-light">
							<img src="img/eur2.png" alt="" />
							<span>European central bank</span>
						</a>
					</li>
					<li>
						<a href="" class="waves-effect waves-light">
							<img src="img/eur2.png" alt="" />
							<span>European investment bank</span>
						</a>
					</li>
					<li>
						<a href="" class="waves-effect waves-light">
							<img src="img/eur2.png" alt="" />
							<span>European ombudsmen</span>
						</a>
					</li>
					<li>
						<a href="" class="waves-effect waves-light">
							<img src="img/eur2.png" alt="" />
							<span>European youth parliament</span>
						</a>
					</li>
				</ul>

			</section>



		</section>
	</section>	
</main>
<?=$data['footer']?>

</body>
</html>