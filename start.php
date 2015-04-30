<?php
	session_start();
	error_reporting(0);
	if(!isset($_SESSION['temp1'])){
		header('Location: http:index.php');
	}
	else if(!isset($_POST['submit']) and !isset($_SESSION['s_time'])){
		header('Location: http:instruction.php');
	}
	else{	
		if($_SESSION['total']===0 or ($_SESSION['e_time']<=time())){
			$_SESSION['result_page']=true;
			header('Location: http:temp.php');
		}
		else{
				if($_POST['optionsRadios']===$_SESSION['ans1']){
					$_SESSION['score']=$_SESSION['score']+1;
				}
				if($_POST['optionsRadios1']===$_SESSION['ans2']){
					$_SESSION['score']=$_SESSION['score']+1;
				}
			}
			$ind=$_SESSION['ind'];
			$num=1;
			$qes1 = $_SESSION[$ind]['question'];
			$op11 = $_SESSION[$ind]['a'];
			$op12 = $_SESSION[$ind]['b'];
			$op13 = $_SESSION[$ind]['c'];
			$op14 = $_SESSION[$ind]['d'];
			$_SESSION['ans1']= $_SESSION[$ind]['ans'];
			$num=$num+1;
			$_SESSION['ind'].="a";
			$ind=$_SESSION['ind'];
			$qes2 = $_SESSION[$ind]['question'];
			$op21 = $_SESSION[$ind]['a'];
			$op22 = $_SESSION[$ind]['b'];
			$op23 = $_SESSION[$ind]['c'];
			$op24 = $_SESSION[$ind]['d'];
			$_SESSION['ans2'] = $_SESSION[$ind]['ans'];
			$_SESSION['total']=$_SESSION['total']-2;
			$_SESSION['num']=$_SESSION['num']+2;
			$num1=$_SESSION['num']; 
			$num2=$_SESSION['num']+1; 
			$_SESSION['ind'].="a";
		}
			//if($_POST['optionsRadios']===$)
		//	$_SESSION['result']=$rows;
	
?>
<!DOCTYPE html>
	<head>
			<title>quiz1</title>
			<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
			<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css" />
			<link rel="stylesheet" type="text/css" href="css/bootstrap-responsive.min.css" />
			<link rel="stylesheet" type="text/css" href="css/bootstrap-theme.min.css" />
	</head>
	<body class="bg-primary"><div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
			<div class="container">
				<div class="navbar-header">
					<a class="navbar-brand" href="#">Gurgaon Police Online Quiz Module<a>
				</div>
			</div>
		</div>
		<br><br><br><br>
		<div class="container">
			<div class="row">
				<form method="post" action="<?php echo $_SERVER['PHP_SELF'] ?>">
					<div class="col-md-10 col-md-push-1">
        <div class="jumbotron">
				<p class="text-info h2 header" id="q1">QNo:<?php echo $num1; ?> <?php echo $qes1; ?></p>
				<div class="radio"><label><input type="radio" name="optionsRadios" id="optionsRadios1" value="a"><?php echo $op11;?></label></div>
				<div class="radio"><label><input type="radio" name="optionsRadios" id="optionsRadios2" value="b"><?php echo $op12;?></label></div>
				<div class="radio"><label><input type="radio" name="optionsRadios" id="optionsRadios3" value="c"><?php echo $op13;?></label></div>
				<div class="radio"><label><input type="radio" name="optionsRadios" id="optionsRadios4" value="d"><?php echo $op14;?></label>
				</div></div></div>
				<br><br>
				<div class="col-md-10 col-md-push-1">
        <div class="jumbotron">
				<p class="text-info h2">QNo:<?php echo $num2; ?> <?php echo $qes2;?> </p>
				<div class="radio">
				<label><input type="radio" name="optionsRadios1" id="optionsRadios1" value="a"><?php echo $op21;?></label></div>
				<div class="radio"><label><input type="radio" name="optionsRadios1" id="optionsRadios2" value="b"><?php echo $op22;?></label></div>
				<div class="radio"><label><input type="radio" name="optionsRadios1" id="optionsRadios3" value="c"><?php echo $op23;?></label></div>
				<div class="radio"><label><input type="radio" name="optionsRadios1" id="optionsRadios4" value="d"><?php echo $op24;?></label>
				</div></div>
				<input type="submit" value="Next" class="btn btn-lg btn-success span2 pull-right" id="next" name="submit"></div>
				</form></div>
			</div>
		</div>
		<script src="js/jquery-1.9.1.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
		<script src="js/custom.js"></script>
	</body>
<html>
