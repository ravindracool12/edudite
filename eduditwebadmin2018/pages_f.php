<? require_once('../includes/arvind.inc.php');
if(is_post_back()) {
if($page_id!='') {
	$sql = "update edu_pages set page_title = '$page_title', page_desc = '$page_desc', page_date = now(), page_status = 'Active' $sql_edit_part where page_id = $page_id";
		db_query($sql);
	} else{
		$sql = "insert into edu_pages set page_title = '$page_title', page_desc = '$page_desc', page_date = now(), page_status = 'Active'";
		db_query($sql);
	}
	header("Location:pages_list.php");
	exit;
}

$page_id = $_REQUEST['page_id'];
if($page_id!='') {
	echo $sql = "select * from edu_pages where page_id = '$page_id'";
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
					  <h5 class="txt-dark">Pages</h5>
					</div>
					<!-- Breadcrumb -->
					<div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
					  <ol class="breadcrumb">
						<li><a href="pages_list.php"><strong style="color:#F00;">Return to Page List</strong></a></li>
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
													<input name="page_title" type="text" id="page_title" value="<?=$page_title?>"  class="form-control">
												</div>
												<div class="form-group">
													<label class="control-label mb-10 text-left">Description :</label>
													<textarea name="page_desc" class="form-control" rows="5"><?=$page_desc?></textarea>
												</div>
												<div class="form-group mb-0" align="center">
                                                		<input type="hidden" name="page_id" value="<?=$page_id?>">
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