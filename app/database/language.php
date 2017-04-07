<?php
class language
{
	public function index($conn, $args)
	{
		$out = 0;
		$this->conn = $conn;
		if(method_exists("language", $args['method']))
		{
			$out = $this->$args['method']($args);
		}
		return $out;
	}

	public function select($args)
	{
		$out = array();
		$select = "SELECT * FROM `languages` WHERE `visibility`!=2";
		$prepare = $this->conn->prepare($select);
		$prepare->execute();
		if($prepare->rowCount()){
			$out = $prepare->fetchAll(PDO::FETCH_ASSOC);
		}
		return $out;
	}

	public function selectAll($args)
	{
		$out = array();
		$select = "SELECT * FROM `languages`";
		$prepare = $this->conn->prepare($select);
		$prepare->execute();
		if($prepare->rowCount()){
			$out = $prepare->fetchAll(PDO::FETCH_ASSOC);
		}
		return $out;
	}

	private function updateVisibility($args)
	{
		$visibility = ($args['visibility']==1) ? 1 : 2;
		$id = (int)$args['idx'];

		$update = "UPDATE `languages` SET `visibility`=:visibility WHERE `id`=:id";
		$prepare = $this->conn->prepare($update);
		$prepare->execute(array(
			":visibility"=>$visibility, 
			":id"=>$id
		));
		if($prepare->rowCount())
		{
			return 1;
		}
		return 0;
	}
}
?>