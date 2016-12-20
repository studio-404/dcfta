<?php 
class _top
{
	public  $data;

	public function index()
	{
		require_once("app/functions/l.php"); 
		$l = new functions\l();
		
		$out = "<header>\n";
		$out .= "<section class=\"top\">\n";
		$out .= "<section class=\"centerWidth topCenter\">\n";
		$out .= "<section class=\"top-box\">\n";
		$out .= "<section class=\"social-networks\">\n";
		$out .= $this->data['socialNetworksModule'];
		$out .= "</section>\n";
		$out .= "<section class=\"languages\">\n";
		$out .= $this->data['languagesModule'];
		$out .= "</section>\n";
		$out .= "</section>\n";
		$out .= "</section>\n";
		$out .= "</section>\n";
		$out .= "<section class=\"topBottom\">\n";
		$out .= "<section class=\"centerWidth\">\n";
		$out .= "<section class=\"logo\">\n";
		$out .= "<div class=\"flags\">\n";
		$out .= sprintf(
			"<p><img src=\"%simg/geo.png\" alt=\"Georgian Flag\" /></p>",
			Config::PUBLIC_FOLDER
		);
		$out .= sprintf(
			"<p><img src=\"%simg/eur.png\" alt=\"Georgian Flag\" /></p>\n", 
			Config::PUBLIC_FOLDER
		);
		$out .= "<p>dcfta.gov.ge</p>\n";
		$out .= "</div>\n";
		$out .= "<div class=\"text\">".$l->translate('logotext')."</div>\n";
		$out .= "</section>\n";
		$out .= "<section class=\"search\">\n";
		$out .= "<i class=\"material-icons\">search</i>\n";
		$out .= "<div class=\"input-field\">\n";
		$out .= sprintf(
			"<input id=\"searchInput\" type=\"text\" value=\"%s\" data-val=\"%s\" onclick=\"searchInputOn()\" onblur=\"searchInputOff()\" />\n", 
			$l->translate('search'), 
			$l->translate('search')
		);
		$out .= "</div>\n";
		$out .= "</section>\n";
		$out .= "<section class=\"nav_bg\">\n";
		$out .= "<div class=\"nav_bar\" onclick=\"openNavigation()\">\n";
		$out .= "<div class=\"c-hamburger c-hamburger--htx\">\n";
		$out .= "<span>toggle menu</span>\n";
		$out .= "</div>\n";
		$out .= "</section>\n";
		$out .= "</section>\n";
		$out .= "<section class=\"navigation\">\n";
		$out .= $this->data['navigationModule'];
		$out .= "</section>\n";
		$out .= "</section>\n";
		$out .= "</header>\n";
		$out .= "<section class=\"mobileNavigation\">\n";
		$out .= "<section class=\"yellowBox\"></section>\n";
		$out .= "<section class=\"blueBox\"></section>\n";
		$out .= "</section>\n";
		return $out;
	}
}