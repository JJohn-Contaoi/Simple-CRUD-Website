<?php
	//insert the content of connection.php file
	include('connection.php');

	//delete data into the database
	if(ISSET($_POST['deleteData']))
	{
		$id = $_POST['deleteId'];

		$sql = "DELETE FROM tbl_student WHERE id='$id'";
		$result = mysqli_query($conn, $sql);

		if($result){
			echo '<script> alert("Data Deleted."); </script>';
			header('Location; index.php');
		}else{
			echo '<script> alert("Data Not Deleted."); </script>';
		}
	}
?>