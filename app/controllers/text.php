<?php 
class Text extends Controller
{
	
	public function __construct()
	{
		
	}

	public function index($name = '')
	{
		/* view */
		$this->view('text/index', [
			"header"=>array(
				"website"=>Config::WEBSITE,
				"public"=>Config::PUBLIC_FOLDER
			)
		]);
	}

}