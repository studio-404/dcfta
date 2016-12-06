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
					<div class="title"><?=@html_entity_decode($data['pageData']['description'])?></div>
				</section>
				<section class="mainText">
					<?=@html_entity_decode($data['pageData']['text'])?>
				</section>
				
				<section class="marginminus10">
					<section class="col s12 m12 l6">
						<section class="justTitle">Reports</section>
						<section class="files files-mobile" data-type="reports"></section>
					</section>

					<section class="col s12 m12 l6">
						<section class="justTitle">Publications</section>
						<section class="files files-mobile" data-type="publications"></section>
					</section>

					<section class="files files-desktop">
						<section class="col s12 m12 l6 reports">
							<?=$data['reports']?>
						</section>

						<section class="col s12 m12 l6 publications">
							<?=$data['publications']?>
						</section>
					</section>
				</section>
				
				<section class="marginminus10">
					<section class="col s12 m12 l12">
						<section class="headerText">
							<div class="line"></div>
							<div class="title">Latest news</div>
						</section>
					</section>
					
					<?=$data['news']?>
				</section>

			</section>
			<section class="col s12 m6 l4 rightSide">
				<section class="justTitle">EU Important links</section>
				<?=$data['euLinks']?>
				<section class="justTitle marginTop40">Event Calendar</section>
				
				<section class="CalendarBox">
					<?php
					require_once('app/functions/calendar.php'); 
					$calendar = new functions\calendar();
					echo $calendar->index($_SESSION['LANG']); 
					?>
				</section>

			</section>



			<section class="col s12 m12 l12 marginTop40">
				<section class="headerText">
					<div class="line"></div>
					<div class="title">Usefull Links</div>
				</section>
				<section class="marginminus10">
					<?=$data['usefulllink']?>
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
					<section class="col s12 m3 l3"><a href=""><img src="<?=$data['header']['public']?>img/geoeuro.jpg" alt="" class="bigImage" /></a></section>
					<section class="col s12 m3 l2"><a href=""><img src="<?=$data['header']['public']?>img/giz.jpg" alt="" /></a></section>
					<section class="col s12 m3 l5 mobileMarginTop20"><p>This website has been produced with support of the EU funded project “SME Development and DCFTA in Georgia” implemented by Deutsche Gesellschaft für Internationale Zusammenarbeit (GIZ) GmbH on behalf of German Federal Ministry for Economic Cooperation and Development (BMZ). The contents of this website do not necessarily reflect the views of the European Union.</p></section>	
					<section class="col s12 m2 l3"></section>				
				</section>
			</section>
		</section>

		<section class="footerText">
			<section class="marginminus10" style="margin:0">
			<p class="left">Ministry of Economy and Sustainable Development of Georgia 2016. DCFTA.gov.ge</p>
			<p class="right"><a href=""><img src="<?=$data['header']['public']?>img/logo.png" alt="logo" class="logo" /></a></p>
			</section>
		</section>
	</section>
</footer>

</body>
</html>