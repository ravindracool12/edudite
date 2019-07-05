<?
function validate_form()
{
	return ' onsubmit="return validateForm(this,0,0,0,1,8);" ';
}

function protect_admin_page() {
	$cur_page = basename($_SERVER['PHP_SELF']);
	//echo "<br>cur_page: $cur_page";
	if($cur_page != 'login.php') {
		if ($_SESSION['sess_user_id']=='') {
			header('Location: login.php');
			exit;
		}
	}
}


function readmyfile($path)
{
	$text='';
	$fp = @fopen($path,"r");
	while (!@feof($fp))
	{
	$buffer = @fgets($fp, 4096);
	$text.= $buffer;
	}
	@fclose($fp);
	return $text;
}

function status_dropdown($name, $sel_value)
{
	$arr = array( "Active" => 'Active', 'Inactive' => 'Inactive');
	return array_dropdown($arr, $sel_value, $name);
}

function yes_no_dropdown($name, $sel_value)
{
	$arr = array( "Yes" => 'Yes', 'No' => 'No');
	return array_dropdown($arr, $sel_value, $name);
}

function permission_admin()
{ 
	$script_name=basename($_SERVER['PHP_SELF']);
	$adminid = $_SESSION['sess_admin_login_id'];
	
	$sql_admin="select * from abs_admin where admin_id='$adminid'";
	
	$rs_admin=db_query($sql_admin);
	$arr_admin=mysql_fetch_array($rs_admin);
    $admin_id=$arr_admin["admin_id"];
 	
	$sql_per="select * from abs_permission where permission_link='$script_name'";
	$rs_per=db_query($sql_per);
	$arr_per=mysql_fetch_array($rs_per);
	$per_id=$arr_per["permission_id"];
  
	$sql_check="select * from abs_subadmins where ad_admin_id ='$admin_id' and ad_admin_permission_id ='$per_id'";
	
	$rs_check=db_query($sql_check);
	$num_check=mysql_num_rows($rs_check);
 	$arr_check=mysql_fetch_array($rs_check);
 	
	$sql_sub="select * from abs_subpermission where subpermission_link='$script_name'";	
	
	$rs_sub=db_query($sql_sub);
	$num_sub=mysql_num_rows($rs_sub);
	$arr_sub=mysql_fetch_array($rs_sub);
 	if($num_check==0)
	{ 
	 	$sub_permission_id=$arr_sub["permission_id"];	
 		$sql_check="select * from abs_subadmins where ad_admin_id='$admin_id' and ad_admin_permission_id='$sub_permission_id'";		
		$rs_check=db_query($sql_check);
		$num_check=mysql_num_rows($rs_check);
		if($num_check==0)
		{
			header("location: admin_list.php");
			exit;
		}
	}
}


function sendMail($email_to,$emailto_name,$email_subject,$email_body,$email_from,$email_from_name,$reply_to,$html=true,$attach_path='')
{
	require_once "class.phpmailer.php";
	$mail = new PHPMailer();
	$mail->IsMail(); // send via PHP mail function]
	$mail->From     = $email_from;
	$mail->FromName = $email_from_name;
	$mail->AddAddress($email_to,$emailto_name);
	$mail->AddAttachment($attach_path);
	$mail->AddReplyTo($reply_to,SITE_NAME);
	//$mail->WordWrap = 50;                              // set word wrap
	$mail->IsHTML($html);                               // send as HTML
	$mail->Subject  =  $email_subject;
	$mail->Body     =  $email_body;
	if(!$mail->Send())
	{
		return false;
	}
	else
	{
		return true; 
	}
}

function sort_arrow_ar($column)
{
	//return '<A HREF="' . $_SERVER['PHP_SELF'] .	get_qry_str(array('order_by', 'order_by2'),	array($column, 'asc')) . '"><img src="'.SITE_WS_PATH.'/images/up_arrow.gif" border="0"></a>	<a href="'	. $_SERVER['PHP_SELF'] . get_qry_str(array('order_by', 'order_by2'), array($column,	'desc')) . '"><img src="'.SITE_WS_PATH.'/images/down_arrow.gif" border="0"></a>';
	return '<A HREF="' . $_SERVER['PHP_SELF'] .	get_qry_str(array('order_by', 'order_by2'),	array($column, 'asc')) . '"><img src="images/arrow1.gif" border="0"></a>	<a href="'	. $_SERVER['PHP_SELF'] . get_qry_str(array('order_by', 'order_by2'), array($column,	'desc')) . '"><img src="images/arrow2.gif" border="0"></a>';
}
?>