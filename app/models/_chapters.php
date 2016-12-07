<?php 
class _chapters
{
	public $data;

	public function index()
	{
		require_once("app/functions/files.php"); 
		$out = "";
		if(count($this->data)){
			$out .= "<ul class=\"collapsible\" data-collapsible=\"accordion\">\n";
			foreach($this->data as $value) {
				$fileTree = "";
				$file = new Database("file", array(
					"method"=>"selectFilesByPageId",  
					"page_id"=>$value['idx'],  
					"lang"=>$_SESSION['LANG'],  
					"type"=>"module"
				));

				if($file->getter()){
					$fileTree .= "<section class=\"fileTree\">\n";
					$fileTree .= "<ul>\n";
					foreach ($file->getter() as $f) {
						$subfile = new Database("file", array(
							"method"=>"selectFilesByPageId",  
							"page_id"=>$value['idx'],  
							"lang"=>$_SESSION['LANG'], 
							"cid"=>$f['idx'], 
							"type"=>"module"
						));

						$explode = explode("/", $f['file_path']); 
						$fileName = end($explode);

						$fileTree .= "<li>\n";	
						$fileTree .= "<div class=\"icon\"></div>\n";	
						$fileTree .= sprintf(
							"<div class=\"text\"><a href=\"%s\" target=\"_blank\">%s</a></div>\n",
							Config::PUBLIC_FOLDER.$f['file_path'], 
							$fileName
						);	
						$fileTree .= sprintf(
							"<div class=\"rightSide\">%s</div>\n",
							functions\files::formatSizeUnits($f['file_size']) 
						);	
						$fileTree .= "<div class=\"line\"></div>\n";

						if($subfile->getter()){
							$fileTree .= "<ul class=\"sub\">\n";	// sub	
							foreach ($subfile->getter() as $f2) {
								$explode2 = explode("/", $f2['file_path']); 
								$fileName2 = end($explode2);

								$fileTree .= "<li>\n";	
								$fileTree .= "<div class=\"icon\"></div>\n";	
								$fileTree .= sprintf(
									"<div class=\"text\"><a href=\"%s\" target=\"_blank\">%s</a></div>\n",
									Config::PUBLIC_FOLDER.$f2['file_path'], 
									$fileName2
								);	
								$fileTree .= sprintf(
									"<div class=\"rightSide\">%s</div>\n", 
									functions\files::formatSizeUnits($f2['file_size']) 
								);	
								$fileTree .= "<div class=\"line\"></div>\n";	
								$fileTree .= "</li>\n";	
							}
							$fileTree .= "</ul>\n";	
						}						
						

						$fileTree .= "</li>\n";	
					}
					$fileTree .= "</ul>\n";	
					$fileTree .= "<div class=\"clearer\"></div>\n";	
					$fileTree .= "</section>\n";	
				}


				$out .= "<li>\n";
				$out .= sprintf(
					"<div class=\"collapsible-header\"><i class=\"blueArraw-icon marginTop14\"></i><span>%s</span></div>\n",
					$value['title']
				);
				$out .= "<div class=\"collapsible-body\">\n";
				$out .= "<div class=\"hideShadow\"></div>\n";
				$out .= $fileTree;
				$out .= "<section class=\"padding20\">\n";
				$out .= sprintf(
					"%s\n",
					html_entity_decode($value['description'])
				);
				$out .= "</section>\n";
				$out .= "</div>\n";
				$out .= "</li>\n";
			}
			$out .= "</ul>\n";
		}

		return $out;
	}
}