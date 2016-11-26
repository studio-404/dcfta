<?php
class Home extends Controller
{
	
	public function __construct()
	{
		
	}

	public function index($name = '')
	{
		/* view */
		$this->view('home/index', [
			"header"=>array(
				"website"=>Config::WEBSITE,
				"public"=>Config::PUBLIC_FOLDER
			)
		]);
	}

}