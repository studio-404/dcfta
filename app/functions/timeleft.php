<?php 
namespace functions;
class timeleft
{
	public static function index($todate)
	{
		$diff = $todate - time();
		$days = floor($diff/(60*60*24));
		$hours = round(($diff-$days*60*60*24)/(60*60));
		
		$out = sprintf(
			"%s days %s hours remain",
			$days, 
			$hours
		);
		return $out;
	}
}