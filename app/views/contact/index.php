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
			
			<section class="col s12 m6 l8 leftSide">
				<section class="headerText">
					<div class="line"></div>
					<div class="title"><?=strip_tags($data['pageData']['description'])?></div>
				</section>
				
				<section class="contactForm">
					<form action="" method="post">
						<section class="marginminus10">
							<div class="messageBox col s12 m12 l12"></div>
							<div class="input-field col s12 m6 l4">
					          <input id="input_subject" type="text" class="validate" />
					          <label for="input_subject"><?=$l->translate('subject')?></label>
					        </div>
					        <div class="clearer"></div>
							
							<div class="input-field col s12 m6 l4">
					          <input id="input_name" type="text" class="validate">
					          <label for="input_name"><?=$l->translate('name')?></label>
					        </div>

					        <div class="input-field col s12 m6 l4">
					          <input id="input_organization" type="text" class="validate">
					          <label for="input_organization"><?=$l->translate('organization')?></label>
					        </div>

					        <div class="input-field col s12 m6 l4">
					          <input id="input_email" type="text" class="validate">
					          <label for="input_email"><?=$l->translate('email')?></label>
					        </div>

					        <div class="input-field col s12 m6 l4">
					          <input id="input_phone" type="text" class="validate">
					          <label for="input_phone"><?=$l->translate('phone')?></label>
					        </div>

					        <div class="input-field col s12 m6 l8">
					          <input id="input_comment" type="text" class="validate">
					          <label for="input_comment"><?=$l->translate('comment')?></label>
					        </div>

					        <div class="col s12 m12 l12">
					        	<a class="waves-effect waves-light btn submit" onclick="sendEmail()"><?=$l->translate('submit')?></a>
					        </div>
				        </section>
				        
					</form>
				</section>

			</section>

			<section class="col s12 m6 l4 rightSide">
				<section class="justTitle"><?=$l->translate('contactdetails')?></section>
				<section class="contactDetails">
					<?=@html_entity_decode($data['contactData']['description'])?>
				</section>

				<section class="map">
					<section class="header">MOEFSD</section>
					<section class="init-map"></section>
				</section>
			</section>

		</section>
	</section>	
</main>

<?=$data['footer']?>

</body>
</html>