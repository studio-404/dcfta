<?php 
class App{

	protected $controller = Config::MAIN_CLASS;
	
	protected $method = Config::MAIN_METHOD;
	
	protected $params = [];


	public function __construct()
	{
		$url = $this->parseUrl();

		$_SESSION["LANG"] = (isset($url[0])) ? $url[0] : "ge";


		if(file_exists('app/controllers/'. $url[1].'.php')){
			$this->controller = $url[1];
			unset($url[1]);
		}

		require_once 'app/controllers/'.$this->controller.'.php';

		$this->controller = new $this->controller;

		if(isset($url[2]))
		{
			if(method_exists($this->controller, $url[2])){
				$this->method = $url[2];
				unset($url[2]);
			}else{
				$this->method = "index"; 
			}
		}

		$this->params = $url ? array_values($url) : [];

		call_user_func_array([$this->controller, $this->method], $this->params);

	}	

	public function parseUrl()
	{
		if(isset($_GET['url'])){
			return $url = explode("/", filter_var(rtrim($_GET['url'], '/'), FILTER_SANITIZE_URL));
		}
	}
}