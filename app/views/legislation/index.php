<?php
require_once("app/functions/l.php"); 
$l = new functions\l();
echo $data['headerModule']; 
echo $data['headertop']; 
?>
<main>
	<section class="centerWidth">
		<section class="row">
			<section class="col s12 m12 l12">
				<section class="headerText">
					<div class="line"></div>
					<div class="title"><?=@html_entity_decode($data['pageData']['description'])?></div>
				</section>
				<section class="mainText">
					<?=@html_entity_decode($data['pageData']['text'])?>
				</section>
				
				<section class="noprint">
					<section class="headerText">
						<div class="line"></div>
						<div class="title"><?=$l->translate('legislativedrafts')?></div>
					</section>
					<?=$data['legislation']?>	

					<!-- _adoptedLegislation -->		
					<section class="space20"></section>
					<section class="headerText">
						<div class="line"></div>
						<div class="title"><?=$l->translate('adoptedlegislation')?></div>
					</section>
					<?=$data['adoptedLegislation']?>	
				</section>
			</section>
		</section>
	</section>	
</main>

<?=$data['footer']?>
</body>
</html>