<?php
extract($_GET);
$query="select IFSC,Name,Acc_no,Balance from details where IFSC='".$IFSC."' and Acc_no='".$Acc_no."'";
echo $query;
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
	$conn=mysqli_connect("localhost","root","");
	mysqli_select_db($conn,"banking");
	$res=mysqli_query($conn,"UPDATE details set details.balance=details.balance+'".$amount."' where Acc_no='".$Acc_no."'");
	echo $res;
	$fin=mysqli_query($conn,$res);
	if(mysqli_num_rows($fin)>0)
	{
		echo "<table border=1>";
		echo "<th>IFSC</th>";
		echo "<th>NAME</th>";
		echo "<th>ACC.NO</th>";
		echo "<th>BALANCE</th>";
		while($row = mysqli_fetch_assoc($fin))
		{
			echo"<tr><td>";
			echo$row["IFSC"]."</td><td>".$row["Name"]."</td><td>"/$row["Acc_no"]."</td><td>".$row["Balance"]."</td></tr>";
		}
		echo "</table>";
	}
		echo "0 Results";
}
else{
	echo"<h1>User not found</h1>";
}
?>