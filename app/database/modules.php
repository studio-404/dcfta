<?php 
class modules
{
	private $conn;

	public function index($conn, $args)
	{
		$out = 0;
		$this->conn = $conn;
		if(method_exists("modules", $args['method']))
		{
			$out = $this->$args['method']($args);
		}
		return $out;
	}

	private function selectParentUsefull($args)
	{
		$fetch = array();
		$select = "SELECT * FROM `usefull_modules` WHERE `lang`=:lang AND `status`!=:one ORDER BY `id` ASC";
		$prepare = $this->conn->prepare($select);
		$prepare->execute(array(
			":one"=>1,
			":lang"=>$_SESSION["LANG"]
		));
		if($prepare->rowCount()){
			$fetch = $prepare->fetchAll(PDO::FETCH_ASSOC);
		}
		
		return $fetch;
	}

	private function parentModuleOptions($args)
	{
		$options = array();
		$fetch = $this->selectParentUsefull($args);
		foreach ($fetch as $val) {
			$options[$val['type']] = $val['title'];
		}
		$options["false"] = "- მიმაგრების მოხსნა";
		return $options;
	}

	private function selectContactData($args)
	{
		$out['phone'] = "";
		$out['email'] = "";
		$out['map'] = "";
		$out['agreement'] = "";
		$out['facebook'] = "";
		$out['address1'] = "";
		$out['address2'] = "";
		$select = "SELECT `description` FROM `usefull` WHERE `type`=:type AND `lang`=:lang AND `visibility`!=:one AND `status`!=:one ORDER BY `id` ASC";
		$prepare = $this->conn->prepare($select);
		$prepare->execute(array(
			":type"=>"contact",
			":one"=>1,
			":lang"=>$args['lang']
		));
		if($prepare->rowCount()){
			$fetch = $prepare->fetchAll(PDO::FETCH_ASSOC);
			$out['phone'] = @$fetch[0]['description'];
			$out['email'] = @$fetch[1]['description'];
			$out['map'] = @$fetch[2]['description'];
			$out['agreement'] = @$fetch[3]['description'];
			$out['facebook'] = @$fetch[4]['description'];
			$out['address1'] = @$fetch[5]['description'];
			$out['address2'] = @$fetch[6]['description'];
		}
		
		return $out;
	}

	private function selectModuleByType($args)
	{
		$fetch = array();
		$limit = (isset($args['from']) && isset($args['num'])) ? " LIMIT ".$args["from"].",".$args['num'] : "";
		
		$select = "SELECT * FROM `usefull` WHERE `type`=:type AND `visibility`!=:one AND `lang`=:lang AND `status`!=:one ORDER BY `date` DESC".$limit;

		$prepare = $this->conn->prepare($select);
		$prepare->execute(array(
			":type"=>$args['type'], 
			":one"=>1,
			":lang"=>$_SESSION["LANG"]
		));
		if($prepare->rowCount()){
			$fetch = $prepare->fetchAll(PDO::FETCH_ASSOC);
		}
		
		return $fetch;
	}

	private function selectModuleByTypeLoadmore($args)
	{
		$fetch = array();
		$limit = (isset($args['from']) && isset($args['num'])) ? " LIMIT ".(int)$args["from"].",".(int)$args['num'] : ""; 
		
		$select = "SELECT *, 
		(
			SELECT `photos`.`path` FROM `photos` WHERE 
			`photos`.`parent`=`usefull`.`idx` AND 
			`photos`.`lang`=:lang AND 
			`photos`.`type`='news' AND 
			`photos`.`status`!=:one 
			ORDER BY `photos`.`id` ASC LIMIT 1
		) as photo 
		FROM 
		`usefull` 
		WHERE 
		`usefull`.`type`=:type AND 
		`usefull`.`visibility`!=:one AND 
		`usefull`.`lang`=:lang AND 
		`usefull`.`status`!=:one 
		ORDER BY `usefull`.`date` DESC".$limit;	

		$prepare = $this->conn->prepare($select);
		$prepare->execute(array(
			":type"=>$args['type'], 
			":one"=>1,
			":lang"=>$_SESSION["LANG"]
		));
		if($prepare->rowCount()){
			$fetch = $prepare->fetchAll(PDO::FETCH_ASSOC);
		}
		
		return $fetch;
	}

