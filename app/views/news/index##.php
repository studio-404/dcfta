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
						<?php 
						echo $data['othernews'];
						require_once('app/functions/pagination.php'); 
						$pagination = new functions\pagination();
						echo $pagination->index($data['othernews_count'], 4);
						?>
					</section>
					<?php
					endif;
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

<script type="text/javascript">  
	if($(document).width()<1200){
		var rightSide = $(".rightSide").html();
		$(".rightSide").hide();
		$(".mainText").append(rightSide);
		$(".file .title").css("text-align","left");
	}
</script>

</body>
</html>