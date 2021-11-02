<?php
// including the database connection file
include_once("config.php");

if(isset($_POST['login']))
{	
    $password = mysqli_real_escape_string($mysqli, $_POST['password']);
	$email = mysqli_real_escape_string($mysqli, $_POST['email']);	
    $result = mysqli_query($mysqli, "SELECT * FROM tb_user WHERE email='$email' and password='$password'");
	$datauser = mysqli_fetch_array($result);
    
	$id = $datauser['id_user'];

    if($datauser){
	?>
	<script type="text/javascript">
		alert("Berhasil");
	</script>
	<?php
	header("Location: index1.php?id=$id");
	} else {
    ?>
    <script type="text/javascript">
        alert("Gagal!");
    </script>
    <?php  
    };
}
?>
<html>
<head>	
	<title>Login</title>
</head>

<body>
	<form name="form1" method="post" action="index.php">
		<table border="0">
			<tr> 
				<td>email</td>
				<td><input type="text" name="email"></td>
			</tr>
			<tr> 
				<td>Password</td>
				<td><input type="text" name="password"></td>
			</tr>
			<tr>
				<td><input type="submit" name="login" value="login"></td>
			</tr>
		</table>
	</form>
</body>
</html>
