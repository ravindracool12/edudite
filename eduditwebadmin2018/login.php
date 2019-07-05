<? require_once("../includes/arvind.inc.php");
if(is_post_back()) {
	$email = $_POST['login_id'];
	$sql="select * from edu_user where user_email ='$email'";
	$result = db_query($sql);
	// die;
	if ($line_raw = mysql_fetch_assoc($result)) {
		@extract($line_raw);
		//echo $user_pwd;
		//echo $user_type;
		if ($user_pwd==$_POST['user_pwd']) {
			$_SESSION['sess_user_id'] = $user_id;
			$_SESSION['sess_user_type'] = $user_type;
			if($return_page=='') {
				header("location: index.php");
				exit;
			} else {
				header("location: ".$return_page);
				exit;
			}
		} else {
			$arr_error_msgs[] = "Invalid Login ID or Password";
		}
	} else {
		$arr_error_msgs[] = "Invalid Login ID or Password";
	}
}
?>
<!DOCTYPE html>
<html lang="en">
<?php require_once('includes/head.php');?>
<body>
			<!-- Main Content -->
			<div class="page-wrapper pa-0 ma-0 auth-page">
				<div class="container-fluid">
					<!-- Row -->
					<div class="table-struct full-width full-height">
						<div class="table-cell vertical-align-middle auth-form-wrap">
							<div class="auth-form  ml-auto mr-auto no-float">
								<div class="row">
									<div class="col-sm-12 col-xs-12">
										<div class="mb-30">
											<h3 class="text-center txt-dark mb-10">Login to Edudite Administration</h3>
											<h6 align="center" style="color:#F00;"><? include("error_msgs.inc.php");?></h6>
                                            <!--<h6 class="text-center nonecase-font txt-grey">Enter your details below</h6>-->
										</div>	
										<div class="form-wrap">
											<form action="" method="post">
												<div class="form-group">
													<label class="control-label mb-10" for="exampleInputEmail_2">Email </label>
													<input name="login_id" type="text" class="form-control" value="<?=$login_id?>" required id="exampleInputuser_2" placeholder="Email"/>                                                    
												</div>
												<div class="form-group">
													<label class="pull-left control-label mb-10" for="exampleInputpwd_2">Password</label>
													
													<a class="capitalize-font txt-primary block mb-10 pull-right font-12" href="forgot-password.php">forgot password ?</a>
                                                    <div class="clearfix"></div>
													<input name="user_pwd" type="password" class="form-control" value="<?=$user_pwd?>" required id="exampleInputpwd_2" placeholder="Password">
												</div>
												
												<!--<div class="form-group">
													<div class="checkbox checkbox-primary pr-10 pull-left">
														<input id="checkbox_2" required type="checkbox">
														<label for="checkbox_2"> Keep me logged in</label>
													</div>
													<div class="clearfix"></div>
												</div>-->
												<div class="form-group text-center">
													<button type="submit" class="btn btn-success  btn-rounded">sign in</button>
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
