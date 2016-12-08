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
			<section class="col s12 m12 l12 leftSide">
				<section class="headerText">
					<div class="line"></div>
					<div class="title"><?=strip_tags($data['pageData']['description'])?></div>
				</section>

				<section class="marginminus10 marginTop40">
						
						<?php
						$photos = new Database("photos",array(
							"method"=>"selectByParent", 
							"idx"=>$data['moduleData']['idx'],  
							"lang"=>$_SESSION['LANG'],  
							"type"=>$data['moduleData']['type'] 
						));
						?>

						<section class="mainText">
							<?php 
							if($photos->getter()){
								$pic = $photos->getter();
								$image = Config::WEBSITE.$_SESSION['LANG']."/image/loadimage?f=".Config::WEBSITE_.$pic[0]['path']."&w=340&h=71";
								echo '<img src="'.$image.'" width="350" alt="" />';
								echo '<p class="marginTop40"></p>';
							}
							?>						
							<p><strong><?=strip_tags($data['moduleData']['title'])?></strong></p>
							<?=$data['moduleData']['description']?>

							<p class="linkWithIcon marginTop40">
								<a href="<?=$data['moduleData']['url']?>" target="_blank">
									<img src="<?=Config::PUBLIC_FOLDER?>img/icon-link.png" alt="" />
									<span><?=$data['moduleData']['url']?></span>
								</a>
							</p>
						</section>
						
						<section class="clearer"></section>
						
						<section class="marginminus10 marginTop40">
							<p class="marginTop40">&nbsp;</p>
							
							<?=$data['miniinternationalsupport']?>

						</section>
					
				</section>
			</section>
		</section>
	</section>	
</main>

<?=$data['footer']?>
</body>
</html>