<?php 
require_once("app/functions/l.php"); 
$l = new functions\l(); 
echo $data['headerModule']; 
?>
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
					<input id="searchInput" type="text" value="<?=$l->translate('search')?>" data-val="<?=$l->translate('search')?>" onclick="searchInputOn()" onblur="searchInputOff()" />
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
			<section class="col s12 m6 l3 leftSide">
				<section class="leftNavigation">
					<section class="yellowBG"></section>
					<section class="nav">
						<?=$data['leftnav']?>
					</section>
				</section>

				<section class="justTitle"><?=$l->translate('linksandpublications')?></section>
				<?=$data['usefulllink']?>


				<section class="files-no-bg">
					<?=$data['publications']?>
				</section>
			</section>

			<section class="col s12 m6 l9 rightSite">
				<section class="justTitle"><?=strip_tags($data['pageData2']['title'])?></section>
				<section class="justSubTitle"><?=strip_tags($data['pageData2']['description'])?></section>
				<section class="justDate">published: <?=date("d M Y", $data['pageData2']['date'])?></section>

				<section class="mainText">
					<?=html_entity_decode($data['pageData2']['text'])?>					
				</section>
			</section>
		</section>
	</section>	
</main>


<?=$data['footer']?>

</body>
</html>