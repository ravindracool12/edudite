<? require_once('../includes/arvind.inc.php');
if(is_post_back()) {
if($_FILES['collage_image1']['name']!='') {
		$main_collage_image1 = md5(uniqid(rand(), true)).'.'.file_ext($_FILES['collage_image1']['name']);
		copy($_FILES['collage_image1']['tmp_name'], UP_FILES_FS_PATH.'/'.$main_collage_image1);
		$sql_edit_part .= ", collage_image1 = '$main_collage_image1' ";
	} else if($_POST['collage_image1_del']!='') {
		$sql_edit_part .= ", collage_image1 = '' ";
	}
if($_FILES['collage_image2']['name']!='') {
		$main_collage_image2 = md5(uniqid(rand(), true)).'.'.file_ext($_FILES['collage_image2']['name']);
		copy($_FILES['collage_image2']['tmp_name'], UP_FILES_FS_PATH.'/'.$main_collage_image2);
		$sql_edit_part .= ", collage_image2 = '$main_collage_image2' ";
	} else if($_POST['collage_image2_del']!='') {
		$sql_edit_part .= ", collage_image2 = '' ";
	}
if($_FILES['collage_image3']['name']!='') {
		$main_collage_image3 = md5(uniqid(rand(), true)).'.'.file_ext($_FILES['collage_image3']['name']);
		copy($_FILES['collage_image3']['tmp_name'], UP_FILES_FS_PATH.'/'.$main_collage_image3);
		$sql_edit_part .= ", collage_image3 = '$main_collage_image3' ";
	} else if($_POST['collage_image3_del']!='') {
		$sql_edit_part .= ", collage_image3 = '' ";
	}
if($_FILES['collage_brochure']['name']!='') {
		$main_collage_brochure = $_FILES['collage_brochure']['name'];
		copy($_FILES['collage_brochure']['tmp_name'], UP_FILES_FS_PATH.'/'.$main_collage_brochure);
		$sql_edit_part .= ", collage_brochure = '$main_collage_brochure' ";
	} else if($_POST['collage_brochure_del']!='') {
		$sql_edit_part .= ", collage_brochure = '' ";
	}
if($collage_id!='') {
	$sql = "update edu_collage set collage_name = '$collage_name', collage_overview = '$collage_overview', collage_location_city = '$collage_location_city', collage_location_country = '$collage_location_country', collage_date = now(), collage_status = 'Active' $sql_edit_part where collage_id = $collage_id";
		db_query($sql);
	} else{
		$sql = "insert into edu_collage set collage_name = '$collage_name', collage_overview = '$collage_overview', collage_image1 = '$main_collage_image1', collage_image2 = '$main_collage_image2', collage_image3 = '$main_collage_image3', collage_brochure = '$main_collage_brochure',  collage_location_city = '$collage_location_city', collage_location_country = '$collage_location_country', collage_date = now(), collage_status = 'Active'";
		db_query($sql);
	}
	header("Location:collage_list.php");
	exit;
}

$collage_id = $_REQUEST['collage_id'];
if($collage_id!='') {
	$sql = "select * from edu_collage where collage_id = '$collage_id'";
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
					  <h5 class="txt-dark">collage</h5>
					</div>
					<!-- Breadcrumb -->
					<div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
					  <ol class="breadcrumb">
						<li><a href="collage_list.php"><strong style="color:#F00;">Return to collage List</strong></a></li>
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
											<form name="form1" method="post" enctype="multipart/form-data" <?= validate_form()?>>
												<div class="form-group">
													<label class="control-label mb-10"><strong>Name :</strong></label>
													<input name="collage_name" type="text" id="collage_name" value="<?=$collage_name?>"  class="form-control">
												</div>
												<div class="form-group">
													<label class="control-label mb-10 text-left"><strong>Overview :</strong></label>
													<textarea class="form-control" name="collage_overview" rows="5"><?=$collage_overview?></textarea>
												</div>
                                                <div class="form-group">
													<label class="control-label mb-10"><strong>City :</strong></label>
													<input name="collage_location_city" type="text" id="collage_location_city" value="<?=$collage_location_city?>"  class="form-control">
												</div>
												 <div class="form-group">
													<label class="control-label mb-10"><strong>Country :</strong></label>
													<input name="collage_location_country" type="text" id="collage_location_country" value="<?=$collage_location_country?>"  class="form-control">
												</div>
											<? if($collage_image1!='') { ?>
												<div class="form-group">
													<label class="control-label mb-10"><strong>Collage Image No. 1 :</strong></label>
													<img src="<?=show_thumb(UP_FILES_WS_PATH.'/'.$collage_image1,150,150, width_height)?>"/><br>Delete<input type="checkbox" name="collage_image1_del" value="1">
												</div>
    										<? } ?>
    											<div class="form-group">
													<label class="control-label mb-10"><strong>Collage Image No. 1 :</strong></label>
													<input name="collage_image1" type="file" id="collage_image1" >
												</div>
											<? if($collage_image2!='') { ?>
												<div class="form-group">
													<label class="control-label mb-10"><strong>Collage Image-2 :</strong></label>
													<img src="<?=show_thumb(UP_FILES_WS_PATH.'/'.$collage_image2,150,150, width_height)?>"/><br>Delete<input type="checkbox" name="collage_image2_del" value="1">
												</div>
    										<? } ?>
    											<div class="form-group">
													<label class="control-label mb-10"><strong>Collage Image-2 :</strong></label>
													<input name="collage_image2" type="file" id="collage_image2" >
												</div>
											<? if($collage_image3!='') { ?>
												<div class="form-group">
													<label class="control-label mb-10"><strong>Collage Image-3 :</strong></label>
													<img src="<?=show_thumb(UP_FILES_WS_PATH.'/'.$collage_image3,150,150, width_height)?>"/><br>Delete<input type="checkbox" name="collage_image3_del" value="1">
												</div>
    										<? } ?>
    											<div class="form-group">
													<label class="control-label mb-10"><strong>Collage Image-3 :</strong></label>
													<input name="collage_image3" type="file" id="collage_image3" >
												</div>
												<div class="form-group">
													<label class="control-label mb-10"><strong>Collage Brochure :</strong><br /><strong style="font-size:12px; color:#CC3333; accept="application/pdf">Upload only PDf File.</strong></label>
													<input name="collage_brochure" type="file" id="collage_brochure" >
												</div>
												<div class="form-group mb-0" align="center">
                                                		<input type="hidden" name="collage_id" value="<?=$collage_id?>">
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