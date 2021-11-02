<html>
<head>
	<title>Add Data</title>
</head>

<body>
<?php
//including the database connection file
include_once("config.php");

if(isset($_POST['Submit'])) {	
	$article = mysqli_real_escape_string($mysqli, $_POST['article']);
	$id_user = mysqli_real_escape_string($mysqli, $_POST['id_user']);
	$tag = mysqli_real_escape_string($mysqli, $_POST['tag']);
		
	// checking empty fields
	if(empty($article) || empty($id_user) || empty($tag)) {
				
		if(empty($article)) {
			echo "<font color='red'>Name field is empty.</font><br/>";
		}
		
		if(empty($tag)) {
			echo "<font color='red'>tag field is empty.</font><br/>";
		}
		
		if(empty($id_user)) {
			echo "<font color='red'>id_user field is empty.</font><br/>";
		}
		
		//link to the previous page
		echo "<br/><a href='javascript:self.history.back();'>Go Back</a>";
	} else { 
		// if all the fields are filled (not empty) 
			
		//insert data to database	
		$result = mysqli_query($mysqli, "INSERT INTO tb_article(id_user, article, tag) VALUES('$id_user','$article','$tag')");
		
		//display success message
		echo "<font color='green'>Data Berhasil Dimasukkan.";
		echo "<br/><a href='index1.php?id=$id_user'>Kembali</a>";
	}
}
?>
</body>
</html>
