<?php 
	session_start();
	$_SESSION['temp1']=false;
	error_reporting(0);
	if($_SESSION['temp']===false){
		header('Location: http:index.php');
		exit;
	}
	else{
		$_SESSION['score']=0;
		$_SESSION['num']=0;
		$_SESSION['ind']="a";
		$_SESSION['num']=$_SESSION['num']-1;
		$conn=mysql_connect('127.0.0.1','root','password') or die("connection failed");
		
		$db=@mysql_select_db('quiz',$conn)or die("could not select database");
		
		$result=mysql_query("select * from quiz_spec") or die("first query error");
		$row = mysql_fetch_assoc($result);
		$_SESSION['total']=$row['total_num'];
		$_SESSION['time']=$row['time'];
		$sql = "select * from questions ORDER BY RAND() LIMIT 40";
		$rows=mysql_query($sql,$conn)or die("query cannot be completed");
		$ind="a";
		while($row=mysql_fetch_assoc($rows)){
			$_SESSION[$ind]=$row;
			$ind.="a";
		}
		if($_POST['submit']){
			$_SESSION['s_time']=time();
			$_SESSION['e_time']=$_SESSION['s_time']+(60*$_SESSION['time']);
			header("location:start.php");
		}
		
	}
?>

<!DOCTYPE html>
	<head>
			<title>quiz1</title>
			<meta name='viewport' content='width=device-width, initial-scale=1.0'/>
			<link rel='stylesheet' type='text/css' href='css/bootstrap.min.css' />
			<link rel='stylesheet' type='text/css' href='css/bootstrap-responsive.min.css' />
			<link rel='stylesheet' type='text/css' href='css/bootstrap-theme.min.css' />
	</head>
	<body>
		<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
		   <div class="navbar-header">
		      <a class="navbar-brand"  href="#">
		      <img style="max-width:65px; margin-top: -15px; margin-left: -15px" src="img/unnamed.jpg"> </a></div>
		   <div>
		      <p class="navbar-text"><font size=5><b>Gurgaon Police Online Quiz Module</b> </font></p>
		   </div>
		</nav>
		<br><br><br><br>
		<div class='container'>
			<div class='row'>
				<div class="col-md-10 col-md-push-1">
        <div class="jumbotron">
				<legend class='text-info h2'><b>Instructions</b></legend>
				<p class='text-info bg-info h4'>
					<ul>
						<li>Total number of questions is <?php echo $_SESSION['total'];?></li>
						<li>Time available to answer these questions is <?php echo $_SESSION['time']." min";?></li>
						<li>2 Questions will be given at a time</li>
						<li>Do not press 'BACK','REFRESH' button of browser,this can lead to cancellation of your quiz session.</li>
						<li>Answer each question very carefully because you cannot go backward to alter your answers after clicking 'NEXT' button..</li>
					</ul>
				</p>
			</div><form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
				<input type="submit" name="submit" value="Start Quiz" class='btn btn-primary pull-right' ></form>
				</form></div>
		<script src='js/jquery-1.9.1.min.js'></script>
		<script src='js/bootstrap.min.js'></script>
		<script src='js/custom.js'></script>
	</body>
</html>