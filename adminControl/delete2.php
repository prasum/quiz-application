<?php
if(isset($_REQUEST['id']))
{
	$ID=$_REQUEST['id'];
	$conn=mysql_connect('127.0.0.1','root','password') or die("connection failed");
    $db=@mysql_select_db('quiz',$conn)or die("could not select database");
    $sql="delete from questions where question = '{$ID}'";
    $result=mysql_query($sql,$conn)or die('query execution failed'.mysql_error());
    if($result>0)
    {
    	header("location:delete3.php");
    }
}
?>