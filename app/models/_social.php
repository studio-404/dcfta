<?php 
class _social
{
	public $networks;

	public function index(){
		require_once("app/functions/strip_output.php");
		$out = '<ul>';
		if(count($this->networks)){
			foreach($this->networks as $value) {
				$out .= sprintf(
					"<li><a href=\"%s\" class=\"%s\" target=\"_blank\"></a></li>\n", 
					strip_output::index($value['url']),
					strip_output::index($value['classname'])
				);
			}				
		}			
		$out .= '</ul>';
		
		return $out;
	}
}