<?php
// including the database connection file
include_once("config.php");

if(isset($_POST['update']))
{	

	$id = mysqli_real_escape_string($mysqli, $_POST['id']);
	$id_user = mysqli_real_escape_string($mysqli, $_POST['id_user']);
	
	$article = mysqli_real_escape_string($mysqli, $_POST['article']);
	$tag = mysqli_real_escape_string($mysqli, $_POST['tag']);	
	
	// checking empty fields
	if(empty($article) || empty($tag)) {
		
		if(empty($article)) {
			echo "<font color='red'>article field is empty.</font><br/>";
		}
		
		if(empty($tag)) {
			echo "<font color='red'>tag field is empty.</font><br/>";
		}		
	} else {	
		//updating the table
		$result = mysqli_query($mysqli, "UPDATE tb_article SET article='$article', tag='$tag' WHERE id_article=$id and id_user=$id_user");
		
		//redirectig to the display page. In our case, it is index.php
		header("Location: index1.php?id=$id_user");
	}
}
?>
<?php
//getting id from url
$id = $_GET['id'];
$id_user = $_GET['id_user'];

//selecting data associated with this particular id
$result = mysqli_query($mysqli, "SELECT * FROM tb_article WHERE id_article=$id and id_user=$id_user");
$res = mysqli_fetch_array($result);

if(!$res){
	?>
	<script type="text/javascript">
		alert("Denied!");
		window.location.replace("index1.php?id=<?php echo($id) ?>");
	</script>
	<?php
} else {
	$article = $res['article'];
	$tag = $res['tag'];
}
?>
<html>
<head>	
	<title>Edit Data</title>
</head>

<body>
	<a href="index.php">Home</a>
	<br/><br/>
	
	<form name="form1" method="post" action="editArticle.php">
		<table border="0">
			<tr> 
				<td>article</td>
				<td><input type="text" name="article" value="<?php echo $article;?>"></td>
			</tr>
			<tr> 
				<td>tag</td>
				<td><input type="text" name="tag" value="<?php echo $tag;?>"></td>
			</tr>
			<tr>
				<td><input type="hidden" name="id" value=<?php echo $_GET['id'];?>></td>
				<td><input type="hidden" name="id_user" value=<?php echo $_GET['id_user'];?>></td>
				<td><input type="submit" name="update" value="Update"></td>
			</tr>
		</table>
	</form>
</body>
</html>
