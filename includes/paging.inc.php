<?
if($reccnt>$pagesize){
	
$num_pages=$reccnt/$pagesize;

$PHP_SELF=$_SERVER['PHP_SELF'];
$qry_str=$_SERVER['argv'][0];

$m=$_GET;
unset($m['start']);
unset($m['act']);
$qry_str=qry_str($m);

//echo "$qry_str : $p<br>";

//$j=abs($num_pages/10)-1;
$j=$start/$pagesize-5;
//echo("<br>$j");
if($j<0) {
	$j=0;
}
$k=$j+10;
if($k>$num_pages)	{
	$k=$num_pages;
}
$j=intval($j);
?>

<?//="reccnt=$reccnt, start=$start, pagesize=$pagesize, num_pages=$num_pages : j=$j : k=$k"?>
<link rel="stylesheet" href="../css_style.css" type="text/css">
<table width="100%"  border="0" cellspacing="0" cellpadding="5">
  <tr class="arial11Orange" > 
    <td width="51%" height="20" align="right" class="grey_txt"><a href="<?=$PHP_SELF?><?=$qry_str?>&start=0" class="main"> 
      </a> <a href="<?=$PHP_SELF?><?=$qry_str?>&start=<?=$start-$pagesize?>" class="form_txt" > 
      <?
		if($start!=0)
		{

?>
      &laquo; Previous 
      
      </a>&nbsp; 
      <?
		}
?>    </td>
    <td width="29%" align="right" height="20" class="maintxt">&nbsp;      <?
			
			for($i=$j;$i<$k;$i++)
			{
				if($i==$j)echo "Page:";
			   if(($pagesize*($i))!=$start)
				  {

	  ?>      <a href="<?=$PHP_SELF?><?=$qry_str?>&start=<?=$pagesize*($i)?>" style="text-decoration:none;" class="main"> 
      <?=$i+1?>
      </a>      <?
				  }
	  else{
	  ?>      <b> 
      <?=$i+1?>
      </b>      <?
	  }
 }?>&nbsp; &nbsp;</td>
    <td width="20%" height="20" align="right" class="tahoma11Blue"> 
      <?
	if($start+$pagesize < $reccnt){
		?>
      &nbsp;&nbsp; <a href="<?=$PHP_SELF?><?=$qry_str?>&start=<?=$start+$pagesize?>" class="form_txt">Next      &raquo;</a>&nbsp; 
    <?
		}
  ?>      </td>
  </tr>

</table>
<?}
?>
