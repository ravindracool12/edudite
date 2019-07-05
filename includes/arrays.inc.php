<?
$ARR_VALID_IMG_EXTS = array('jpg', 'jpeg', 'jpe', 'gif', 'png', 'bmp');

$ARR_WEEK_DAYS = array(
'mon' => 'Monday',
'tue' => 'Tuesday',
'wed' => 'Wednesday',
'thu' => 'Thursday',
'fri' => 'Friday',
'sat' => 'Saturday',
'sun' => 'Sunday'
);

$ARR_MONTHS = Array('01'=>'Jan' , '02'=>'Feb' , '03'=>'Mar' , '04'=>'Apr' , '05'=>'May' , '06'=>'Jun' , '07'=>'Jul' , '08'=>'Aug' , '09'=>'Sep' , '10'=>'Oct' , '11'=>'Nov' , '12'=>'Dec');

if ($handle = opendir(dirname(__FILE__).'/db_arrays')) { 
	while (false !== ($file = readdir($handle))) { 
		if ($file != "." && $file != "..") { 
			include(dirname(__FILE__).'/db_arrays/'.$file);
		} 
	} 
   closedir($handle); 
} 
?>