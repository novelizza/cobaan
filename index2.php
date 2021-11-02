<?php
//including the database connection file
include_once("config.php");

//fetching data in descending order (lastest entry first)
//$result = mysql_query("SELECT * FROM users ORDER BY id DESC"); // mysql_query is deprecated
$result = mysqli_query($mysqli, "SELECT * FROM tb_user"); // using mysqli_query instead
?>

<html>
<head>	
	<title>Homepage</title>
</head>

<body>
<a href="add.html">Add New Data</a><br/><br/>

	<table width='80%' border=0>

	<tr bgcolor='#CCCCCC'>
		<td>Name</td>
		<td>Email</td>
		<td>Password</td>
		<td>Update</td>
	</tr>
	<?php 
	//while($res = mysql_fetch_array($result)) { // mysql_fetch_array is deprecated, we need to use mysqli_fetch_array 
	while($res = mysqli_fetch_array($result)) { 		
		echo "<tr>";
		echo "<td>".$res['nama']."</td>";
		echo "<td>".$res['email']."</td>";
		echo "<td>".$res['password']."</td>";	
		echo "<td><a href=\"edit.php?id=$res[id_user]\">Edit</a> | <a href=\"delete.php?id=$res[id_user]\" onClick=\"return confirm('Are you sure you want to delete?')\">Delete</a></td>";		
	}

	?>
	</table>
</body>
</html>
