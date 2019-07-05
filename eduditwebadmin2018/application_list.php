u<? require_once("../includes/arvind.inc.php");
if(is_post_back()) {
	$arr_application_ids = $_REQUEST['arr_application_ids'];
	if(is_array($arr_pages_ids)) {
		$str_application_ids = implode(',', $arr_application_ids);
		
		if(isset($_REQUEST['Delete']) || isset($_REQUEST['Delete_x']) ) {
			$sql = "delete from edu_application where application_id in ($str_application_ids)";
			db_query($sql);
		} else if(isset($_REQUEST['Applied']) || isset($_REQUEST['Applied_x']) ) {
			$sql = "update edu_application set application_status = 'Applied' where application_id in ($str_application_ids)";
			db_query($sql);
		} else if(isset($_REQUEST['Accepted']) || isset($_REQUEST['Accepted_x']) ) {
			$sql = "update edu_application set application_status = 'Accepted' where application_id in ($str_application_ids)";
			db_query($sql);
		} else if(isset($_REQUEST['Rejected']) || isset($_REQUEST['Rejected_x']) ) {
			$sql = "update edu_application set application_status = 'Rejected' where application_id in ($str_application_ids)";
			db_query($sql);
		} else if(isset($_REQUEST['Offer-Letter-Released']) || isset($_REQUEST['Offer-Letter-Released_x']) ) {
			$sql = "update edu_application set application_status = 'Offer Letter Released' where application_id in ($str_application_ids)";
			db_query($sql);
		} else if(isset($_REQUEST['Visa-Issued']) || isset($_REQUEST['Visa-Issued_x']) ) {
			$sql = "update edu_application set application_status = 'Visa Issued' where application_id in ($str_application_ids)";
			db_query($sql);
		} else if(isset($_REQUEST['Admission-Completed']) || isset($_REQUEST['Admission-Completed_x']) ) {
			$sql = "update edu_application set application_status = 'Admission Completed' where application_id in ($str_application_ids)";
			db_query($sql);
		}
	}
	header("Location: ".$_SERVER['HTTP_REFERER']);
	exit;
}

$start = intval($start);
$pagesize = intval($pagesize)==0?$pagesize=DEF_PAGE_SIZE:$pagesize;
$columns = "select * ";
$sql = " from edu_application where 1 ";
$sql = apply_filter($sql, $application_status, $application_status_filter,'application_status');

$order_by == '' ? $order_by = 'application_id' : true;
$order_by2 == '' ? $order_by2 = 'desc' : true;
$sql_count = "select count(*) ".$sql; 

$sql .= "order by $order_by $order_by2 ";

$sql .= "limit $start, $pagesize ";
$sql = $columns.$sql;
$result = db_query($sql);
$reccnt = db_scalar($sql_count);
?>
<!DOCTYPE html>
<html lang="en">
<?php require_once('includes/head.php');?>
<body>
  <div class="wrapper  theme-1-active pimary-color-green">
		
		<?php require_once('includes/topmenu.php');?>

		<!-- Left Sidebar Menu -->
		<?php require_once('includes/leftmenu.php'); ?>		
			
		<!-- Main Content -->
		<div class="page-wrapper">
			<div class="container-fluid">
				<!-- Title -->
				<div class="row heading-bg">
					<div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
					  <h5 class="txt-dark">application List</h5>
					</div>
					<!-- Breadcrumb -->
					<!-- <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
					  <ol class="breadcrumb">
						<li><a href="application_f.php"><strong style="color:#F00;">Add New application</strong></a></li>
					  </ol>
					</div>-->
					<!-- /Breadcrumb -->
				</div>
				<!-- /Title -->
				  <? if(mysql_num_rows($result)==0){?>
                  <div class="msg">Sorry, no records found.</div>
                  <? } else{ ?>
                  <div align="right"> Showing Records:
                    <?= $start+1?>
                    to
                    <?=($reccnt<$start+$pagesize)?($reccnt-$start):($start+$pagesize)?>
                    of
                    <?= $reccnt?>
                  </div>
                  <div>Records Per Page:
                    <?=pagesize_dropdown('pagesize', $pagesize);?>
                  </div>
                  <form method="post" name="form1" id="form1" onsubmit="confirm_submit(this)">
                    <!-- Row -->
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="panel panel-default card-view">
                                <div class="panel-wrapper collapse in">
								<div class="panel-body">
									<div class="table-wrap">
										<div class="table-responsive">
											<table id="datable_1" class="table table-hover display  pb-30" >
                                                    <thead>
                                                        <tr>
                                                            <th nowrap="nowrap">Applicant</th>
                                                            <th nowrap="nowrap">Collage</th>
                                                            <th nowrap="nowrap">Course</th>
                                                            <th nowrap="nowrap">Date</th>
                                                            <th nowrap="nowrap">Status</th>
                                                            <th nowrap="nowrap">&nbsp;</th>
                                                            <th nowrap="nowrap"><input name="check_all" type="checkbox" id="check_all" value="1" onclick="checkall(this.form)" /></th>
                                                        </tr>
                                                    </thead>
                                                     <?
														while ($line_raw = mysql_fetch_array($result)) {
														$line = ms_display_value($line_raw);
														@extract($line);
														$css = ($css=='trOdd')?'trEven':'trOdd';
													  ?>
                                                    <tbody>
                                                        <tr>
                                                              <td nowrap="nowrap"><?=db_scalar("select student_f_name from edu_student where student_user_id = 'application_user_id'");?></td>
                                                              <td nowrap="nowrap"><?=db_scalar("select collage_name from edu_collage where collage_id = 'application_collage_id'");?></td>
                                                               <td nowrap="nowrap"><?=db_scalar("select course_title from edu_coourses where course_id = 'application_course_id'");?></td>
                                                              <td nowrap="nowrap"><?=$application_status?></td>
                                                              <td nowrap="nowrap"><a href="application_f.php?application_id=<?=$application_id?>"><img src="../img/edit.png" alt="Edit" width="16" height="16" border="0" /></a></td>
                                                              <td nowrap="nowrap"><input name="arr_application_ids[]" type="checkbox" id="arr_application_ids[]" value="<?=$application_id?>" /></td>
                                                        </tr>
                                                        
                                                    </tbody>
                                                    <? } ?>
                                                </table>
                                            </div>
                                            <div class="form-group mb-0" align="right">
													<input type="submit" name="Applied" value="Applied"  class="btn btn-success btn-anim"/>&nbsp;<input type="submit" name="Accepted" value="Accepted"  class="btn btn-success btn-anim"/>&nbsp;<input type="submit" name="Rejected" value="Rejected"  class="btn btn-success btn-anim"/>&nbsp;<input type="submit" name="Offer-Letter-Released" value="Offer-Letter-Released"  class="btn btn-success btn-anim"/>&nbsp;<input type="submit" name="Visa-Issued" value="Visa-Issued"  class="btn btn-success btn-anim"/>&nbsp;<input type="submit" name="Admission-Completed" value="Admission-Completed"  class="btn btn-success btn-anim"/><!--<input type="submit" name="Delete" value="Delete"  class="btn btn-success btn-anim"/>-->
												</div>
                                        </div>
                                    </div>
                                </div>
                            </div>	
                        </div>
                    </div>
                    <!-- /Row -->
                    </form>
                    <? } ?>
					<? include("paging.inc.php");?>
			</div>			
		</div>
		<!-- /Main Content -->
<?php require_once('includes/footer.php'); ?>	
</body>
</html>