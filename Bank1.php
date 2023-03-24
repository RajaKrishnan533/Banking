<?php
header('Access-Control-Allow-Origin:*');
extract($_GET);
$query="select Username, Password from login where Username='".$name."' and password='".$password."'";
if(!($conn=mysqli_connect("localhost","root","")))
{
	die("Could not establish connection with my sql server");
}
if(!($database=mysqli_select_db($conn,"banking")))
{
	die("Could not eshtablish connection with database");
}
if(!($result=mysqli_query($conn,$query)))
{
	die("Query execution failure");
}
$count=mysqli_num_rows($result);
if($count==1)
{
	echo"<h1>Credentials verified</h1>";
}
else{
	echo"<h1>User not found</h1>";
}
?>