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
   <a href="add_school.php" class="btn btn-primary btn-lg" role="button">
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
      <h3 align='center' > Update Quiz Module</h3> </body>
       <?php
    }else
    header("location:index.php");
      ?>

      <?php
         if(isset($_REQUEST['question']))
         {
            $ID=$_REQUEST['question'];
            $conn=mysql_connect('127.0.0.1','root','password') or die("connection failed");
            $db=@mysql_select_db('quiz',$conn)or die("could not select database");
            $sql="select * from questions where question = '{$ID}' ";
            $result=mysql_query($sql,$conn)or die('query execution failed'.mysql_error());
            $num=mysql_num_rows($result);
            if($num>0)
            {
               $row=mysql_fetch_array($result);
               echo "<form class='form-horizontal' role='form' method='POST' action='edit2.php'> <div class='form-group'> <label for='firstname' class='col-sm-2 control-label'>Question</label> <div class='col-sm-10'><input type='text' class='form-control' name='FirstName' placeholder='Enter Question' value='{$row['question']}'></div></div><div class='form-group'> <label for='firstname' class='col-sm-2 control-label'>Enter field</label></div><div class='form-group'> <div class='col-sm-offset-2 col-sm-10'><div class='radio'><label> <input type='radio' name='Category' id='email' value='Email Security' > Email Security</label></div><div class='radio'><label> <input type='radio' name='Category' id='browser' value='Browser Security'>Browser Security</label></div><div class='radio'><label> <input type='radio' name='Category' id='virus'  value='Viruses'> Viruses</label></div><div class='radio'> <label><input type='radio' name='Category' id='ecom'  value='E-commerce'> E-commerce</label></div><div class='radio'> <label><input type='radio' name='Category' id='credit'  value='Credit/Debit Card Usage'> Credit/Debit Card Usage</label></div><div class='radio'> <label><input type='radio' name='Category' id='social'  value='Social Networking Sites'>Social Networking Sites</label></div><div class='radio'><label> <input type='radio' name='Category' id='games' value='Computer Games'>Computer Games</label></div><div class='radio'>  <label><input type='radio' name='Category' id='internet'  value='Internet Basics'> Internet Basics </label></div><div class='radio'> <label> <input type='radio' name='Category' id='mobile'  value='Mobile Apps'>Mobile Apps</label></div><div class='radio'><label> <input type='radio' name='Category' id='onlineshop'  value='Online Shopping'> Online Shopping</label></div><div class='radio'> <label><input type='radio' name='Category' id='safesurf' value='Safe surfing/Downloading'>Safe surfing/Downloading</label></div></div><div class='form-group'> <label for='firstname' class='col-sm-2 control-label'>Answer</label></div><div class='form-group'><label for='firstname' class='col-sm-2 control-label'>A:</label><div class='col-sm-10'><input type='text' class='form-control' name='A'  placeholder='Enter Option A' value='{$row['a']}'></div> </div><div class='form-group'><label for='firstname' class='col-sm-2 control-label'>B:</label><div class='col-sm-10'> <input type='text' class='form-control' name='B'  placeholder='Enter Option B' value='{$row['b']}'> </div> </div><div class='form-group'> <label for='firstname' class='col-sm-2 control-label'>C:</label> <div class='col-sm-10'> <input type='text' class='form-control' name='C' placeholder='Enter Option C' value='{$row['c']}'>  </div></div> <div class='form-group'> <label for='firstname' class='col-sm-2 control-label'>D:</label><div class='col-sm-10'> <input type='text' class='form-control' name='D'  placeholder='Enter Option D' value='{$row['d']}'> </div></div> <div class='form-group'><label for='firstname' class='col-sm-2 control-label'>Correct</label> </div><div class='form-group'> <div class='col-sm-offset-2 col-sm-10'><div class='radio'><label> <input type='radio' name='CorrectOption' id='A'  value='A'>A </label></div><div class='radio'>  <label> <input type='radio' name='CorrectOption' id='B' value='B'>B</label></div><div class='radio'> <label> <input type='radio' name='CorrectOption' id='C'  value='C'>C </label></div><div class='radio'><label> <input type='radio' name='CorrectOption' id='D' value='D'> D</label></div></div></div></div><p align='center'><button type='submit' class='btn btn-default' name='submit' >Update</button></p></form>";
            }
         }
     ?>
     <?php
     if(isset($_POST['submit']))
     {
      $conn=mysql_connect('127.0.0.1','root','password') or die("connection failed");
      $first=mysql_real_escape_string($_POST['FirstName'],$conn);
      $cat=mysql_real_escape_string($_POST['Category'],$conn);
       $a=mysql_real_escape_string($_POST['A'],$conn);
      $b=mysql_real_escape_string($_POST['B'],$conn);
      $c=mysql_real_escape_string($_POST['C'],$conn);
      $d=mysql_real_escape_string($_POST['D'],$conn);
      $corr=mysql_real_escape_string($_POST['CorrectOption']);
      if(!$first or !$cat or !$a or !$b or !$c or !$d or !$corr){
          
          header("location: edit3.php");
      }
      $db=@mysql_select_db('quiz',$conn)or die("could not select database");
      $query="update questions set question = '$first', category = '$cat' , a = '$a' ,  b = '$b' , c = '$c' , d = '$d' , ans = '$corr'  where  question = '$first' ";
      $result=mysql_query($query,$conn) or die("query cannot be executed");
      if($result>0)
      {
         header("location:auth.php");
      }
     }
     ?>
     
