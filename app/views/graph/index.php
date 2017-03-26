<?php
require_once("app/functions/l.php"); 
require_once("app/functions/strip_output.php"); 
require_once("app/functions/string.php"); 
$l = new functions\l();
$string = new functions\string();
echo $data['headerModule'];
?>
<?php
if(isset($_GET['view']) && $_GET['view']==2){
?>
<div id="chart_div2" style="margin:30px auto; width:90%;  overflow-x: auto;"></div>
<?php
}else{
?>
<div id="chart_div" style="margin:30px auto; width:90%;  overflow-x: auto;"></div>
<?php
}
?>

<script type="text/javascript" src="<?=Config::PUBLIC_FOLDER?>js/web/loader.js"></script>
<script type="text/javascript">
	google.charts.load('current', {packages:["orgchart"]});
  <?php
  if(isset($_GET['view']) && $_GET['view']==2){
  ?>
  google.charts.setOnLoadCallback(drawChart2);
  <?php
  }else{
  ?>
  google.charts.setOnLoadCallback(drawChart);
  <?php } ?>

  <?php
if(!isset($_GET['view']) || $_GET['view']!=2){
?>
  function drawChart() {
    var data = new google.visualization.DataTable();
    data.addColumn('string', 'Name');
    data.addColumn('string', 'Manager');
    data.addColumn('string', 'ToolTip');
    var rowsX = "";
    <?php 
      foreach ($data['chart'] as $v) {
        $c['idx'] = $v['idx'];
        $c['title'] = $v['title'];
        $c['text'] = $v['text'];
        $c['tooltip'] = $v['tooltip'];
      }

      $chart2 = new Database("chart", array(
        "method"=>"select", 
        "cid"=>$c['idx'],
        "type"=>"coord1"
      ));
      $getter = $chart2->getter();
      $chart3 = new Database("chart", array(
        "method"=>"select", 
        "cid"=> $getter[0]['idx'],
        "type"=>"coord1"
      ));
      $getter2 = $chart3->getter();
    ?>

		data.addRows([
          [{
          		v:'org1', 
          		f:'<div class="masterTooltip" style="width: 350px"><?=strip_tags($c['title'],"<br>")?><div style="color:red; font-style:italic"><?=strip_tags($c['text'],"<br>")?></div></div>'
          	},
           '', 
           ''
          ],
          [{
          		v:'org2', 
          		f:'<div class="masterTooltip" style="width: 350px"><?=strip_tags($getter[0]["title"],"<br>")?><div style="color:red; font-style:italic"><?=strip_tags($getter[0]["text"],"<br>")?></div></div>'
          	},
           'org1', 
           ''
          ],<?php foreach ($getter2 as $x) { ?>
          ['<div class="masterTooltip" title="<?=$string->escapeJavaScriptText($x['tooltip'])?>"><?=strip_tags($x['title'],"<br>")?><div style="color:red; font-style:italic"><?=strip_tags($x['text'],"<br>")?></div></div>', 'org2', ''],
          <?php } ?>
          
        ]);
     	var chart = new google.visualization.OrgChart(document.getElementById('chart_div'));
        chart.draw(data, {allowHtml:true, width: '100%', height: '100%'});
        master('masterTooltip', 'tooltip');
	}
  <?php } ?>
  <?php
if(isset($_GET['view']) && $_GET['view']==2){
?>
	function drawChart2() {
        var data = new google.visualization.DataTable();
        data.addColumn('string', 'Name');
        data.addColumn('string', 'Manager');
        data.addColumn('string', 'ToolTip');
        <?php
        $ch2 = new Database("chart", array(
          "method"=>"select", 
          "cid"=>$data['chart2'][0]['idx'],
          "type"=>"coord2"
        ));
        $get = $ch2->getter();
        $ch3 = new Database("chart", array(
          "method"=>"select", 
          "cid"=> $get[0]['idx'],
          "type"=>"coord2"
        ));
        $get2 = $ch3->getter();
        ?>
		data.addRows([
          [{
          		v:'org1', 
          		f:'<div class="masterTooltip" title="<?=$string->escapeJavaScriptText($data['chart2'][0]['tooltip'])?>"><?=strip_tags($data['chart2'][0]['title'],"<br>")?><div style="color:red; font-style:italic"><?=strip_tags($data['chart2'][0]['text'],"<br>")?></div></div>'
          	},
           '', 
           ''
          ],
          [{
          		v:'org2', 
          		f:'<div class="masterTooltip" title="<?=$string->escapeJavaScriptText($get[0]['tooltip'])?>"><?=strip_tags($get[0]['title'],"<br>")?><div style="color:red; font-style:italic"><?=strip_tags($get[0]['text'],"<br>")?></div></div>'
          	},
           'org1', 
           ''
          ],<?php foreach ($get2 as $x) { ?>
          ['<div class="masterTooltip" title="<?=$string->escapeJavaScriptText($x['tooltip'])?>"><?=strip_tags($x['title'],"<br>")?><div style="color:red; font-style:italic"><?=strip_tags($x['text'],"<br>")?></div></div>', 'org2', ''],
          <?php } ?>
        ]);
     	var chart = new google.visualization.OrgChart(document.getElementById('chart_div2'));
        chart.draw(data, {allowHtml:true, width: '100%', height: '100%' });
        master('masterTooltip', 'tooltip');
	}
  <?php 
  }
  ?>
</script>
</body>
</html>