<?php
	//insert the content of connection.php file
	include('connection.php');

	//insert data into the database
	if(ISSET($_POST['insertData']))
	{
		$firstname = $_POST['firstname'];
		$lastname = $_POST['lastname'];
		$address = $_POST['address'];
		$skills = $_POST['skills'];
		$program = $_POST['program'];

		$sql = "INSERT INTO tbl_student(firstname, lastname, address, skills, program, created_date) VALUEs('$firstname', '$lastname', '$address', '$skills', '$program', NOW())";
		$result = mysqli_query($conn, $sql);

		if($result){
			echo '<script> alert("Data saved."); </script>';
			header('Location; index.php');
		}else{
			echo '<script> alert("Data Not saved."); </script>';
		}
	}
?>