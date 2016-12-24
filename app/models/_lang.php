<?php 
class _lang
{
	public $langs;

	public function index(){
		$out = "<ul>\n";
		if(count($this->langs)){
			foreach($this->langs as $value) {
				$active = ($value['title']==$_SESSION['LANG']) ? " class='active'" : '';
				$out .= sprintf(
					"<li><a href=\"javascript:void(0)\"%s onclick=\"changeLanguage('%s','%s')\">%s</a></li>\n", 
					$active, 
					$value['title'], 
					$_SESSION['LANG'], 
					strtoupper($value['name'])
				);
			}				
		}			
		$out .= "</ul>\n";
		
		return $out;
	}
}