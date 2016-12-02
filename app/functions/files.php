<?php
namespace functions; 
class files
{
	public static function get_size($file)
	{
		try{
			$headers = get_headers($file, 1);
			return $headers['Content-Length'];
		}catch(Exception $e){
			return 0;
		}
	}
}