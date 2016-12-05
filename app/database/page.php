<?php 
class page
{
	private $conn;

	public function index($conn, $args)
	{
		$out = 0;
		$this->conn = $conn;
		if(method_exists("page", $args['method']))
		{
			$out = $this->$args['method']($args);
		}
		return $out;
	}

	private function select($args)
	{
		$fetch = array();
		$select = "SELECT * FROM `navigation` WHERE `cid`=:cid AND `nav_type`=:nav_type AND `lang`=:lang AND `status`=:status ORDER BY `position` ASC";
		$prepare = $this->conn->prepare($select);
		$prepare->execute(array(
			":cid"=>$args['cid'], 
			":nav_type"=>$args['nav_type'],
			":lang"=>$args['lang'], 
			":status"=>$args['status'], 
		));
		if($prepare->rowCount()){
			$fetch = $prepare->fetchAll(PDO::FETCH_ASSOC);
		}
		return $fetch;
	}

	// private function selectAboutContent($args)
	// {
	// 	$fetch = array();
	// 	$select = "SELECT `title`,`text` FROM `navigation` WHERE `idx`=:idx AND `lang`=:lang AND `status`!=:one";
	// 	$prepare = $this->conn->prepare($select);
	// 	$prepare->execute(array(
	// 		":idx"=>$args['idx'], 
	// 		":lang"=>$args['lang'], 
	// 		":one"=>1
	// 	));
	// 	if($prepare->rowCount()){
	// 		$fetch = $prepare->fetch(PDO::FETCH_ASSOC);
	// 	}
	// 	return $fetch;
	// }

	private function updateVisibility($args)
	{
		$visibility = ($args['visibility']==0) ? 1 : 0;
		$idx = (int)$args['idx'];

		$update = "UPDATE `navigation` SET `visibility`=:visibility WHERE `idx`=:idx";
		$prepare = $this->conn->prepare($update);
		$prepare->execute(array(
			":visibility"=>$visibility, 
			":idx"=>$idx
		));
		if($prepare->rowCount())
		{
			return 1;
		}
		return 0;
	}

	private function selectById($args)
	{
		$fetch = array();
		$idx = $args['idx']; 
		$lang = $args['lang'];

		$select = "SELECT * FROM `navigation` WHERE `idx`=:idx AND `lang`=:lang AND `status`!=:one";
		$prepare = $this->conn->prepare($select);
		$prepare->execute(array(
			":idx"=>$idx, 
			":lang"=>$lang, 
			":one"=>1 
		)); 
		if($prepare->rowCount()){
			$fetch = $prepare->fetch(PDO::FETCH_ASSOC);
		}
		return $fetch;
	}

	private function selecteBySlug($args){
		$fetch = array();
		$slug = $args['slug']; 
		$lang = $args['lang'];
		if(!isset($args['all'])){
			$select = "SELECT `type` FROM `navigation` WHERE `slug`=:slug AND `lang`=:lang AND `status`!=:one";
		}else{
			$select = "SELECT * FROM `navigation` WHERE `slug`=:slug AND `lang`=:lang AND `status`!=:one";
		}
		$prepare = $this->conn->prepare($select);
		$prepare->execute(array(
			":slug"=>$slug, 
			":lang"=>$lang, 
			":one"=>1 
		)); 
		if($prepare->rowCount()){
			$fetch = $prepare->fetch(PDO::FETCH_ASSOC);
		}
		return $fetch;
	}

