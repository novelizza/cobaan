<?php
//including the database connection file
include_once("config.php");

//fetching data in descending order (lastest entry first)
//$result = mysql_query("SELECT * FROM users ORDER BY id DESC"); // mysql_query is deprecated
$result = mysqli_query($mysqli, "SELECT * FROM tb_article"); // using mysqli_query instead
$id = $_GET['id'];
?>

<html>
<head>	
	<title>Homepage</title>
</head>

<body>
<a href="addArticle.html?id=<?php echo($id) ?>">Add New Data</a><br/><br/>

	<table width='80%' border=0>

	<tr bgcolor='#CCCCCC'>
		<td>Article</td>
		<td>Tag</td>
		<td>Update</td>
	</tr>
	<?php 
	//while($res = mysql_fetch_array($result)) { // mysql_fetch_array is deprecated, we need to use mysqli_fetch_array 
	while($res = mysqli_fetch_array($result)) { 		
		echo "<tr>";
		echo "<td>".$res['article']."</td>";
		echo "<td>".$res['tag']."</td>";	
		echo "<td><a href=\"editArticle.php?id=$res[id_article]&id_user=$id\">Edit</a> | <a href=\"deleteArticle.php?id=$res[id_article]&id_user=$id\" onClick=\"return confirm('Are you sure you want to delete?')\">Delete</a></td>";		
	}

	?>
	</table>
</body>
</html>
