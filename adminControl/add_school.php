 <?php
      ob_start();
      session_start();
      if(!isset($_SESSION['user']))
      {
        header("location:index.php");
      }
      else{
        if(isset($_POST['submit']))
        {
        $n=mysql_real_escape_string($_POST['s_name']);
         if(!$n){
            $error=true;
         }
         else{
           $conn=mysql_connect('127.0.0.1','root','password') or die("connection failed");
           $db=@mysql_select_db('quiz',$conn)or die("could not select database");
           $sql="Insert into schools(s_name)values('{$n}')";
           $result=mysql_query($sql,$conn)or die('query execution failed'.mysql_error());
           if($result>0)
           {
              $success=true;
           }
          }
        }
      }
?>


<!DOCTYPE html>
<html>
   <head>
      <title>Online Quiz Admin</title>
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <!-- Bootstrap -->
      <link href="../css/bootstrap.min.css" rel="stylesheet">
      <link href="../css/bootstrap-theme.min.css" rel="stylesheet">


      <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media 
         queries -->
      <!-- WARNING: Respond.js doesn't work if you view the page 
         via file:// -->
      <!--[if lt IE 9]>
         <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/
            html5shiv.js"></script>
         <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/
            respond.min.js"></script>
      <![endif]-->
   </head>
   <body>
   <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
   <div class="navbar-header">
      <a class="navbar-brand"  href="#">
      <img style="max-width:65px; margin-top: -15px; margin-left: -15px"
             src="../img/unnamed.jpg"> </a></div>
    <div>
      <p class="navbar-text"><font size=5><b>Gurgaon Police Online Quiz Module</b> </font></p>
      <p class="navbar-text pull-right"><font size=5><b>Admin Portal</b> </font></p>   
   </div>
</nav>
<br>
<br>
<br>
<div class="btn-group">
<p align="left">
<a href="auth.php" class="btn btn-primary btn-lg active" role="button">
      Add
   </a>
   <a href="edit3.php"  class="btn btn-primary btn-lg " role="button" target="_top">
      Edit
   </a>
   <a href="delete3.php" class="btn btn-primary btn-lg " role="button" target="_top">
      Delete
   </a>
   <a href="qmod.php" class="btn btn-primary btn-lg" role="button">
      Quiz Modification
   </a>
   <a href="#" class="btn btn-primary btn-lg" role="button">
         Add School
    </a>
      <a href="result.php" class="btn btn-primary btn-lg" role="button">
         Result
      </a>
    <a href="logout.php"  class="btn btn-primary btn-lg " role="button" >
      LogOut
   </a>
 </p>
</div>
<br>
<br>
<div class="container ">
  <div class="row">
    <div class="col-md-6 col-md-push-3">
      <div class="jumbotron">
        <fieldset>
          <legend class="center-block"><b>Enter School Name</b></legend>
          <form class="form-horizontal" role="form" method="POST" action="<?php echo $_SERVER['PHP_SELF'];?>" >
           <div class="form-group">
            <div class"col-xs-2">
                 <input type="text" class="form-control span3" name="s_name" placeholder="School Name">
              </div>
           </div>
            <p align="center"><button type="submit" class="btn btn-primary span5" name="submit" >Enter</button> </p>
          </form>
          <?php if(isset($success)) { //If errors are found ?>
            <p class="alert alert-success"><em><small>School Added Successfully.</small></em></p>    
          <?php unset($success);unset($_POST['submit']); } ?>
          <?php if(isset($error)) { //If errors are found ?>
            <p class="alert alert-danger"><em><small>please fill all the fields.</small></em></p>    
          <?php unset($error);unset($_POST['submit']); } ?>
        </fieldset>
      </div>
    </div>
  </div>
</div>
</body>
</html>
