<?php 
class Legislation extends Controller
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
		
		$db_socials = new Database("modules", array(
			"method"=>"selectModuleByType", 
			"type"=>"social"
		));

		$db_legislation = new Database("modules", array(
			"method"=>"selectModuleByType", 
			"type"=>"legislation", 
			"from"=>0, 
			"num"=>10
		));

		$db_navigation = new Database("page", array(
			"method"=>"select", 
			"cid"=>0, 
			"nav_type"=>0,
			"lang"=>$_SESSION['LANG'],
			"status"=>0 
		));

		$s = (isset($_SESSION["URL"][1])) ? $_SESSION["URL"][1] : Config::MAIN_CLASS;
		$db_pagedata = new Database("page", array(
			"method"=>"selecteBySlug", 
			"slug"=>$s,
			"lang"=>$_SESSION['LANG'], 
			"all"=>true
		));
		$db_footer = new Database("modules", array(
			"method"=>"selectById", 
			"idx"=>18,
			"lang"=>$_SESSION['LANG']
		));

		

		/* HEDARE */
		$header = $this->model('_header');
		$header->public = Config::PUBLIC_FOLDER; 
		$header->lang = $_SESSION["LANG"]; 

		/* SOCIAL */
		$social = $this->model('_social');
		$social->networks = $db_socials->getter(); 

		/* LANGUAGES */
		$languages = $this->model('_lang'); 
		$languages->langs = $db_langs->getter();

		/* NAVIGATION */
		$navigation = $this->model('_navigation');
		$navigation->data = $db_navigation->getter();

		/* legislation */
		$legislation = $this->model('_legislation');
		$legislation->data = $db_legislation->getter();


		/*footer */
		$footer = $this->model('_footer');
		$footer->data = $db_footer->getter(); 

	
		/* view */
		$this->view('legislation/index', [
			"header"=>array(
				"website"=>Config::WEBSITE,
				"public"=>Config::PUBLIC_FOLDER
			),
			"headerModule"=>$header->index(), 
			"languagesModule"=>$languages->index(), 
			"socialNetworksModule"=>$social->index(), 
			"navigationModule"=>$navigation->index(), 
			"pageData"=>$db_pagedata->getter(), 
			"legislation"=>$legislation->index(), 
			"footer"=>$footer->index() 
		]);
	}
}