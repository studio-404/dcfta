<!-- <a href="javascript:void(0)" onclick="" class="waves-effect waves-light btn margin-bottom-20" ><i class="material-icons left">note_add</i>დამატება</a> -->

<div style="float: right; margin: 0 0 10px 0; width: 250px;">
<select class="language-chooser" id="language-chooser" onchange="changeLanguage('<?=$_SESSION["LANG"]?>')">
	<option value="" disabled selected>აირჩიეთ ენა</option>
	<option value="ge" <?=($_SESSION["LANG"]=="ge") ? "selected='selected'" : ""?>>ქართული</option>
	<option value="en" <?=($_SESSION["LANG"]=="en") ? "selected='selected'" : ""?>>ინგლისური</option>
	<option value="ru" <?=($_SESSION["LANG"]=="ru") ? "selected='selected'" : ""?>>რუსული</option>
</select>
</div>

<div style="clear:both"></div>

<?php 
$chart = new Database("chart", array(
	"method"=>"select", 
	"cid"=>0,
	"type"=>"coord1" 
));
$query1 = $chart->getter();

foreach ($query1 as $v) {
	?>
	<div class="ChartBox" onclick="edit_chart('<?=$v['idx']?>', '<?=$_SESSION['LANG']?>')">
		<p><?=$v['title']?></p>
		<p><?=$v['text']?></p>
	</div>
	<?php
	$chart2 = new Database("chart", array(
		"method"=>"select", 
		"cid"=>$v['idx'],
		"type"=>"coord1"
	));
	$query2 = $chart2->getter();
	foreach ($query2 as $v2) {
		?>
		<div class="ChartBox" style="background-color: #dddddd" onclick="edit_chart('<?=$v2['idx']?>', '<?=$_SESSION['LANG']?>')">
			<p><?=$v2['title']?></p>
			<p><?=$v2['text']?></p>
		</div>
		<?php
		$chart3 = new Database("chart", array(
			"method"=>"select", 
			"cid"=>$v2['idx'],
			"type"=>"coord1"
		));
		$query3 = $chart3->getter();

		foreach ($query3 as $v3) {
			?>
			<div class="ChartBox" style="background-color: #cccccc" onclick="edit_chart('<?=$v3['idx']?>', '<?=$_SESSION['LANG']?>')">
				<p><?=$v3['title']?></p>
				<p><?=$v3['text']?></p>
			</div>
			<?php
		}

	}
}
?>