<?php 
class chart
{
	public function __construct()
	{

	}

	public function index($conn, $args)
	{
		$out = 0;
		$this->conn = $conn;
		if(method_exists("chart", $args['method']))
		{
			$out = $this->$args['method']($args);
		}
		return $out;
	}

	private function select($args)
	{
		$fetch = array();
		$select = "SELECT * FROM `charts` WHERE `cid`=:cid AND `type`=:type AND `lang`=:lang ORDER BY `position` ASC";
		$prepare = $this->conn->prepare($select);
		$prepare->execute(array(
			":cid"=>$args['cid'],
			":type"=>$args['type'], 
			":lang"=>$_SESSION['LANG'] 
		));
		if($prepare->rowCount()){
			$fetch = $prepare->fetchAll(PDO::FETCH_ASSOC);
		}
		return $fetch;
	}

	private function selectById($args)
	{
		$fetch = array();
		$select = "SELECT * FROM `charts` WHERE `idx`=:idx AND `lang`=:lang";
		$prepare = $this->conn->prepare($select);
		$prepare->execute(array(
			":idx"=>$args['idx'],
			":lang"=>$args['lang']
		));
		if($prepare->rowCount()){
			$fetch = $prepare->fetch(PDO::FETCH_ASSOC);
		}
		return $fetch;
	}


	private function edit($args)
	{
		$id = $args["id"];
		$lang = $args["lang"];
		$title = $args["title"];
		$tooltip = $args["tooltip"];
		$pageText = $args["pageText"];
		
		$update = "UPDATE `charts` SET 
		`title`=:title, 
		`tooltip`=:tooltip, 
		`text`=:pageText 
		WHERE `idx`=:idx AND `lang`=:lang";
		$prepare = $this->conn->prepare($update);
		$prepare->execute(array(
			":title"=>$title,
			":tooltip"=>$tooltip,
			":pageText"=>$pageText,
			":idx"=>$id, 
			":lang"=>$lang 
		));	
		return 1;
	}
}