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
				
				<section class="marginminus10">
					<section class="col s12 m12 l6">
						<section class="justTitle"><?=$l->translate('reports')?></section>
						<section class="files files-mobile" data-type="reports"></section>

						<section class="file-new-version">
							<?=$data['reports']?>							
						</section>
						<a href="<?=Config::WEBSITE.$_SESSION['LANG']?>/implementation" class="viewall-new-vertion"><?=$l->translate('viewall')?></a>
					</section>

					<section class="col s12 m12 l6">
						<section class="justTitle"><?=$l->translate('publications')?></section>
						<section class="files files-mobile" data-type="publications"></section>
						<section class="file-new-version last">
							<?=$data['publications']?>
						</section>
						<a href="<?=Config::WEBSITE.$_SESSION['LANG']?>/news" class="viewall-new-vertion"><?=$l->translate('viewall')?></a>
					</section>

					<!-- <section class="files files-desktop">
						<section class="col s12 m12 l6 reports">
							<?php 
							//echo $data['reports'] 
							?>
						</section>

						<section class="col s12 m12 l6 publications">
							<?php
							// echo $data['publications']
							?>
						</section>
					</section> -->
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
				<!-- <section class="justTitle"><?=$l->translate('euimportantlink')?></section> -->
				<?php // $data['euLinks'] ?>
				<section class="justTitle"><?=$l->translate('usefulllinks')?></section> 
				<?php echo $data['usefulllink']; ?>
				

				<section class="justTitle marginTop40"><?=$l->translate('eventcalendar')?></section>
				<section class="CalendarBox">
					<?php
					if(isset($_SESSION['LANG'])){
						require_once('app/functions/calendar.php'); 
						$calendar = new functions\calendar();
						echo $calendar->index(htmlspecialchars($_SESSION['LANG'])); 
					}
					?>
				</section>

			</section>



			<section class="col s12 m12 l12 marginTop40">
				<section class="headerText">
					<div class="line"></div>
					<div class="title"><?=$l->translate('euimportantlink')?></div>
				</section>
				<section class="marginminus10">
					<?=$data['euLinks']?>
				</section>
			</section>


		</section>
	</section>	
</main>
<?=$data['footer']?>
</body>
</html>