	private function select($args)
	{
		$fetch = array();
		$itemPerPage = $args['itemPerPage'];
		$from = (isset($_GET['pn']) && $_GET['pn']>0) ? (($_GET['pn']-1)*$itemPerPage) : 0;
		$parsed_url = $args['parsed_url'];
		if(isset($parsed_url[3])){
			$select = "SELECT (SELECT COUNT(`id`) FROM `usefull` WHERE `type`=:type AND `lang`=:lang AND `status`!=:one) as counted, `idx`, `title`, `visibility`, `lang` FROM `usefull` WHERE `type`=:type AND `lang`=:lang AND `status`!=:one ORDER BY `date` DESC LIMIT ".$from.",".$itemPerPage;
			$prepare = $this->conn->prepare($select); 
			$prepare->execute(array(
				":type"=>$parsed_url[3], 
				":lang"=>$args['lang'],
				":one"=>1
			));
			if($prepare->rowCount()){
				$fetch = $prepare->fetchAll(PDO::FETCH_ASSOC);
			}
		}
		return $fetch;
	}

	private function selectById($args)
	{
		$fetch = array();
		$select = "SELECT * FROM `usefull` WHERE `idx`=:idx AND `lang`=:lang AND `status`!=:one";
		$prepare = $this->conn->prepare($select); 
		$prepare->execute(array(
			":idx"=>$args['idx'], 
			":lang"=>$args['lang'], 
			":one"=>1
		));
		if($prepare->rowCount()){
			$fetch = $prepare->fetch(PDO::FETCH_ASSOC);
		}
		return $fetch;
	}

