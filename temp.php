<?php
	session_start();
	if(!isset($_SESSION['result_page'])){
		header('Location: http:index.php');
	}
	$conn=mysql_connect('127.0.0.1','root','password') or die("connection failed");
    $db=@mysql_select_db('quiz',$conn)or die("could not select database");
    $sql="update user set score='{$_SESSION['score']}' where email_id='{$_SESSION['em']}'";
    $result=mysql_query($sql,$conn)or die('query execution failed'.mysql_error());
	echo "Your score is ".$_SESSION['score'];
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
		      <img style="max-width:65px; margin-top: -15px; margin-left: -15px" src="img/unnamed.jpg"> </a></div>
		   <div>
		      <p class="navbar-text"><font size=5><b>Gurgaon Police Online Quiz Module</b> </font></p>
			</div>
		</nav><br><br><br><br>
		<div class="container ">
			<div class="row">
				<div class="col-md-6 col-md-push-3">
					<div class="jumbotron">
						<legend><b>Report Card</b></legend>
						<p class="bg-info">Your Final Score is: <b><?php echo $_SESSION['score']?></b></p>
						<a class="btn btn-primary pull-right" href="index.php">Close</a>
					</div>
				</div>
			</div><!-- end row--> 
		</div><!--end container-->
			<script src="js/jquery-1.9.1.min.js"></script>
			<script src="js/bootstrap.min.js"></script>
	</body>
</html>
<?php
	unset($_SESSION['temp1']);
	unset($_SESSION['temp']);
	unset($_SESSION['user']);
	unset($_SESSION['total']);
	unset($_SESSION['score']);
?>