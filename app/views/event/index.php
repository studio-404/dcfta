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
					<div class="title"><?=$l->translate('event')?></div>
				</section>
				<section class="event">
					<?=$data['mainevents']?>
					<section class="contactForm">
						<form action="" method="post">
							<div class="commMsG commentForm24_msg" style="padding:0 0 20px 0"></div>
							<input type="hidden" name="eventid" class="eventid" value="c22"/>

							<section class="marginminus10">
								<div class="input-field col s12 m6 l4">
									<input type="text" class="validate first_name" />
									<label class=""><?=$l->translate('name')?></label>
								</div>
								<div class="input-field col s12 m6 l4">
									<input type="text" class="validate organization" />
									<label><?=$l->translate('organization')?></label>
								</div>
								<div class="input-field col s12 m6 l4">
									<input type="text" class="validate email" />
									<label><?=$l->translate('email')?></label>
								</div>
								<div class="input-field col s12 m6 l4">
									<input type="text" class="validate phone" />
									<label><?=$l->translate('phone')?></label>
								</div>
								<div class="col s12 m12 l12">
									<a class="waves-effect waves-light btn submit" style="text-decoration: none;"><?=$l->translate('submit')?></a>
								</div>
							</section>
						</form>
					</section>
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