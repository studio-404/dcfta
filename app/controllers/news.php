<?php 
class News extends Controller
{
	
	public function __construct()
	{
		
	}

	public function index($name = '')
	{
		/* view */
		$this->view('news/index', [
			"header"=>array(
				"website"=>Config::WEBSITE,
				"public"=>Config::PUBLIC_FOLDER
			)
		]);
	}

}