	private function edit($args)
	{
		require_once 'app/functions/files.php';

		$idx = $args["idx"];
		$lang = $args["lang"];
		$date = strtotime($args["date"]);
		$date2 = strtotime($args["date2"]);
		$date_format = date("Y-m-d", $date);
		$title = $args["title"];
		$description = $args["pageText"];
		$url = (!empty($args["link"])) ? $args["link"] : "";
		$classname = (!empty($args["classname"])) ? $args["classname"] : "";
		$type = $this->getTypeByIdx($args["idx"]);

		$update = "UPDATE `usefull` SET 
		`date`=:datex, 
		`expire_date`=:datex2, 
		`date_format`=:date_format, 
		`title`=:title, 
		`description`=:description, 
		`url`=:url, 
		`classname`=:classname 
		WHERE `idx`=:idx AND `lang`=:lang";
		$prepare = $this->conn->prepare($update);
		$prepare->execute(array(
			":datex"=>$date,
			":datex2"=>$date2,
			":date_format"=>$date_format,
			":title"=>$title,
			":description"=>$description,
			":url"=>$url,
			":classname"=>$classname,
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
			":type"=>"module"  
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

	private function getTypeByIdx($idx)
	{
		$sql = "SELECT `type` FROM `usefull` WHERE `idx`=:idx AND `status`!=:one";
		$prepare = $this->conn->prepare($sql);
		$prepare->execute(array(
			":idx"=>$idx, 
			":one"=>1 
		));
		if($prepare->rowCount())
		{
			$fetch = $prepare->fetch(PDO::FETCH_ASSOC);
			return $fetch['type'];
		}
		return 0;
	}

	private function updateVisibility($args)
	{
		$visibility = ($args['visibility']==0) ? 1 : 0;
		$idx = (int)$args['idx'];

		$update = "UPDATE `usefull` SET `visibility`=:visibility WHERE `idx`=:idx";
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

	private function add($args)
	{
		$date = strtotime($args['date']);
		$date2 = strtotime($args['date2']);
		$date_format = date("Y-m-d", $date);
		$type = $args['moduleSlug'];
		$title = $args['title'];
		$pageText = $args['pageText'];
		$link = (!empty($args["link"])) ? $args["link"] : "";
		$classname = (!empty($args["classname"])) ? $args["classname"] : "";

		$select = "SELECT `title` FROM `languages`";
		$prepare = $this->conn->prepare($select);
		$prepare->execute();
		$fetch = $prepare->fetchAll(PDO::FETCH_ASSOC);

		$max = "SELECT MAX(`idx`) as maxidx FROM `usefull` WHERE `status`!=:one";
		$prepare2 = $this->conn->prepare($max);
		$prepare2->execute(array(":one"=>1));
		$fetch2 = $prepare2->fetch(PDO::FETCH_ASSOC);
		$maxId = ($fetch2["maxidx"]) ? $fetch2["maxidx"] + 1 : 1;

		foreach ($fetch as $val) {
			$insert = "INSERT INTO `usefull` SET `idx`=:idx, `date`=:datex, `expire_date`=:datex2, `date_format`=:date_format, `type`=:type, `title`=:title, `description`=:description, `url`=:url, `classname`=:classname, `lang`=:lang";
			$prepare3 = $this->conn->prepare($insert);
			$prepare3->execute(array(
				":idx"=>$maxId, 
				":datex"=>$date, 
				":datex2"=>$date2, 
				":date_format"=>$date_format, 
				":type"=>$type, 
				":title"=>$title, 
				":description"=>$pageText, 
				":url"=>$link,
				":classname"=>$classname,
				":lang"=>$val['title']
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
				$current_lang = $args['lang'];

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

	private function selectArchive($args)
	{
		$fetch = array();
		$select = "SELECT *, (SELECT `path` FROM `photos` WHERE `photos`.`parent`=`usefull`.`idx` AND `photos`.`type`=`usefull`.`type` ORDER BY `photos`.`id` ASC LIMIT 1) as mainPhoto FROM `usefull` WHERE `date_format`=:date_format AND `type`=:type AND `lang`=:lang AND `status`!=:one ORDER BY `date` DESC";
		$prepare = $this->conn->prepare($select); 
		$prepare->execute(array(
			":date_format"=>$args['date_format'], 
			":type"=>$args['type'], 
			":lang"=>$args['lang'],
			":one"=>1
		));
		if($prepare->rowCount()){
			$fetch = $prepare->fetchAll(PDO::FETCH_ASSOC);
		}
		return $fetch;
	}

	private function selectMonthEventsIn($args)
	{
		$days_in_month = $args['days_in_month'];
		$month = $args['month'];
		$year = $args['year'];
		$events = "( ";
		for ($i=1; $i <= $days_in_month; $i++) { 
			$date = sprintf(
				"%s-%s-%s", 
				$args["year"],
				$args["month"],
				$i				 
			);
			$events .= "`date_format`='".$date."' OR ";
		}
		$events .= " `date_format`='test' )";

		$sql = "SELECT `idx`,`title`,`type`,`date_format` FROM `usefull` WHERE (`type`=:event OR `type`=:news) AND ".$events." AND `lang`=:lang AND `visibility`!=:one AND `status`!=:one";
		$prepare = $this->conn->prepare($sql);
		$prepare->execute(array(
			":event"=>"event", 
			":news"=>"news", 
			":lang"=>$args['lang'], 
			":one"=>1 
		));
		$out = "";
		$cal = array();
		if($prepare->rowCount())
		{
			$fetch = $prepare->fetchAll(PDO::FETCH_ASSOC);
			foreach ($fetch as $val) {
				$date_format = number_format(substr($val['date_format'],-2));
				$cal[$date_format][$val['type']] = array( $val['idx']=>$val['title'] );
			}
		}

		return $cal;
	}

	private function translate($args)
	{
		$fetch = array();
		$sql = "SELECT `description` FROM `usefull` WHERE `title`=:title AND `type`=:type AND `lang`=:lang AND `visibility`!=:one AND `status`!=:one";
		$prepare = $this->conn->prepare($sql);
		$prepare->execute(array(
			":type"=>"language", 
			":title"=>$args['word'], 
			":lang"=>$args['lang'], 
			":one"=>1 
		));
		if($prepare->rowCount())
		{
			$fetch = $prepare->fetch(PDO::FETCH_ASSOC);
			return strip_tags($fetch['description']);
		}
		return "";
	}

	private function removeModule($args)
	{
		$idx = $args['idx'];

		$update = "UPDATE `usefull` SET `status`=:one WHERE `idx`=:idx";
		$prepare = $this->conn->prepare($update); 
		$prepare->execute(array(
			":one"=>1,
			":idx"=>$idx
		));
		if($prepare->rowCount()){
			return 1;
		}

		return 0;
	}
}