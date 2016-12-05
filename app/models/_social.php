<?php 
class _social
{
	public $networks;

	public function index(){
		$out = '<ul>';
		if(count($this->networks)){
			foreach($this->networks as $value) {
				$out .= sprintf(
					"<li><a href=\"%s\" class=\"%s\" target=\"_blank\"></a></li>\n", 
					$value['url'], 
					$value['classname'] 
				);
			}				
		}			
		$out .= '</ul>';
		
		return $out;
	}
}