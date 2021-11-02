<?php
//including the database connection file
include("config.php");

//getting id of the data from url
$id = $_GET['id'];
$id_user = $_GET['id_user'];

//deleting the row from table
$result = mysqli_query($mysqli, "UPDATE tb_article SET status=0 WHERE id_article=$id and id_user=$id_user");

if($result){
echo $result;
    // header("Location:index1.php?id=$id_user");
} else {
	?>
	<script type="text/javascript">
		alert("Denied!");
		// window.location.replace("index1.php?id=<?php echo($id_user) ?>");
	</script>
	<?php
}

?>

