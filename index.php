<?php
	session_start();
	$_SESSION['temp']=false;
	error_reporting(0);
?>
<?php
	$conn=mysql_connect('127.0.0.1','root','password') or die("connection failed");
	$name=mysql_real_escape_string($_POST['name'],$conn);	
	$school=mysql_real_escape_string($_POST['school'],$conn);
	$class=mysql_real_escape_string($_POST['standard'],$conn);
	$email=mysql_real_escape_string($_POST['e_id'],$conn);
	$number=mysql_real_escape_string($_POST['number'],$conn);
	if(isset($_POST['submit'])){
		if((!$name) or (!$school) or (!$class) or (!$email) or (!$number)){
			$hasError=true;
		}
		else if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
			$emailError=true;
		}
		else if(!preg_match("/^[0-9]{10}$/", $number)){
			$numberError=true;
		}
		else{
			
			$db=@mysql_select_db('quiz',$conn)or die("could not select database");
			$sql="select * from user where email_id='{$email}'";
			$result=mysql_query($sql,$conn)or die('query execution failed'.mysql_error());
			$num=mysql_num_rows($result);
			if($num>0){
				$dup=true;
			}
			else{
				$db=@mysql_select_db('quiz',$conn)or die("could not select database");
				$sql="insert into user(`name`,`school_name`,`class`,`email_id`,`contact_no`)VALUES ('{$name}','{$school}','{$class}','{$email}','{$number}')";
				$result=mysql_query($sql,$conn)or die('query execution failed'.mysql_error());
				$_SESSION['temp']=true;
				$_SESSION['em']=$email;
				header('Location: http:instruction.php');
				exit;
			}
		}
	}
?>
<!DOCTYPE html>
	<head>
			<title>quiz1</title>
			<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
			<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css" />
			<link rel="stylesheet" type="text/css" href="css/bootstrap-responsive.min.css" />
			<link rel="stylesheet" type="text/css" href="css/bootstrap-theme.min.css" />
	</head>
	<body style="background-color:gray;">
		<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
   <div class="navbar-header">
      <a class="navbar-brand"  href="#">
      <img style="max-width:65px; margin-top: -15px; margin-left: -15px"
             src="img/unnamed.jpg"> </a></div>
    <div>
      <p class="navbar-text"><font size=5><b>Gurgaon Police Online Quiz Module</b> </font></p>
   </div>
</nav><br><br><br><br>
		<div class="container ">
			<div class="row">
				<div class="col-md-6 col-md-push-3">
					<div class="jumbotron">
						<form role="form" action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post" id="contactform">
							<fieldset>
								<legend class="center-block"><b>Student Registration Form</b></legend>
								<?php if(isset($hasError)) { //If errors are found ?>
              						<p class="alert alert-danger"><em><small>Please check if you've filled all the fields with valid information and try again. Thank you.</small></em></p>
            					<?php unset($hasError);}?>
            					<?php if(isset($emailError)) { //If errors are found ?>
              						<p class="alert alert-danger"><em><small>Please Enter a valid email. Thank you.</small></em></p>
            					<?php unset($emailError);}?>
            					<?php if(isset($numberError)) { //If errors are found ?>
              						<p class="alert alert-danger"><em><small>Please Enter a phone number. Thank you.</small></em></p>
            					<?php unset($numberError);}?>
            					<?php if(isset($dup)) { //If errors are found ?>
              						<p class="alert alert-warning"><em><small>Given E-mail is already registered</small></em></p>
            					<?php unset($dup);} ?>	
								<div class="form-group">
								<label>Your name<span class="help-required">*</span></label>
								<input class="form-control maxlength="20" input-sm" type="text" name="name"  placeholder="Full Name" id="name"></div>
								<div class="form-group">
								<label>Select School<span class="help-required">*</span></label>
								<select name="school" size="1" class="form-control input-sm" id="school"><!-- names of all the schools -->
									<option value=''>Select School</option>
									<?php
										$db=@mysql_select_db('quiz',$conn)or die("could not select database");
										$sql="select * from schools";
										$result=mysql_query($sql,$conn)or die('query execution failed'.mysql_error());
										while($row=mysql_fetch_array($result)){
											echo "<option value='{$row['s_name']}'>{$row['s_name']}</option>";
										}
									?>
								</select></div>
								<div class="form-group">
								<label>Class<span class="help-required">*</span></label>
								<select name="standard" size="1" class="form-control input-sm" id="standard"><!-- names of all the schools -->
									<option value="">Select Class</option>
									<option value="6">6th</option>
									<option value="7">7th</option>
									<option value="8">8th</option>
									<option value="9">9th</option>
									<option value="10">10th</option>
									<option value="11">11th</option>
									<option value="12">12th</option>
								</select></div>
								<div class="form-group">
								<label>E-mail ID<span class="help-required">*</span></label>
								<input type="text" maxlength="25" name="e_id" class="form-control input-sm" placeholder="Email ID" id="email"></div>
								<div class="form-group">
								<label>Contact No<span class="help-required">*</span></label>
								<input type="text" maxlength="10" name="number" class="form-control input-sm" placeholder="Contact Number" id="contactnumber"></div>
								<input type="submit" name="submit" value="Submit" class="btn btn-info btn-medium pull-right">
							</fieldset>
						</form>
					</div>
				</div>
			</div><!-- end row--> 
		</div><!--end container-->
			<script src="js/jquery-1.9.1.min.js"></script>
			<script src="js/bootstrap.min.js"></script>
			<script src="http://ajax.microsoft.com/ajax/jquery.validate/1.7/jquery.validate.pack.js" type="text/javascript"></script>
			<script src="js/custom.js"></script>
	</body>
</html>

