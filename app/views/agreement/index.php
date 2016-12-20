<?php
require_once("app/functions/l.php"); 
$l = new functions\l();
echo $data['headerModule']; 
echo $data['headertop']; 
?>

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

				<section class="headerText">
					<div class="line"></div>
					<div class="title"><?=$l->translate('chapters')?></div>
				</section>
				<?=$data['chapters']?>
			</section>
			<section class="col s12 m6 l4 rightSide">
				<section class="justTitle"><?=$l->translate('stateagencies')?></section>
				<?=$data['stateagencies']?>
			</section>



		</section>
	</section>	
</main>

<?=$data['footer']?>
</body>
</html>