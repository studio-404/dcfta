<?php 
class _reports
{
	public $data;

	public function index()
	{
		require_once("app/functions/files.php"); 
		require_once("app/functions/string.php"); 

		$out = "\n";

		$sting = new functions\string();
		
		if(count($this->data)){
			foreach($this->data as $value) {
				$file = new Database("file", array(
					"method"=>"selectFilesByPageId",  
					"page_id"=>$value['idx'],  
					"lang"=>$value['lang'],  
					"type"=>"module"
				));

				if($file->getter()){
					$f = $file->getter();
					$theFile = Config::PUBLIC_FOLDER.$f[0]['file_path'];
					$size = $f[0]['file_size'];
				}else{
					$theFile = "";
					$size = 0;
				}

				$out .= sprintf(
					"<section class=\"file\" title=\"%s\">\n", 
					$value['title']
				);
				$out .= sprintf(
					"<a href=\"%s\" target=\"_blank\">\n", 
					$theFile
				);
				$out .= "<p class=\"pdfIcon\"></p>\n";
				$out .= "<p class=\"downloadIcon\"></p>\n";
				$out .= sprintf(
					"<p class=\"title\"><span>%s</span><br /><b>%s</b></p>\n", 
					$sting->cut($value['title'],60),
					functions\files::formatSizeUnits($size) 
				);
				$out .= "</a>";
				$out .= "</section>";
			}
		}
		return $out;
	}
}