<?php 
class _navigation
{
	public $data;

	public function index(){
		/*
	<ul>
				<li><a href="index.php" class="active"><span>Home</span></a></li>
				<li><a href="about.php"><span>About</span></a></li>
				<li><a href="agreement.php"><span>Agreement</span></a></li>
				<li><a href="implimentation.php"><span>Implimentation</span></a></li>
				<li><a href="coordination.php"><span>Coordination</span></a></li>
				<li><a href="legislation.php"><span>Legislation</span></a></li>
				<li><a href="is.php"><span>International Support</span></a></li>
				<li class="sub" data-sub="i25">
					<a href="dcfta.php" class="slide"><span>DCFTA for bussiness</span></a> <i class="arrow"></i>
					<ul class="i25">
						<li><a href=""><span>Sectors</span></a></li>
						<li><a href=""><span>Technical requirements</span></a></li>
						<li><a href=""><span>Public services</span></a></li>
						<li><a href=""><span>Standarts</span></a></li>
						<li><a href=""><span>Certifications</span></a></li>
						<li><a href=""><span>Rules of origin</span></a></li>
						<li><a href=""><span>Custom procedures</span></a></li>
					</ul>
				</li>
				<li><a href="news.php"><span>News &amp; Events</span></a></li>
				<li><a href="contact.php"><span>Contact</span></a></li>
			</ul>
*/

		$out = "<ul>\n";
		if(count($this->data)){
			foreach($this->data as $value) {
				$out .= sprintf(
					"<li><a href=\"%s\"><span>%s</span></a></li>",
					$value['slug'], 
					$value['title']  
				);
			}				
		}			
		$out .= "</ul>\n";
		
		return $out;
	}
}