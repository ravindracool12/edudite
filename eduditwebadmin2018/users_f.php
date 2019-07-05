<? require_once('../includes/arvind.inc.php');
if(is_post_back()) {
if($student_id!='') {
	$sql = "update edu_user set user_type = '$user_type', user_email = '$user_email', user_password = '$user_password', user_date = now(), user_status = 'Active' $sql_edit_part where student_id = $student_id";
		db_query($sql);
	} else{
		$sql = "insert into edu_user set user_type = '$user_type', user_email = '$user_email', user_password = '$user_password', user_date = now(), user_status = 'Active'";
		db_query($sql);
	}
	header("Location:users_list.php");
	exit;
}

$student_id = $_REQUEST['user_id'];
if($student_id!='') {
	$sql = "select * from edu_user where user_id = '$user_id'";
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
					  <h5 class="txt-dark">students</h5>
					</div>
					<!-- Breadcrumb -->
					<div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
					  <ol class="breadcrumb">
						<li><a href="users_list.php"><strong style="color:#F00;">Return to User List</strong></a></li>
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
											<form name="form1" method="post" enctype="multipart/form-data"><?= validate_form()?>>
												<div class="form-group">
													<label class="control-label mb-10">Type :</label>
													<input name="user_type" type="text" id="user_type" value="<?=$user_type?>"  class="form-control">
												</div>
												<div class="form-group">
													<label class="control-label mb-10">Email :</label>
													<input name="user_email" type="text" id="user_email" value="<?=$user_email?>"  class="form-control">
												</div>
												<div class="form-group">
													<label class="control-label mb-10">Password :</label>
													<input name="user_password" type="text" id="user_password" value="<?=$user_password?>"  class="form-control">
												</div>								
												<div class="form-group mb-0" align="center">
                                                		<input type="hidden" name="user_id" value="<?=$user_id?>">
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