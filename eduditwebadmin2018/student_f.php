<? require_once('../includes/arvind.inc.php');
if(is_post_back()) {
	if($_FILES['student_photo']['name']!='') {
		// $file_name_wo_ext = substr($_FILES['event_image']['name'], 0, strpos($_FILES['event_image']['name'], '.'));
		$student_photo_name = md5(uniqid(rand(), true)).'.'.file_ext($_FILES['student_photo']['name']);
		copy($_FILES['student_photo']['tmp_name'], UP_FILES_FS_PATH.'/'.$student_photo_name);
		$sql_edit_part .= ", student_photo = '$student_photo_name' ";
	} else if($_POST['student_photo_del']!='') {
		$sql_edit_part .= ", student_photo = '' ";
	}
$day=$_POST['day'];
$month=$_POST['month'];
$year=$_POST['year'];
$student_dob="$year-$month-$day";
if($student_id!='') {
	$sql = "update edu_student set student_f_name = '$student_f_name', student_m_name = '$student_m_name', student_l_name = '$student_l_name', student_father = '$student_father', student_dob = '$student_dob', student_gender = '$student_gender', student_phone = '$student_phone', student_photo = '$student_photo', student_passport = '$student_passport', student_qualification = '$student_qualification', student_date = now(), student_status = 'Active' $sql_edit_part where student_id = $student_id";
		db_query($sql);
	} else{
		$sql = "insert into edu_student set student_f_name = '$student_f_name', student_m_name = '$student_m_name', student_l_name = '$student_l_name', student_father = '$student_father', student_dob = '$student_dob', student_gender = '$student_gender', student_phone = '$student_phone', student_photo = '$student_photo', student_passport = '$student_passport', student_qualification = '$student_qualification', student_date = now(), student_status = 'Active'";
		db_query($sql);
	}
	header("Location:student_list.php");
	exit;
}

$student_id = $_REQUEST['student_id'];
if($student_id!='') {
	$sql = "select * from edu_student where student_id = '$student_id'";
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
						<li><a href="student_list.php"><strong style="color:#F00;">Return to student List</strong></a></li>
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
													<label class="control-label mb-10">First Name :</label>
													<input name="student_f_name" type="text" id="student_f_name" value="<?=$student_f_name?>"  class="form-control">
												</div>
												<div class="form-group">
													<label class="control-label mb-10">Middle Name :</label>
													<input name="student_m_name" type="text" id="student_m_name" value="<?=$student_m_name?>"  class="form-control">
												</div>
												<div class="form-group">
													<label class="control-label mb-10">Last Name :</label>
													<input name="student_l_name" type="text" id="student_l_name" value="<?=$student_l_name?>"  class="form-control">
												</div>
												<div class="form-group">
													<label class="control-label mb-10">Father's Name :</label>
													<input name="student_father" type="text" id="student_father" value="<?=$student_father?>"  class="form-control">
												</div>
												<div class="form-group">
													<label class="control-label mb-10">DOB :</label>
													<select name="day">
														<option value="">Day</option>
													   <?
																		for($i=1;$i<=31;$i++){
																		?>
																		<option value="<?=$i?>"<? if($user_dob[2] == $i){?> selected="selected"<? }?>><?=$i?></option>
																		<?
																		}
																		?>
														</select>
														<select name="month">
														<option value="">Month</option>
														  <?
																		foreach($ARR_MONTHS as $key=>$value){
																		?>
																		<option value="<?=$key?>" <? if($user_dob[1] == $key){?> selected="selected"<? }?>><?=$value?></option>
																		<?
																		}
																		?>
														</select>
														<select name="year">
														  <option value="">Year</option>
														 <?
																		for($k=1940;$k<=2010;$k++){
																		?>
																		<option value="<?=$k?>" <? if($user_dob[0] == $k){?> selected="selected"<? }?>><?=$k?></option>
																		<?
																		}
																		?>
														 </select>
												</div>
												<div class="form-group">
													<label class="control-label mb-10">Gender :</label>
													<input name="student_gender" type="radio" value="Male" <?php if($student_gender == Male){echo "checked='checked'";}?>/>Male&nbsp;
													<input name="student_gender" type="radio" value="Female" <?php if($student_gender == Female){echo "checked='checked'";}?>/>Female
												</div>
												<div class="form-group">
													<label class="control-label mb-10">Phone :</label>
													<input name="student_father" type="text" id="student_father" value="<?=$student_father?>"  class="form-control">
												</div>
												<? if($student_photo!='') { ?>
												<div class="form-group">
													<label class="control-label mb-10">Photo :</label>
													<img src="<?=show_thumb(UP_FILES_WS_PATH.'/'.$student_photo,100,100, width_height)?>"/><br>Delete<input type="checkbox" name="student_photo_del" value="1">
												</div>
												<? } ?>
												<div class="form-group">
													<label class="control-label mb-10">Photo :</label>
													<input type="file" name="student_photo"><br /><strong style="color:#F00;">&nbsp;** Upload Image Size 800x800 pixel.</strong>
												</div>
												<div class="form-group">
													<label class="control-label mb-10">Passport Number :</label>
													<input name="student_father" type="text" id="student_father" value="<?=$student_father?>"  class="form-control">
												</div>
												<div class="form-group">
													<label class="control-label mb-10">Qualification :</label>
													<input name="student_father" type="text" id="student_father" value="<?=$student_father?>"  class="form-control">
												</div>												
												<div class="form-group mb-0" align="center">
                                                		<input type="hidden" name="student_id" value="<?=$student_id?>">
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