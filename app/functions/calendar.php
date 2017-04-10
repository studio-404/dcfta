<?php 
namespace functions;
 
class calendar
{
	public $geomonth; 
	public $engmonth; 
	public $rusmonth; 

	public $date;
	public $day;
	public $month;
	public $year;

	public $Cday;
	public $Cmonth;
	public $Cyear;

	public $getYear;
	public $getMonth;

	public function __construct()
	{
		$this->geomonth = array("January"=>"იანვარი", "February"=>"თებერვალი", "March"=>"მარტი", "April"=>"აპრილი", "May"=>"მაისი", "June"=>"ივნისი", "July"=>"ივლისი", "August"=>"აგვისტო", "September"=>"სექტემბერი", "October"=>"ოქტომბერი", "November"=>"ნოემბერი", "December"=>"დეკემბერი");
		$this->rusmonth = array("January"=>"январь", "February"=>"февраль", "March"=>"март", "April"=>"апрель", "May"=>"май", "June"=>"июнь", "July"=>"июль", "August"=>"август", "September"=>"сентябрь", "October"=>"октябрь", "November"=>"ноябрь", "December"=>"декабрь");

		$this->date = time();
		$this->day = date('d', $this->date); 
		$this->month = date('m', $this->date);
		$this->year = date('Y', $this->date);

		$this->Cday = date('d', $this->date);
		$this->Cmonth = date('m', $this->date);
		$this->Cyear = date('Y', $this->date);
	}

