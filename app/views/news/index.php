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
			<section class="col s12 m6 l8">
				<section class="headerText">
					<div class="line"></div>
					<div class="title">News</div>
				</section>
				<section class="event">
					<?=$data['mainnews']?>
					<?php
					if(isset($data['othernews'])):
					?>
					<section class="marginminus10 marginTop40">
						<section class="col s12 m12 l12">
							<section class="headerText">
								<div class="line"></div>
								<div class="title">Other news</div>
							</section>
						</section>
						<?=$data['othernews']?>
					</section>
					<?php
					endif;
					?>
				</section>
			</section>
			<section class="col s12 m6 l4">
				<section class="justTitle">Event Calendar</section>
				<section class="CalendarBox">
					<?php
					require_once('app/functions/calendar.php'); 
					$calendar = new functions\calendar();
					echo $calendar->index($_SESSION['LANG']); 
					?>
				</section>

				<section class="justTitle marginTop40">Publications</section>
				<section class="files files-desktop" style="margin: 10px 0px; width: 100%">
					<section class="col s12 m12 l12 reports">
						<?=$data['publications']?>
					</section>
				</section>
			</section>

		</section>	
	</section>
</main>


<?=$data['footer']?>

</body>
</html>