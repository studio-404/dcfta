<?php
require_once("app/functions/l.php"); 
require_once("app/functions/strip_output.php"); 
require_once("app/functions/string.php"); 
$l = new functions\l();
$string = new functions\string();
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
          <div style="clear:both; margin: 20px 0px 0 0;">
            <a href="/<?=$_SESSION['LANG']?>/graph?view=1" target="_blank"><?=$l->translate('graph')?></a>
          </div>

<div style="clear:both; margin: 20px 0"></div>

	 <section class="headerText">
		<div class="line"></div>
		<div class="title"><?=$l->translate('dcftacoordination')?></div>
		<div style="clear:both;"></div>
	</section>
  <div style="clear:both; margin: 20px 0px 0 0;">
    <a href="/<?=$_SESSION['LANG']?>/graph?view=2" target="_blank"><?=$l->translate('graph2')?></a>

  </div>
		<!--ORG CHART 2 -->

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