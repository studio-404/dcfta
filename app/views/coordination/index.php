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
					<div class="title"><?=strip_tags($data['pageData']['description'])?></div>
				</section>
				<section class="mainText">
					<?=html_entity_decode($data['pageData']['text'])?>

					<br />

<?php 
if($_SESSION['LANG']=="ge"):
?>
<svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="790px" height="500px" viewBox="0 0 790 500" enable-background="new 0 0 790 500" xml:space="preserve">

<defs xmlns="http://www.w3.org/2000/svg">
    <filter id="dropshadow" height="130%">
      <feGaussianBlur in="SourceAlpha" stdDeviation="2"/> 
      <feOffset dx="2" dy="2" result="offsetblur"/> 
      <feMerge> 
        <feMergeNode/>
        <feMergeNode in="SourceGraphic"/> 
      </feMerge>
    </filter>
  </defs>

	<g id="Layer_2" onmouseenter="coordinationSvg('#hover-layer1', 'true')" onmouseleave="coordinationSvg('#hover-layer1', 'false')">
		<path fill="#f2f3f6" d="M525.722,78.621c0,3.382-3.44,6.125-7.683,6.125H280.681c-4.243,0-7.681-2.743-7.681-6.125V43.705
			c0-3.383,3.438-6.125,7.681-6.125h237.358c4.242,0,7.683,2.743,7.683,6.125V78.621z"/>
		<text transform="matrix(1 0 0 1 289.833 65.8428)" fill="#363636">
			<tspan x="-7">ევროინტეგრაციის კომისია</tspan>
		</text>
	</g>

	<g id="Layer_4" onmouseenter="coordinationSvg('#hover-layer2', 'true')" onmouseleave="coordinationSvg('#hover-layer2', 'false')">
		<path fill="#f2f3f6" d="M589.162,218.502c0,7.349-5.141,13.311-11.479,13.311H223.035c-6.339,0-11.476-5.962-11.476-13.311v-75.876
			c0-7.351,5.137-13.311,11.476-13.311h354.649c6.338,0,11.479,5.96,11.479,13.311V218.502z"/>
		<text transform="matrix(1 0 0 1 252.7314 155.1758)">
			<tspan x="-20" y="0" fill="#363636">DCFTA-</tspan>
			<tspan x="40" y="0" fill="#363636">ს განხორციელების ქვე-კომისია</tspan>
			<tspan x="315" y="0" fill="#363636">,</tspan>
			<tspan x="-25" y="20" fill="#363636">საქართველოს ეკონომიკისა და მდგრადი </tspan>
			<tspan x="30" y="40" fill="#363636">განვითარების სამინისტროს </tspan>
			<tspan x="60" y="60" fill="#363636">ხელმძღვანელობით</tspan>
		</text>
	</g>

	
	<g id="Layer_6">
		<line fill="none" stroke="#f2f3f6" stroke-width="2" stroke-miterlimit="10" x1="399.361" y1="84.746" x2="399.361" y2="129.508"/>
		<path fill="none" stroke="#f2f3f6" stroke-width="2" stroke-miterlimit="10" d="M774.725,464.979c0,2.773-2.381,5.021-5.319,5.021
			H18.738c-2.938,0-5.321-2.248-5.321-5.021V292.739c0-2.772,2.383-5.021,5.321-5.021h750.667c2.938,0,5.319,2.249,5.319,5.021
			V464.979z"/>
		<line fill="none" stroke="#f2f3f6" stroke-width="2" stroke-miterlimit="10" x1="400.36" y1="231.813" x2="400.36" y2="289.51"/>
	</g>
	<g id="Layer_7" onmouseenter="coordinationSvg('#hover-layer3', 'true')" onmouseleave="coordinationSvg('#hover-layer3', 'false')">
		<path fill="#f2f3f6" d="M195.667,359.29c0,3.251-2.723,5.886-6.082,5.886H33.082c-3.358,0-6.082-2.635-6.082-5.886v-50.228
			c0-3.251,2.723-5.887,6.082-5.887h156.503c3.359,0,6.082,2.636,6.082,5.887V359.29z"/>
		<text transform="matrix(1 0 0 1 46 328.1758)">
			<tspan x="-5" y="0">გარემოს დაცვის</tspan>
			<tspan x="-5" y="20">სამინისტრო</tspan>
		</text>
	</g>

	<g id="Layer_9" onmouseenter="coordinationSvg('#hover-layer4', 'true')" onmouseleave="coordinationSvg('#hover-layer4', 'false')">
		<path fill="#f2f3f6" d="M384,359.29c0,3.251-2.723,5.886-6.081,5.886H221.415c-3.358,0-6.082-2.635-6.082-5.886v-50.228
			c0-3.251,2.723-5.887,6.082-5.887h156.504c3.358,0,6.081,2.636,6.081,5.887V359.29z"/>
		<text transform="matrix(1 0 0 1 261.333 328.1758)">
			<tspan x="-5" y="0">სოფლის</tspan>
			<tspan x="-5" y="20">მეურნეობა</tspan>
		</text>
	</g>
	<g id="Layer_10">
		<path fill="#f2f3f6" d="M761.334,359.29c0,3.251-2.723,5.886-6.081,5.886H598.749c-3.358,0-6.081-2.635-6.081-5.886v-50.228
			c0-3.251,2.723-5.887,6.081-5.887h156.504c3.358,0,6.081,2.636,6.081,5.887V359.29z"/>
		<text transform="matrix(1 0 0 1 628.667 328.1758)">
			<tspan x="0" y="0">ფინანსთა</tspan>
			<tspan x="0" y="20">სამინისტრო</tspan>
		</text>
	</g>
	<g id="Layer_11">
		<path fill="#f2f3f6" d="M572.667,359.29c0,3.251-2.723,5.886-6.081,5.886H410.082c-3.358,0-6.082-2.635-6.082-5.886v-50.228
			c0-3.251,2.724-5.887,6.082-5.887h156.504c3.358,0,6.081,2.636,6.081,5.887V359.29z"/>
		<text transform="matrix(1 0 0 1 439 337.1758)"><tspan x="-2" y="0">ენერგეტიკა</tspan></text>
	</g>
	<g id="Layer_12">
		<path fill="#f2f3f6" d="M196.5,443.29c0,3.251-2.723,5.886-6.081,5.886H33.915c-3.358,0-6.082-2.635-6.082-5.886v-50.228
			c0-3.251,2.723-5.887,6.082-5.887h156.504c3.358,0,6.081,2.636,6.081,5.887V443.29z"/>
		<text transform="matrix(1 0 0 1 63.833 422.1758)"><tspan x="-4" y="0">საქპატენტი</tspan></text></text>
		<path fill="#f2f3f6" d="M384.833,443.29c0,3.251-2.723,5.886-6.081,5.886H222.248c-3.358,0-6.081-2.635-6.081-5.886v-50.228
			c0-3.251,2.723-5.887,6.081-5.887h156.504c3.358,0,6.081,2.636,6.081,5.887V443.29z"/>
		<text transform="matrix(1 0 0 1 251.166 412.1758)">
			<tspan x="-5" y="0">შესყიდვების</tspan>
			<tspan x="-5" y="20">სააგენტო</tspan>
		</text>
		<path fill="#f2f3f6" d="M762.167,443.29c0,3.251-2.723,5.886-6.081,5.886H599.582c-3.358,0-6.081-2.635-6.081-5.886v-50.228
			c0-3.251,2.723-5.887,6.081-5.887h156.504c3.358,0,6.081,2.636,6.081,5.887V443.29z"/>
		<path fill="#f2f3f6" d="M573.5,443.29c0,3.251-2.723,5.886-6.081,5.886H410.915c-3.358,0-6.082-2.635-6.082-5.886v-50.228
			c0-3.251,2.724-5.887,6.082-5.887h156.504c3.358,0,6.081,2.636,6.081,5.887V443.29z"/>
		<text transform="matrix(1 0 0 1 430.833 411.1758)">
			<tspan x="0" y="0">კონკურენციის</tspan>
			<tspan x="0" y="20">სააგენტო</tspan>
		</text>
		<text transform="matrix(1 0 0 1 612.5801 412.1758)">
			<tspan x="-4" y="0">კომუნიკაციების</tspan>
			<tspan x="-4" y="20">კომპანია</tspan></text>
	</g>

	<g id="hover-layer1" filter="url(#dropshadow)" style="display:none">
		<rect x="210" y="95" width="400" height="80" fill="#ffce37" rx="5" ry="5">
		</rect>
		<text x="220" y="120" id="textxxx">
			<tspan x="220" y="120" fill="#363636">საქართველო-ევროკავშირს შორის ღრმა</tspan>
			<tspan x="220" y="140" fill="#363636">და ყოვლისმომცველი თავისუფალი სავაჭრო</tspan> 
			<tspan x="220" y="160" fill="#363636">სივრცის ანგარიში 2016</tspan>
		</text>
	</g>

	<g id="hover-layer2" filter="url(#dropshadow)" style="display:none">
		<rect x="200" y="240" width="400" height="80" fill="#ffce37" rx="5" ry="5">
		</rect>
		<text x="210" y="265">
			<tspan x="210" y="265" fill="#363636">საქართველო-ევროკავშირს შორის ღრმა</tspan>
			<tspan x="210" y="285" fill="#363636">და ყოვლისმომცველი თავისუფალი სავაჭრო</tspan> 
			<tspan x="210" y="305" fill="#363636">სივრცის ანგარიში 2016</tspan>
		</text>
	</g>

	<g id="hover-layer3" filter="url(#dropshadow)" style="display:none">
		<rect x="20" y="380" width="400" height="80" fill="#ffce37" rx="5" ry="5">
		</rect>
		<text x="40" y="405">
			<tspan x="30" y="405" fill="#363636">საქართველო-ევროკავშირს შორის ღრმა</tspan>
			<tspan x="30" y="425" fill="#363636">და ყოვლისმომცველი თავისუფალი სავაჭრო</tspan> 
			<tspan x="30" y="445" fill="#363636">სივრცის ანგარიში 2016</tspan>
		</text>
	</g>

	<g id="hover-layer4" filter="url(#dropshadow)" style="display:none">
		<rect x="120" y="380" width="400" height="80" fill="#ffce37" rx="5" ry="5">
		</rect>
		<text x="140" y="405">
			<tspan x="130" y="405" fill="#363636">საქართველო-ევროკავშირს შორის ღრმა</tspan>
			<tspan x="130" y="425" fill="#363636">და ყოვლისმომცველი თავისუფალი სავაჭრო</tspan> 
			<tspan x="130" y="445" fill="#363636">სივრცის ანგარიში 2016</tspan>
		</text>
	</g>
</svg>
<script>
// var textxxx = document.getElementsById("textxxx")[0];
// var bbox = textxxx.getBBox();
// textxxx.setAttribute("width", bbox.x + bbox.width  + "px");
// textxxx.setAttribute("height",bbox.y + bbox.height + "px");
</script>
<?php endif; ?>
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