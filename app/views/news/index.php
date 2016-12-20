<?php
require_once("app/functions/l.php"); 
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
				<section class="event">
					<?=$data['mainnews']?>
					<?php
					if(isset($data['othernews'])):
					?>
					<section class="marginminus10 marginTop40">
						<section class="col s12 m12 l12">
							<section class="headerText">
								<div class="line"></div>
								<div class="title"><?=$l->translate('allnews')?></div>
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
				<section class="justTitle"><?=$l->translate('eventcalendar')?></section>
				<section class="CalendarBox">
					<?php
					require_once('app/functions/calendar.php'); 
					$calendar = new functions\calendar();
					echo $calendar->index($_SESSION['LANG']); 
					?>
				</section>

				<section class="justTitle marginTop40"><?=$l->translate('publications')?></section>
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