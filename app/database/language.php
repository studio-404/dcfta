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
		$select = "SELECT * FROM `languages`";
		$prepare = $this->conn->prepare($select);
		$prepare->execute();
		if($prepare->rowCount()){
			$out = $prepare->fetchAll(PDO::FETCH_ASSOC);
		}
		return $out;
	}
}
?>