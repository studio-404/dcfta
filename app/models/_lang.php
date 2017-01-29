<?php 
class _lang
{
	public $langs;

	public function index(){
		require_once("app/functions/strip_output.php");
		$out = "<ul>\n";
		if(count($this->langs)){
			foreach($this->langs as $value) {
				$active = ($value['title']==$_SESSION['LANG']) ? " class='active'" : '';
				$out .= sprintf(
					"<li><a href=\"javascript:void(0)\"%s onclick=\"changeLanguage('%s','%s')\">%s</a></li>\n", 
					strip_tags($active), 
					strip_tags($value['title']), 
					strip_output::index($_SESSION['LANG']), 
					strtoupper(htmlspecialchars($value['name']))
				);
			}				
		}			
		$out .= "</ul>\n";
		
		return $out;
	}
}