	public function index($lang)
	{
		if(!isset($this->month) || !isset($this->year) || $this->month=="" || $this->year==""){
			exit();
		}
		if(isset($this->getMonth)){ $this->month=$this->getMonth; }
		if(isset($this->getYear)){ $this->year=$this->getYear; }

		$this->first_day = mktime(0, 0, 0, $this->month, 1, $this->year);
		$this->title = date('F',$this->first_day);
		if($lang=="ge")
		{
			$this->title = $this->geomonth[$this->title]; 
			$this->weekDayNames = array("ორშ","სამ","ოთხ","ხუთ","პარ","შაბ","კვი");
		}
		else if($lang=="ru")
		{
			$this->title = $this->rusmonth[$this->title]; 	
			$this->weekDayNames = array("Mon","Tue","Wed","Thu","Fri","Sat","Sun");
		}
		else
		{ 
			// english the same
			$this->weekDayNames = array("Mon","Tue","Wed","Thu","Fri","Sat","Sun");
		}

		$this->day_of_week = date('D', $this->first_day);

		switch($this->day_of_week)
		{
			case "Mon": $this->blank=0; break;
			case "Tue": $this->blank=1; break;
			case "Wed": $this->blank=2; break;
			case "Thu": $this->blank=3; break;
			case "Fri": $this->blank=4; break;
			case "Sat": $this->blank=5; break;
			case "Sun": $this->blank=6; break;
			default: exit;
		}

		$this->days_in_month = cal_days_in_month(0, $this->month, $this->year);

		$this->out = "<div class=\"table\">\n";

		$this->out .= "<div class=\"tr\">\n";
		$this->out .= "<div class=\"td\" id=\"title-calendar\">\n";

		if($this->month!=1)
		{ 
			$this->yy_month = $this->month-1; 
			$this->yy_year = $this->year; 
		}
		else
		{ 
			$this->yy_month = 12; 
			$this->yy_year = $this->year-1; 
		}

		$this->out .= "<a href=\"javascript:void(0)\" onclick=\"loadCal('prev', '".$this->month."', '".$this->year."', '".$_SESSION['LANG']."')\">&nbsp;</a>";
		$this->out .= $this->title." <span style=\"font-family: museo700\">".$this->year."</span>";		
		$this->out .= "<a href=\"javascript:void(0)\" onclick=\"loadCal('next', '".$this->month."', '".$this->year."', '".$_SESSION['LANG']."')\">&nbsp;</a>";

		$this->out .= "</div>\n";
		$this->out .= "</div>\n";


		$this->out .= "<div class=\"tr\" style=\"margin:5px 0px\">\n";
		$this->out .= sprintf("<div class=\"td weekDay\">%s</div>\n", $this->weekDayNames[0]);
		$this->out .= sprintf("<div class=\"td weekDay\">%s</div>\n", $this->weekDayNames[1]);
		$this->out .= sprintf("<div class=\"td weekDay\">%s</div>\n", $this->weekDayNames[2]);
		$this->out .= sprintf("<div class=\"td weekDay\">%s</div>\n", $this->weekDayNames[3]);
		$this->out .= sprintf("<div class=\"td weekDay\">%s</div>\n", $this->weekDayNames[4]);
		$this->out .= sprintf("<div class=\"td weekDay\">%s</div>\n", $this->weekDayNames[5]);
		$this->out .= sprintf("<div class=\"td weekDay\">%s</div>\n", $this->weekDayNames[6]);
		$this->out .= "</div>\n";

		$this->day_count = 1;

		/* Dayes  */ 
		$this->out .= "<div class=\"tr\">";
		while($this->blank > 0)
		{
			$this->out .= "<div class=\"td\"><div class=\"nobg\">&nbsp;</div></div>";
			$this->blank = $this->blank-1;
			$this->day_count++;
		}
		
		$this->day_num = 1;

		/* SELECT Events & News START */
		$Database = new \Database("modules", array(
				"method"=>"selectMonthEventsIn", 
				"days_in_month"=>$this->days_in_month,
				"month"=>$this->month,
				"year"=>$this->year, 
				"lang"=>$_SESSION['LANG']
		));
		$fetch = $Database->getter();
		/* SELECT Events & News END */


		while($this->day_num <= $this->days_in_month)
		{
			$this->d = $this->year . "/" . $this->month . "/" . $this->day_num;
			$this->to_time = strtotime($this->d);

			if(isset($fetch[$this->day_num])){
				// $newsArchive = \Config::WEBSITE.$_SESSION['LANG']."/archive/news/".$this->year."-".sprintf("%02d", $this->month)."-".sprintf("%02d", $this->day_num);
				// $eventArchive = \Config::WEBSITE.$_SESSION['LANG']."/archive/event/".$this->year."-".sprintf("%02d", $this->month)."-".sprintf("%02d", $this->day_num);
				$bothArchive = \Config::WEBSITE.$_SESSION['LANG']."/archive/load/".$this->year."-".sprintf("%02d", $this->month)."-".sprintf("%02d", $this->day_num);

				// if(isset($fetch[$this->day_num]['event']) && isset($fetch[$this->day_num]['news'])){
				// 	$this->out .= sprintf(
				// 		"<div class=\"td day_numbers\"><div class=\"both_exists\"><span class=\"t\">%s</span><p class=\"n\">news</p><p class=\"e\">event</p><a href=\"%s\" class=\"newsLink\">news</a><a href=\"%s\" class=\"eventLink\">events</a></div></div>", 
				// 		$this->day_num,
				// 		$newsArchive,
				// 		$eventArchive
				// 	);
				// }else if(isset($fetch[$this->day_num]['event'])){
				// 	$this->out .= sprintf(
				// 		"<div class=\"td day_numbers\"><div class=\"event_exists\"><a href=\"%s\">%s</a></div></div>", 
				// 		$eventArchive,
				// 		$this->day_num						
				// 	);
				// }else if(isset($fetch[$this->day_num]['news'])){
				// 	$this->out .= sprintf(
				// 		"<div class=\"td day_numbers\"><div class=\"news_exists\"><a href=\"%s\">%s</a></div></div>", 
				// 		$newsArchive, 
				// 		$this->day_num
				// 	);
				// }
				$this->out .= sprintf(
					"<div class=\"td day_numbers\"><div class=\"event_exists\"><a href=\"%s\">%s</a></div></div>", 
					$bothArchive, 
					$this->day_num
				);
			}else{
				$this->out .= sprintf(
					"<div class='td day_numbers'><div>%s</div></div>", 
					$this->day_num
				); 
			}
			

			$this->day_num++;
			$this->day_count++;
			
			if($this->day_count>7)
			{
				$this->out .= "</div><div class=\"tr\">";
				$this->day_count = 1;
			}
		}

		while($this->day_count > 1 && $this->day_count <= 7)
		{
			$this->out .= "<div class=\"td\"></div>";
			$this->day_count++;
		}



		$this->out .= "</div>\n";

		return $this->out;
	}
}