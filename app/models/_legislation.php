<?php 
class _legislation
{
	public $data;

	public function index()
	{
		require_once("app/functions/timeleft.php"); 

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
							"<div class=\"rightSide\"><i class=\"penIcon height30 cursorPointer\" onclick=\"openComment('c%s','commentForm%s')\"></i></div>\n",
							$f['idx'], 
							$value['idx'] 
						);	
						$fileTree .= "<div class=\"line\"></div>\n";

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
				


				$out .= "<section class=\"col s12 m8 l8 commentForm".$value['idx']."\" style=\"display: none;\">";
				$out .= "<section class=\"justTitle\" style=\"color:#3c3c3c\">You can leave your comments here</section><br>";
				$endtime = $value['date'] + 604800;
				
				$out .= sprintf(
					"<section class=\"timeLeft\">* You can leave your comment here  <span>%s</span></section>",
					functions\timeleft::index($endtime)
				);
				$out .= "<section class=\"contactForm\">";
				$out .= "<form action=\"\" method=\"post\">";
				$out .= "<div class=\"commentForm".$value['idx']."_msg\" style=\"padding:0 0 20px 0\"></div>";
				$out .= "<input type=\"hidden\" name=\"commentId\" class=\"commentId\" value=\"c1\">";
				$out .= "<section class=\"marginminus10\">";
				$out .= "<div class=\"input-field col s12 m6 l4\">";
				$out .= "<input type=\"text\" class=\"validate first_name\">";
				$out .= "<label>Your Name</label>";
				$out .= "</div>";
				$out .= "<div class=\"input-field col s12 m6 l4\">";
				$out .= "<input type=\"text\" class=\"validate organization\">";
				$out .= "<label>Organization</label>";
				$out .= "</div>";
				$out .= "<div class=\"input-field col s12 m6 l4\">";
				$out .= "<input type=\"text\" class=\"validate email\">";
				$out .= "<label>Email Address</label>";
				$out .= "</div>";
				$out .= "<div class=\"input-field col s12 m12 l12\">";
				$out .= "<input type=\"text\" class=\"validate comment\">";
				$out .= "<label>Comment</label>";
				$out .= "</div>";
				$out .= "<div class=\"col s12 m12 l12\">";
				$out .= "<a class=\"waves-effect waves-light btn submit\" style=\"text-decoration: none;\" onclick=\"comment('commentForm".$value['idx']."','".$_SESSION['LANG']."')\">Submit</a>";
				$out .= "</div>";
				$out .= "</section>";
				$out .= "</form>";
				$out .= "</section>";
				$out .= "</section>";
				$out .= "<div class=\"clearer\"></div>";
				$out .= "</section>";



				$out .= "</div>\n";
				$out .= "</li>\n";
			}
			$out .= "</ul>\n";
		}

		return $out;
	}
}