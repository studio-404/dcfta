<?php 
namespace functions; 

class string
{
	public function cut($text,$number, $tooltip = false)
	{
		$charset = 'UTF-8';
		$length = $number;
		$string = $text;
		if(mb_strlen($string, $charset) > $length) {
			

			if($tooltip){
				$notWholeString = mb_substr(strip_tags($text), 0, 250, $charset)."...";
				$pre = sprintf(
					"<font style=\"display: inline\" class=\"tooltipped\" data-position=\"top\" data-tooltip=\"%s\">", 
					$notWholeString
				);
				$suff = "</font>";
			}else{
				$pre = "";
				$suff = "";
			}

			$string = $pre.mb_substr($string, 0, $length, $charset) . '...'.$suff;
			
		}
		else
		{
			$string=$text;
		}
		return $string; 
	}

	public static function random($length)
	{
		$bytes = openssl_random_pseudo_bytes($length * 2);
		return substr(str_replace(array('/', '+', '='), '', base64_encode($bytes)), 0, $length);
	}

	public static function escapeJavaScriptText($string){
		return str_replace("\n", '\n', str_replace('"', '\"', addcslashes(str_replace("\r", '', (string)$string), "\0..\37'\\")));
	}
}