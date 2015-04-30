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
                        <a href="#"  class="btn btn-primary btn-lg " role="button" target="_top">
                           Edit
                        </a>
                        <a href="delete3.php" class="btn btn-primary btn-lg " role="button">
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
                  <h3 align="center"> Edit </h3>
                  <form class="form-horizontal" role="form" method="POST" action="<?php echo $_SERVER['PHP_SELF'];?>">
                     <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                           <div class="radio">
                              <label>
                                 <input type="radio" name="Category" id="email" 
                                 value="email security"> Email Security
                              </label>
                           </div>

                           <div class="radio">
                              <label>
                                 <input type="radio" name="Category" id="browser" 
                                 value="Browser Security">
                                 Browser Security
                              </label>
                           </div>
                           <div class="radio">
                              <label>
                                 <input type="radio" name="Category" id="virus" 
                                 value="Viruses">
                                 Viruses
                              </label>
                           </div>
                           <div class="radio">
                              <label>
                                 <input type="radio" name="Category" id="ecom" 
                                 value="E-commerce">
                                 E-commerce
                              </label>
                           </div>
                           <div class="radio">
                              <label>
                                 <input type="radio" name="Category" id="credit" 
                                 value="Credit/Debit Card Usage">
                                 Credit/Debit Card Usage
                              </label>
                           </div>
                           <div class="radio">
                              <label>
                                 <input type="radio" name="Category" id="social" 
                                 value="Social Networking Sites">
                                 Social Networking Sites
                              </label>
                           </div>
                           <div class="radio">
                              <label>
                                 <input type="radio" name="Category" id="games" 
                                 value="Computer Games">
                                 Computer Games
                              </label>
                           </div>
                           <div class="radio">
                              <label>
                                 <input type="radio" name="Category" id="internet" 
                                 value="Internet Basics">
                                 Internet Basics
                              </label>
                           </div>
                           <div class="radio">
                              <label>
                                 <input type="radio" name="Category" id="mobile" 
                                 value="Mobile Apps">
                                 Mobile Apps
                              </label>
                           </div>
                           <div class="radio">
                              <label>
                                 <input type="radio" name="Category" id="onlineshop" 
                                 value="Online Shopping">
                                 Online Shopping
                              </label>
                           </div>
                           <div class="radio">
                              <label>
                                 <input type="radio" name="Category" id="safesurf" 
                                 value="Safe surfing/Downloading">
                                 Safe surfing/Downloading
                              </label>
                           </div>
                        </div>
                     </div>
                     <p align="center">      <button type="submit" class="btn btn-default" name="submit" >Show Table</button> </p>
                  </form>
                  <br>
                  <br>
               </body>
               </html>
                <?php
    }else
    header("location:index.php");
      ?>
<?php
   if(isset($_POST['submit']))
   {
   $conn=mysql_connect('127.0.0.1','root','password') or die("connection failed");
   $db=@mysql_select_db('quiz',$conn)or die("could not select database");
   
    $category=mysql_real_escape_string($_POST['Category']);
    $sql="select * from questions where category='{$category}'";
    $result=mysql_query($sql,$conn)or die('query execution failed'.mysql_error());
    echo "<h4><center><p class='alert alert-info center'><strong>Choose Question to Edit</strong></p><center></h4>";
    echo "<br>";
    echo "<table class='table table-hover'> <tr><th> S No. </th> <th> Question </th> <th> Category </th>  <th> Option A </th> <th> Option B </th> <th> Option C </th> <th> Option D </th> <th> Answer </th> <th> Task </th> </tr>";
    $id=1;
    while($row=mysql_fetch_array($result))
    {
    echo "<tr> <td align='center' >$id</td> <td> {$row['question']} </td> <td> {$row['a']} </td> <td> {$row['b']} </td> <td> {$row['c']} </td> <td> {$row['d']} </td> <td> {$row['ans']} </td> <td> {$row['category']} </td> <td><a href='edit2.php?question={$row['question']}'>Edit</a></td></tr>";
    $id=$id+1;
    }
   echo "</table>";
}
   ?>
               