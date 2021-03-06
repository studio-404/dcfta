<?php
require_once("app/functions/l.php"); 
require_once("app/functions/strip_output.php"); 
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
					<div class="title"><?=strip_output::index($data['pageData']['description'])?></div>
				</section>
				<section class="mainText">
					<?=strip_output::index($data['pageData']['text'])?>
				</section>
				
				<section class="noprint">
					<section class="headerText">
						<div class="line"></div>
						<div class="title"><?=$l->translate('legislativedrafts')?></div>
					</section>
					<div style="clear:both"></div>
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