	private function add($args)
	{
		$current_lang = $args["lang"];
		$input_cid = (int)$args["input_cid"];
		$navtype = (int)$args["chooseNavType"];
		$type = $args["choosePageType"];
		$title = $args["title"];
		$slug = $args["slug"];
		$cssclass = (isset($args["cssclass"])) ? $args["cssclass"] : "";
		$usefull_type = (isset($args["usefull_type"])) ? $args["usefull_type"] : "false";
		$redirect = $args["redirect"];
		$description = $args["pageDescription"];
		$textx = $args["pageText"];

		$select = "SELECT `title` FROM `languages`";
		$prepare = $this->conn->prepare($select);
		$prepare->execute();
		$fetch = $prepare->fetchAll(PDO::FETCH_ASSOC);

		$max = "SELECT MAX(`idx`) as maxidx FROM `navigation` WHERE `status`!=:one";
		$prepare2 = $this->conn->prepare($max);
		$prepare2->execute(array(":one"=>1));
		$fetch2 = $prepare2->fetch(PDO::FETCH_ASSOC);
		$maxId = ($fetch2["maxidx"]) ? $fetch2["maxidx"] + 1 : 1;

		$max2 = "SELECT MAX(`position`) as maxidx FROM `navigation` WHERE `cid`=:cid AND `status`!=:one AND `nav_type`=:navType";
		$prepare3 = $this->conn->prepare($max2);
		$prepare3->execute(array(
			":cid"=>$input_cid,
			":one"=>1,
			":navType"=>$navtype
		));
		$fetch3 = $prepare3->fetch(PDO::FETCH_ASSOC);
		$maxPosition = ($fetch3["maxidx"]) ? $fetch3["maxidx"] + 1 : 1;

		$cid = $input_cid;
		$datex = time();
		$visibility = 0;
		$status = 0;

		foreach ($fetch as $val) {
			$insert = "INSERT INTO `navigation` SET 
			`idx`=:idx, 
			`cid`=:cid, 
			`date`=:datex, 
			`nav_type`=:nav_type,
			`type`=:type, 
			`title`=:title, 
			`description`=:description, 
			`text`=:textx, 
			`slug`=:slug, 
			`usefull_type`=:usefull_type, 
			`cssclass`=:cssclass, 
			`redirect`=:redirect, 
			`lang`=:lang, 
			`position`=:position,
			`visibility`=:visibility, 
			`status`=:status";
			$prepare2 = $this->conn->prepare($insert);
			$prepare2->execute(array(
				":idx"=>$maxId,
				":cid"=>$cid,
				":datex"=>$datex,
				":type"=>$type,
				":nav_type"=>(int)$navtype, 
				":title"=>$title,
				":description"=>$description,
				":textx"=>$textx,
				":slug"=>$slug,
				":usefull_type"=>$usefull_type,
				":cssclass"=>$cssclass,
				":redirect"=>$redirect,
				":lang"=>$val['title'],
				":position"=>$maxPosition,
				":visibility"=>$visibility,
				":status"=>$status
			));	

			if(count($args["serialPhotos"])){
				foreach ($args["serialPhotos"] as $pic) {
					if(!empty($pic)):
					$photo = 'INSERT INTO `photos` SET `parent`=:parent, `path`=:pathx, `type`=:type, `lang`=:lang, `status`=:zero';
					$photoPerpare = $this->conn->prepare($photo);
					$photoPerpare->execute(array(
						":parent"=>$maxId, 
						":pathx"=>$pic, 
						":type"=>$type, 
						":lang"=>$val['title'], 
						":zero"=>0
					));
					endif;
				}
			}

			
		}

		if(count($args["serialFiles"])){
			$fileposition = 1;
			foreach ($args["serialFiles"] as $file) {
				if(!empty($file)):
				$explode = explode(",",$file); 
				$type = (isset($explode[0])) ? $explode[0] : "";
				$random = (isset($explode[1])) ? $explode[1] : "";
				$idx = (isset($explode[2])) ? $explode[2] : "";
				$cid = (isset($explode[3])) ? $explode[3] : "";
				$path = (isset($explode[4])) ? $explode[4] : "";

				if($type != "" && $random != "" && $idx != "" && $cid != "" && $path != ""){
					$files = 'UPDATE `file_system` SET `type`=:type, `random`=:clear, `page_id`=:page_id, `lang`=:lang, `position`=:position WHERE `idx`=:idx AND `cid`=:cid AND `random`=:random';
					$filePerpare = $this->conn->prepare($files);
					$filePerpare->execute(array(
					":clear"=>"", 
					":page_id"=>$maxId, 
					":position"=>$fileposition, 
					":lang"=>$current_lang,
					":idx"=>$idx, 
					":cid"=>$cid, 
					":random"=>$random, 
					":type"=>$type 
					));

					$fileposition++;					
				}
				
				endif;
			}
		}

		return 1;
	}

