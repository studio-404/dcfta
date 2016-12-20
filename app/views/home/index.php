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
				
				<section class="marginminus10">
					<section class="col s12 m12 l6">
						<section class="justTitle"><?=$l->translate('reports')?></section>
						<section class="files files-mobile" data-type="reports"></section>
					</section>

					<section class="col s12 m12 l6">
						<section class="justTitle"><?=$l->translate('publications')?></section>
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
							<div class="title"><?=$l->translate('news')?></div>
						</section>
					</section>
					
					<?=$data['news']?>
				</section>

			</section>
			<section class="col s12 m6 l4 rightSide">
				<section class="justTitle"><?=$l->translate('euimportantlink')?></section>
				<?=$data['euLinks']?>
				<section class="justTitle marginTop40"><?=$l->translate('eventcalendar')?></section>
				
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
					<div class="title"><?=$l->translate('usefulllinks')?></div>
				</section>
				<section class="marginminus10">
					<?=$data['usefulllink']?>
				</section>
			</section>


		</section>
	</section>	
</main>
<?=$data['footer']?>
</body>
</html>