<?php
session_start();
if(isset($_POST['submit']))
{
   $u=mysql_real_escape_string($_POST['username']);
   $p=mysql_real_escape_string($_POST['password']);
   
   if(!$u or !$p){
      $empty=true;
   }
   else{
       $p=md5($p);
       $conn=mysql_connect('127.0.0.1','root','password') or die("connection failed");
       $db=@mysql_select_db('quiz',$conn)or die("could not select database");
       $sql="select * from admin where username = '{$u}' and password = '{$p}' ";
       $result=mysql_query($sql,$conn)or die('query execution failed'.mysql_error());
       $num=mysql_num_rows($result);
       $row=mysql_fetch_assoc($result);
       if($num>0){
            $_SESSION['user']=$row['username'];
            header("location:auth.php");
       }
       else{
            $empty=true;
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
   <body class="bg-warning">
   <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
   <div class="navbar-header">
      <a class="navbar-brand"  href="#">
      <img style="max-width:65px; margin-top: -15px; margin-left: -15px"
             src="../img/unnamed.jpg"> </a></div>
    <div>
      <p class="navbar-text pull-right"><font size=5><b>Admin Portal</b> </font></p>
      <p class="navbar-text"><font size=5><b>Gurgaon Police Online Quiz Module</b> </font></p>
   </div>
</nav>
<br>
<br>
<br>
<br>
<br>
<br>

<div class="container" id="content">
   <div class="row">
      <h3 align="center">Log In</h3>
      </div></div>
   </div>
      <div class="col-md-6 col-md-push-3">
   <div class="jumbotron">
      <form class="form-horizontal" role="form" method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
   <div class="form-group">
      <label for="firstname" class="col-sm-2 control-label">UserName:</label>
      <div class="col-sm-10">
         <input type="text" class="form-control" id="firstname" name="username"
            placeholder="Enter Username">
      </div>
   </div>
   <div class="form-group">
      <label for="lastname" class="col-sm-2 control-label">Password:</label>
      <div class="col-sm-10">
         <input type="password" class="form-control" id="lastname"  name="password"
            placeholder="Enter Password">
      </div>
   </div>
   <br>
    <div class="form-group">
      <div class="col-sm-offset-5 col-sm-12">
         <button type="submit" class="btn btn-primary" name="submit">Sign in</button>
      </div>
   </div>
   <?php if(isset($empty)) { //If errors are found ?>
            <p class="alert alert-danger"><small>Incorrect Username or Password</small></p>    
    <?php unset($empty);} ?>
    <?php if(isset($loggedIn)) { //If errors are found ?>
        <p class="alert alert-warning"><small>User is already logged In</small></p>    
    <?php unset($loggedIn);} ?>
</form>
<style>
    #content {
       z-index: 500;
       opacity: 0.6;
   }
   #content <.row {
       min-height: 0px;
       background: #cccccc;
   }
   .jumbotron{
      background: #cccccc;
   }
</style>
</body>
</html>