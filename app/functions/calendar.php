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

	public function __construct()
	{
		$this->geomonth = array("January"=>"იანვარი", "February"=>"თებერვალი", "March"=>"მარტი", "April"=>"აპრილი", "May"=>"მაისი", "June"=>"ივნისი", "July"=>"ივლისი", "August"=>"აგვისტო", "September"=>"სექტემბერი", "October"=>"ოქტომბერი", "November"=>"ნოემბერი", "December"=>"დეკემბერი");
		$this->rusmonth = array("January"=>"январь", "February"=>"февраль", "March"=>"март", "April"=>"апрель", "May"=>"май", "June"=>"июнь", "July"=>"июль", "August"=>"август", "September"=>"сентябрь", "October"=>"октябрь", "November"=>"ноябрь", "December"=>"декабрь");

		$this->date = time();
		$this->day = date('d',$this->date); 
		$this->month = date('m',$this->date);
		$this->year = date('Y',$this->date);

		$this->Cday = date('d',$this->date);
		$this->Cmonth = date('m',$this->date);
		$this->Cyear = date('Y',$this->date);
	}

	public function index($lang)
	{
		if(isset($_GET["month"])){ $this->month=$_GET["month"]; }
		if(isset($_GET["year"])){ $this->year=$_GET["year"]; }

		$this->first_day = mktime(0, 0, 0, $this->month, 1, $this->year);
		$this->title = date('F',$this->first_day);
		if($lang=="ge")
		{
			$this->title = $this->geomonth[$this->title]; 
		}
		else if($lang=="ru")
		{
			$this->title = $this->rusmonth[$this->title]; 	
		}
		else
		{ 
			// english the same
		}

		$this->day_of_week = date('D', $this->first_day);

		switch($this->day_of_week)
		{
			case "Sun": $this->blank=0; break;
			case "Mon": $this->blank=1; break;
			case "Tue": $this->blank=2; break;
			case "Wed": $this->blank=3; break;
			case "Thu": $this->blank=4; break;
			case "Fri": $this->blank=5; break;
			case "Sat": $this->blank=6; break;
			default: exit;
		}

		$this->days_in_month = cal_days_in_month(0, $this->month, $this->year);

		$this->out = "<table border=\"1\" cellspacing=\"10\" cellpadding=\"10\">\n";

		$this->out .= "<tr>\n";
		$this->out .= "<td colspan=\"7\" id=\"title-calendar\">\n";

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

		/* onclick="hashx('?month=<?=$yy_month?>&amp;year=<?=$yy_year?>&amp;lang=<?=$_GET[lang]?>')" */
		$this->out .= "<a href=\"javascript:void(0)\">&nbsp;</a>";
		$this->out .= $this->title." ".$this->year;		
		/* onclick="hashx('?month=<?=$xx_month?>&amp;year=<?=$xx_year?>&amp;lang=<?=$_GET[lang]?>')" */
		$this->out .= "<a href=\"javascript:void(0)\">&nbsp;</a>";

		$this->out .= "</td>\n";
		$this->out .= "</tr>\n";


		$this->out .= "<tr>\n";
		$this->out .= "<td colspan=\"7\">&nbsp;";
		$this->out .= "</td>\n";
		$this->out .= "</tr>\n";


		$this->day_count = 1;

		/* Dayes  */ 
		$this->out .= "<tr>";
		while($this->blank > 0)
		{
			$this->out .= "<td></td>";
			$this->blank = $this->blank-1;
			$this->day_count++;
		}
		
		$this->day_num = 1;

		while($this->day_num <= $this->days_in_month)
		{
			$this->d = $this->year . "/" . $this->month . "/" . $this->day_num;
			$this->to_time = strtotime($this->d);
			if($this->day_num == $this->day && $this->month == $this->Cmonth && $this->year == $this->Cyear)
			{
				// today
				$this->out .= "<td><div class=\"currentDay\">".$this->day_num."</div></td>";
			}
			else
			{
				if($this->day_num==5 || $this->day_num==25){
					$this->out .= "<td class='day_numbers'><div class=\"event_exists tooltipped\" data-position=\"bottom\" data-delay=\"50\" data-tooltip=\"Meeting With International Donor organ\"><a href=\"http://dcfta.404.ge/public/markup/events.php\">".$this->day_num."</a></div></td>"; 	
				}else{
					$this->out .= "<td class='day_numbers'><div>".$this->day_num."</div></td>"; 
				}
			}
			$this->day_num++;
			$this->day_count++;
			
			if($this->day_count>7)
			{
				$this->out .= "</tr><tr>";
				$this->day_count = 1;
			}
		}

		while($this->day_count > 1 && $this->day_count <= 7)
		{
			$this->out .= "<td></td>";
			$this->day_count++;
		}
		
		// $this->out .= "<tr>\n";
		// $this->out .= "<td colspan=\"7\">&nbsp;";
		// $this->out .= "</td>\n";
		// $this->out .= "</tr>\n";


		$this->out .= "</table>\n";

		return $this->out;
	}
}