	private function edit($args)
	{
		require_once 'app/functions/files.php';

		$idx = $args["idx"];
		$lang = $args["lang"];
		$navtype = $args["chooseNavType"];
		$type = $args["choosePageType"];
		$title = $args["title"];
		$slug = $args["slug"];
		$cssclass = (isset($args["cssclass"])) ? $args["cssclass"] : "";
		$usefull_type = (isset($args["attachModule"])) ? $args["attachModule"] : "false";
		$redirect = $args["redirect"];
		$description = $args["pageDescription"];
		$textx = $args["pageText"];

		$update = "UPDATE `navigation` SET 
		`type`=:type, 
		`title`=:title, 
		`description`=:description, 
		`text`=:textx, 
		`slug`=:slug, 
		`usefull_type`=:usefull_type,
		`cssclass`=:cssclass,
		`redirect`=:redirect WHERE `idx`=:idx AND `lang`=:lang";
		$prepare = $this->conn->prepare($update);
		$prepare->execute(array(
			":type"=>$type,
			":title"=>$title,
			":description"=>$description,
			":textx"=>$textx,
			":slug"=>$slug,
			":usefull_type"=>$usefull_type,
			":cssclass"=>$cssclass,
			":redirect"=>$redirect,
			":idx"=>$idx, 
			":lang"=>$lang 
		));	
		
		$photos = new Database('photos', array(
			'method'=>'deleteByParent', 
			'idx'=>$idx, 
			'type'=>$type,  
			'lang'=>$lang  
		));

		if(count($args["serialPhotos"])){

			foreach($args["serialPhotos"] as $pic) {
				if(!empty($pic)):
				$photo = 'INSERT INTO `photos` SET `parent`=:parent, `path`=:pathx, `type`=:type, `lang`=:lang, `status`=:zero';
				$photoPerpare = $this->conn->prepare($photo);
				$photoPerpare->execute(array(
					":parent"=>$idx, 
					":pathx"=>$pic, 
					":type"=>$type, 
					":lang"=>$lang, 
					":zero"=>0
				));
				endif;
			}
		}


		// remove old files
		$removeFiles = "DELETE FROM `file_system` WHERE `page_id`=:page_id AND `type`=:type AND `lang`=:lang"; 
		$fileDeletePerpare = $this->conn->prepare($removeFiles);
		$fileDeletePerpare->execute(array(
			":page_id"=>$args["idx"], 
			":lang"=>$lang, 
			":type"=>"page"  
		));
		

		if(count($args["serialFiles"])){
			$fileposition = 1;
			foreach ($args["serialFiles"] as $file) {
				if(!empty($file)):
				$explode = explode(",",$file); 
				$type = (isset($explode[0])) ? $explode[0] : "";
				$random = (isset($explode[1])) ? $explode[1] : "";
				$idx = (isset($explode[2])) ? $explode[2] : "";
				$cid = (isset($explode[3])) ? $explode[3] : "";
				$path = (isset($explode[4])) ? $explode[4] : "";

				$fpath = Config::WEBSITE.Config::PUBLIC_FOLDER_NAME."/".$path;
				$file_size = functions\files::get_size($fpath);

				if($idx != "" && $cid != "" && $path != ""){
					$files = 'INSERT INTO `file_system` SET `date`=:datex, `idx`=:idx, `cid`=:cid, `page_id`=:page_id, `file_path`=:file_path, `file_size`=:file_size, `type`=:type, `lang`=:lang, `position`=:position';
					$filePerpare = $this->conn->prepare($files);
					$filePerpare->execute(array(
					":datex"=>time(), 
					":idx"=>$idx, 
					":cid"=>$cid, 
					":page_id"=>$args["idx"], 
					":file_path"=>$path, 
					":file_size"=>$file_size,
					":lang"=>$lang,
					":type"=>$type,
					":position"=>$fileposition					
					));

					$fileposition++;					
				}
				
				endif;
			}
		}

		return 1;
	}

	private function changePagePositions($args)
	{
		$unserialize = unserialize($args['unserialize']);
		if(is_array($unserialize) && count($unserialize))
		{
			$position = 1;
			foreach ($unserialize as $val) {
				$update = "UPDATE `navigation` SET `position`=:position WHERE `cid`=:cid AND `idx`=:idx AND `nav_type`=:navType"; 
				$prepare = $this->conn->prepare($update); 
				$prepare->execute(array(
					":cid"=>$args['input_cid'], 
					":navType"=>$args['navType'], 
					":position"=>$position, 
					":idx"=>$val
				));
				$position++;
			}
			return 1;	
		}
		return 0;
	}

	private function removePage($args)
	{
		$navType = $args['navType'];
		$position = $args['pos'];
		$idx = $args['idx'];
		$cid = (empty($args['cid']) || $args['cid']==0) ? 0 : $args['cid'];

		$update = "UPDATE `navigation` SET `status`=:one WHERE `idx`=:idx";
		$prepare = $this->conn->prepare($update); 
		$prepare->execute(array(
			":one"=>1,
			":idx"=>$idx
		));
		if($prepare->rowCount()){
			$select = "SELECT `idx`, `position` FROM `navigation` WHERE `position`>:deletedItemPosition AND `nav_type`=:nav_type AND `cid`=:cid AND `status`!=:one";
			$prepare2 = $this->conn->prepare($select);
			$prepare2->execute(array(
				":deletedItemPosition"=>$position, 
				":nav_type"=>$navType, 
				":cid"=>$cid, 
				":one"=>1
			));
			if($prepare2->rowCount()){
				$fetch = $prepare2->fetchAll(PDO::FETCH_ASSOC);
				foreach ($fetch as $val) {
					$idx2 = $val['idx'];
					$newPosition = $val['position'] - 1;
					$update2 = "UPDATE `navigation` SET `position`=:newPosition WHERE `idx`=:idx2 AND `cid`=:cid";
					$prepare3 = $this->conn->prepare($update2);
					$prepare3->execute(array(
						":newPosition"=>$newPosition, 
						":idx2"=>$idx2, 
						":cid"=>$cid
					)); 
				}
			}
			return 1;
		}

		return 0;
	}
}