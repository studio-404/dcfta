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
			<section class="col s12 m6 l8">
				<section class="headerText">
					<div class="line"></div>
					<div class="title"><?=strip_tags($data['pageData']['description'])?></div>
				</section>
				<section class="event" style="margin: 0 -10px; clear:both">
					<?php 
					if(!isset($data['mainnews'])){
						echo  $data['othernews'];
					}else{
						echo $data['mainnews'];
					}
					?>
				</section>
			</section>
			<section class="col s12 m6 l4 rightSide">
				<section class="justTitle"><?=$l->translate('eventcalendar')?></section>
				<section class="CalendarBox">
					<?php
					require_once('app/functions/calendar.php'); 
					$calendar = new functions\calendar();
					echo $calendar->index($_SESSION['LANG']); 
					?>
				</section>

				<section class="justTitle marginTop40"><?=$l->translate('publications')?></section>
				<section class="files-no-bg">
					<?=$data['publications']?>
				</section>
			</section>

		</section>	
	</section>
</main>


<?=$data['footer']?>

</body>
</html>