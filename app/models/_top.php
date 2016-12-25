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
		// $out .= sprintf(
		// 	"<p><img src=\"%simg/geo.png\" alt=\"Georgian Flag\" /></p>",
		// 	Config::PUBLIC_FOLDER
		// );
		// $out .= sprintf(
		// 	"<p><img src=\"%simg/eur.png\" alt=\"Georgian Flag\" /></p>\n", 
		// 	Config::PUBLIC_FOLDER
		// );
		if($_SESSION['LANG']=="ge"){
		$out .= '<svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
	 width="332.5px" height="80px" viewBox="0 0 332.5 80" enable-background="new 0 0 332.5 80" xml:space="preserve">
<text transform="matrix(1 0 0 1 0 46)" fill="#19338F" font-family="museo700" font-size="55">dcfta.gov.ge</text>
	<text transform="matrix(1 0 0 1 3 75)">
		<tspan x="0" y="0" fill="#19338F" font-family="noto_sans_georgianregular" font-size="15">
		ვებ-პორტალი </tspan>
		<tspan x="115" y="0" fill="#19338F" font-family="museo700" font-size="15">
		dcfta</tspan>
		<tspan x="153" y="0" fill="#19338F" font-family="noto_sans_georgianregular" font-size="15">
		-ის მხარდასაჭერად</tspan>
	</text>
</svg>
';
		}else{
			$out .= '<svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
	 width="326px" height="80px" viewBox="0 0 326 80" enable-background="new 0 0 326 80" xml:space="preserve">
<text transform="matrix(1 0 0 1 0 46)" fill="#19338F" font-family="museo700" font-size="55">dcfta.gov.ge</text>
<text transform="matrix(1 0 0 1 3 70.5)" fill="#19338F" font-family="noto_sansregular" font-size="13">Georgia-EU Deep &amp; Comprehensive Free Trade Area</text>
</svg>';
		}
		$out .= "</div>\n";
		$out .= "</section>\n";
		$out .= "<section class=\"search\">\n";
		$out .= "<i class=\"material-icons\">search</i>\n";
		$out .= "<div class=\"input-field\">\n";
		$searchText = (isset($this->data['searchText'])) ? $this->data['searchText'] : $l->translate('search');
		$out .= sprintf(
			"<input id=\"searchInput\" type=\"text\" value=\"%s\" data-val=\"%s\" onclick=\"searchInputOn()\" onblur=\"searchInputOff()\" data-lang=\"%s\" />\n", 
			$searchText, 
			$l->translate('search'),
			$_SESSION['LANG']
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