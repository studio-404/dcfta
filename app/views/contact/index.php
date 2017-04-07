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
				
				<section class="contactForm">
					<form action="" method="post">
						<?php
						require_once("app/functions/string.php"); 
						$_SESSION['protect_x'] = functions\string::random(6);
						echo sprintf(
							"<input type=\"hidden\" name=\"csrf\" id=\"csrf\" class=\"csrf\" value=\"%s\">", 
							htmlspecialchars($_SESSION['protect_x'])
						);
						echo sprintf(
							"<input type=\"hidden\" name=\"lang\" id=\"lang\" class=\"lang\" value=\"%s\">", 
							htmlspecialchars($_SESSION['LANG'])
						);
						?>
						<section class="marginminus10">
							<div class="messageBox col s12 m12 l12"></div>
							
							
					        <div class="input-field col s12 m6 l6">
					          <input id="input_subject" type="text" class="validate" />
					          <label for="input_subject"><?=$l->translate('subject')?> <font color="red">*</font></label>
					        </div>

					        <div class="input-field col s12 m6 l6">
					          <input id="input_name" type="text" class="validate">
					          <label for="input_name"><?=$l->translate('name')?> <font color="red">*</font></label>
					        </div>

					        <div class="input-field col s12 m6 l6">
					          <input id="input_organization" type="text" class="validate">
					          <label for="input_organization"><?=$l->translate('organization')?></label>
					        </div>

					        <div class="input-field col s12 m6 l6">
					          <input id="input_email" type="text" class="validate">
					          <label for="input_email"><?=$l->translate('email')?> <font color="red">*</font></label>
					        </div>

					        <div class="input-field col s12 m6 l6">
					          <input id="input_phone" type="text" class="validate">
					          <label for="input_phone"><?=$l->translate('phone')?> <font color="red">*</font></label>
					        </div>

					        <div class="input-field col s12 m12 l12">
					          <input id="input_comment" type="text" class="validate">
					          <label for="input_comment"><?=$l->translate('comment')?> <font color="red">*</font></label>
					        </div> 

							<!-- 
							 

					        -->

					        <div class="col s12 m12 l12">
					        	<a class="waves-effect waves-light btn submit" onclick="sendEmail()"><?=$l->translate('submit')?></a>
					        </div>
				        </section>
				        
					</form>
				</section>

			</section>

			<section class="col s12 m6 l4 rightSide print">
				<section class="justTitle"><?=$l->translate('contactdetails')?></section>
				<section class="contactDetails">
					<?=strip_output::index($data['contactData']['description'])?>
				</section>

				<section class="map noprint">
					<section class="header"><?=$l->translate('ministryName')?></section>
					<section class="init-map"></section>
				</section>
			</section>

		</section>
	</section>	
</main>

<?=$data['footer']?>

</body>
</html>