<?php 
class Graph extends Controller
{
	public function __construct()
	{
		
	}

	public function index($name = '')
	{
		/* DATABASE */
		$db_langs = new Database("language", array(
			"method"=>"select"
		));
		

		$s = (isset($_SESSION["URL"][1])) ? $_SESSION["URL"][1] : Config::MAIN_CLASS;
		$db_pagedata = new Database("page", array(
			"method"=>"selecteBySlug", 
			"slug"=>$s,
			"lang"=>$_SESSION['LANG'], 
			"all"=>true
		));

		$chart = new Database("chart", array(
			"method"=>"select", 
			"cid"=>0,
			"type"=>"coord1"
		));

		$chart2 = new Database("chart", array(
			"method"=>"select", 
			"cid"=>0,
			"type"=>"coord2"
		));

		/* HEDARE */
		$header = $this->model('_header');
		$header->public = Config::PUBLIC_FOLDER; 
		$header->lang = $_SESSION["LANG"]; 
		$header->pagedata = $db_pagedata; 

		/* LANGUAGES */
		$languages = $this->model('_lang'); 
		$languages->langs = $db_langs->getter();
	
		/* view */
		$this->view('graph/index', [
			"header"=>array(
				"website"=>Config::WEBSITE,
				"public"=>Config::PUBLIC_FOLDER
			),
			"headerModule"=>$header->index(),  
			"pageData"=>$db_pagedata->getter(), 
			"chart"=>$chart->getter(), 
			"chart2"=>$chart2->getter()
		]);
	}
}