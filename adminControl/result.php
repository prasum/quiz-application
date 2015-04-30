<?php
      ob_start();
      session_start();
      if(isset($_SESSION['user']))
      {
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
             src="../img/b.bmp"> </a></div>
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
   <a href="#" class="btn btn-primary btn-lg " role="button" target="_top">
      Delete
   </a>
   <a href="qmod.php" class="btn btn-primary btn-lg" role="button">
      Quiz Modification
   </a>
   <a href="add_school.php" class="btn btn-primary btn-lg" role="button">
         Add School
      </a>
   <a href="#" class="btn btn-primary btn-lg" role="button">
      Result
   </a>
    <a href="logout.php"  class="btn btn-primary btn-lg " role="button" >
      LogOut
   </a>
 </p>
</div>
<br>
<br><div class="container ">
  <div class="row">
    <div class="col-md-6 col-md-push-3">
      <div class="jumbotron">
        <fieldset>
          <legend class="center-block"><b>Select School</b></legend>
            <form class="form-horizontal" role="form" method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
              <div class="form-group">
                <select name="school" size="1" class="form-control input-sm" id="school"><!-- names of all the schools -->
                  <option value=''>Select School</option>
                  <?php
                    $conn=mysql_connect('127.0.0.1','root','password') or die("connection failed");
                    $db=@mysql_select_db('quiz',$conn)or die("could not select database");
                    $sql="select * from schools";
                    $result=mysql_query($sql,$conn)or die('query execution failed'.mysql_error());
                    while($row=mysql_fetch_array($result)){
                      echo "<option value='{$row['s_name']}'>{$row['s_name']}</option>";
                    }
                  ?>
                </select>
              </div>
              <input type="submit" name="submit" value="Get Result" class="btn btn-info btn-medium pull-right">
            </form>
        </fieldset>
      </div>
    </div>
  </div>
</div>
<br>
<br>
</body>
  <?php
    }else
    header("location:index.php");
      ?>
<?php
if(isset($_POST['submit']))
{
   $conn=mysql_connect('127.0.0.1','root','password') or die("connection failed");
   $db=@mysql_select_db('quiz',$conn)or die("could not select database");
    $category=mysql_real_escape_string($_POST['school']);
    if($category="All"){
      $sql="select * from user";
    }
    else{
      $sql="select * from user where school_name ='{$category}'";
    }
    $result=mysql_query($sql,$conn)or die('query execution failed'.mysql_error());
    echo "<h4><center><p class='alert alert-info center'><strong>Result</strong></p><center></h4>";
    echo "</br>";
    echo "<table class='table table-hover'> <tr> <th> Name </th> <th> School </th>  <th> Class </th> <th> Email ID </th> <th> Contact </th><th> Score </th></tr>";
    while($row=mysql_fetch_array($result))
    {
    echo "<tr><td> {$row['name']} </td>  <td> {$row['school_name']} </td> <td> {$row['class']} </td> <td> {$row['email_id']} </td> <td> {$row['contact_no']} </td><td> {$row['score']} </td></tr>";
    }
   echo "</table>";
}
   ?>
