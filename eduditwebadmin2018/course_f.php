<? require_once('../includes/arvind.inc.php');
if(is_post_back()) {
//$collage_id = $_REQUEST['collage_id'];
if($course_id!='') {
	$sql = "update edu_courses set course_title = '$course_title', course_collage_id = '$collage_id', course_desc = '$course_desc', course_fee = '$course_fee', course_requirement = '$course_requirement', course_date = now(), course_status = 'Active' $sql_edit_part where course_id = $course_id";
		db_query($sql);
	} else{
		$sql = "insert into edu_courses set course_title = '$course_title', course_collage_id = '$collage_id', course_desc = '$course_desc',  course_fee = '$course_fee', course_requirement = '$course_requirement', course_date = now(), course_status = 'Active'";
		db_query($sql);
	}
	header("Location:course_list.php?collage_id=$collage_id");
	exit;
}

$course_id = $_REQUEST['course_id'];
if($course_id!='') {
	$sql = "select * from edu_courses where course_id = '$course_id'";
	$result = db_query($sql);
	if ($line_raw = mysql_fetch_array($result)) {
		$line = ms_form_value($line_raw);
		@extract($line);
	}
}
?>
<!DOCTYPE html>
<html lang="en">
<?php require_once('includes/head.php');?>
<body>
  <div class="wrapper  theme-1-active pimary-color-green">
		
		<?php require_once('includes/topmenu.php') ?>

		<!-- Left Sidebar Menu -->
		<?php require_once('includes/leftmenu.php'); ?>
				
			<!-- Main Content -->
			<div class="page-wrapper">
				<div class="container-fluid">
                <!-- Title -->
				<div class="row heading-bg">
					<div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
					  <h5 class="txt-dark">Courses</h5>
					</div>
					<!-- Breadcrumb -->
					<div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
					  <ol class="breadcrumb">
						<li><a href="course_list.php"><strong style="color:#F00;">Return to Course List</strong></a></li>
					  </ol>
					</div>
					<!-- /Breadcrumb -->
				</div>
				<!-- /Title -->					
					<!-- Row -->
					<div class="row">
						<div class="col-sm-12">
							<div class="panel panel-default card-view">
								<div class="panel-wrapper collapse in">
									<div class="panel-body">
										<div class="form-wrap">
											<form name="form1" method="post" enctype="application/x-www-form-urlencoded" <?= validate_form()?>>
												<div class="form-group">
													<label class="control-label mb-10">Title :</label>
													<input name="course_title" type="text" id="course_title" value="<?=$course_title?>"  class="form-control">
												</div>
												<div class="form-group">
													<label class="control-label mb-10 text-left">Description :</label>
													<textarea class="form-control" rows="5"><?=$course_desc?></textarea>
												</div>
                                                <div class="form-group">
													<label class="control-label mb-10">Fee :</label>
													<input name="course_fee" type="text" id="course_fee" value="<?=$course_fee?>"  class="form-control">
												</div>
                                                <div class="form-group">
													<label class="control-label mb-10 text-left">Requirements :</label>
													<textarea class="form-control" rows="5"><?=$course_requirement?></textarea>
												</div>
												<div class="form-group mb-0" align="center">
                                                		<input type="hidden" name="course_id" value="<?=$course_id?>">
														<button type="submit" class="btn btn-success  btn-rounded">Update</button>
												</div>	
											</form>
										</div>
									</div>
								</div>
							</div>
						</div>						
					</div>	
					<!-- /Row -->				
				</div>				
			</div>
			<!-- /Main Content -->
		</div>
		<?php require_once('includes/footer.php') ?>
	</body>
</html>