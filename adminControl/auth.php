<?php
   ob_start();
   session_start();
   if(!isset($_SESSION['user'])){
      header("location:index.php");
   }
   else if(isset($_POST['submit']))
   {
      if(trim($_POST['FirstName']) == '' or trim($_POST['A']) == '' or trim($_POST['B']) == '' or trim($_POST['C']) == '' or trim($_POST['D']) == '' or trim($_POST['CorrectOption']) == '' or trim($_POST['Category']) == ''){
         $hasError=true;
      }
      else{
         $conn=mysql_connect('127.0.0.1','root','password') or die("connection failed");
         $db=@mysql_select_db('quiz',$conn)or die("could not select database");
         $qes=$_POST['FirstName'];
         $query="select * from questions where question='{$qes}'";
         $result=mysql_query($query,$conn)or die('query execution failed'.mysql_error());
         $num=mysql_num_rows($result);
         if($num>0){
            $repeat=true;
         }
         else{
            $conn=mysql_connect('127.0.0.1','root','password') or die("connection failed");
            $db=@mysql_select_db('quiz',$conn)or die("could not select database");
            $first=mysql_real_escape_string($_POST['FirstName']);
            $category=mysql_real_escape_string($_POST['Category']);
            $a=mysql_real_escape_string($_POST['A']);
            $b=mysql_real_escape_string($_POST['B']);
            $c=mysql_real_escape_string($_POST['C']);
            $d=mysql_real_escape_string($_POST['D']);
            $corr=mysql_real_escape_string($_POST['CorrectOption']);
            $query="insert into questions(question,a,b,c,d,ans,category)values('$first','$a','$b','$c','$d','$corr','$category')";
            $result=mysql_query($query,$conn)or die('query execution failed'.mysql_error());
            if($result>0){
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
   <a href="#" class="btn btn-primary btn-lg active" role="button">
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
   <?php if(isset($hasError)) { unset($hasError);//If errors are found ?>
      
      <p class="alert alert-danger">Please check if you've filled all the fields with valid information and try again. Thank you.</p>
   <?php } ?>
      <?php if(isset($repeat)) { 
         unset($repeat);//If email is sent ?>
       <p><center><strong>  
      <div class="alert alert-warning">
         Question is already present in the database!
      </div></strong></center></p>
   <?php } ?>
   <?php if(isset($success)) { //If email is sent ?>
      <p><center><strong> 
      <div class="alert alert-success">
         <p><strong>Question inserted successfully!</strong></p>
      </div></strong></center></p>
   <?php } ?>
   <div class="container ">
         <div class="row">
            <div class="col-md-10 col-md-push-1">
               <div class="jumbotron">
                  <legend><b>Add Questions To The Database</b></legend><br>
                  <form class="form-horizontal" role="form" method="POST" action="<?php echo $_SERVER['PHP_SELF'];?>">
                     <div class="form-group">
                        <label for="firstname" class="col-sm-2 control-label">Question</label>
                        <div class="col-sm-10">
                           <textarea type="text" rows="3" class="form-control input-xlarge" name="FirstName" 
                              placeholder="Enter Question"></textarea>
                        </div>
                     </div>
                     <div class="form-group">
                        <label for="firstname" class="col-sm-2 control-label">Enter field</label>
                     </div>
                  <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                  <div class="radio">
                     <label>
                        <input type="radio" name="Category" id="email" 
                           value="email security" > Email Security
                     </label>
                  </div>

                  <div class="radio">
                     <label>
                        <input type="radio" name="Category" id="browser" 
                           value="browser security">
                           Browser Security
                     </label>
                  </div>
                  <div class="radio">
                     <label>
                        <input type="radio" name="Category" id="virus" 
                           value="viruses">
                           Viruses
                     </label>
                  </div>
                  <div class="radio">
                     <label>
                        <input type="radio" name="Category" id="ecom" 
                           value="e-commerce">
                           E-commerce
                     </label>
                  </div>
                  <div class="radio">
                     <label>
                        <input type="radio" name="Category" id="credit" 
                           value="credit/debit card usage">
                           Credit/Debit Card Usage
                     </label>
                  </div>
                  <div class="radio">
                     <label>
                        <input type="radio" name="Category" id="social" 
                           value="social networking sites">
                           Social Networking Sites
                     </label>
                  </div>
                  <div class="radio">
                     <label>
                        <input type="radio" name="Category" id="games" 
                           value="  computer games">
                           Computer Games
                     </label>
                  </div>
                  <div class="radio">
                     <label>
                        <input type="radio" name="Category" id="internet" 
                           value="internet basics">
                           Internet Basics
                     </label>
                  </div>
                  <div class="radio">
                     <label>
                        <input type="radio" name="Category" id="mobile" 
                           value="mobile apps">
                           Mobile Apps
                     </label>
                  </div>
                  <div class="radio">
                     <label>
                        <input type="radio" name="Category" id="onlineshop" 
                           value="online shopping">
                           Online Shopping
                     </label>
                  </div>
                  <div class="radio">
                     <label>
                        <input type="radio" name="Category" id="safesurf" 
                           value="safe surfing">
                           Safe surfing/Downloading
                     </label>
                  </div>
                  </div>
                   <div class="form-group">
                        <label for="firstname" class="col-sm-2 control-label">Answer</label>
                   </div>
                         <div class="form-group">
                        <label for="firstname" class="col-sm-2 control-label">A:</label>
                        <div class="col-sm-10">
                           <input type="text" class="form-control" name="A" 
                              placeholder="Enter Option A">
                        </div>
                     </div>
                     <div class="form-group">
                        <label for="firstname" class="col-sm-2 control-label">B:</label>
                        <div class="col-sm-10">
                           <input type="text" class="form-control" name="B" 
                              placeholder="Enter Option B">
                        </div>
                     </div>
                     <div class="form-group">
                        <label for="firstname" class="col-sm-2 control-label">C:</label>
                        <div class="col-sm-10">
                           <input type="text" class="form-control" name="C" 
                              placeholder="Enter Option C">
                        </div>
                     </div>
                     <div class="form-group">
                        <label for="firstname" class="col-sm-2 control-label">D:</label>
                        <div class="col-sm-10">
                           <input type="text" class="form-control" name="D" 
                              placeholder="Enter Option D">
                        </div>
                     </div>
                     <div class="form-group">
                        <label for="firstname" class="col-sm-2 control-label">Correct</label>
                      </div>
                      <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                      <div class="radio">
                     <label>
                        <input type="radio" name="CorrectOption" id="A" 
                           value="a">
                           A
                     </label>
                  </div>
                  <div class="radio">
                     <label>
                        <input type="radio" name="CorrectOption" id="B"
                           value="b">
                           B
                     </label>
                  </div>
                  <div class="radio">
                     <label>
                        <input type="radio" name="CorrectOption" id="C" 
                           value="c">
                           C
                     </label>
                  </div>
                  <div class="radio">
                     <label>
                        <input type="radio" name="CorrectOption" id="D" 
                           value="d">
                          D
                     </label>
                  </div>
                  </div>
                  </div>
                  </div>
                  <br>
                     <p align="center"><button type="submit" class="btn btn-primary btn-lg span7" name="submit" >Insert</button> </p>
                  </form>
   </body>
   </html>
         
