<?php
	$firstName = $_POST['fullName'];
	$lastName = $_POST['course'];
	$gender = $_POST['gender'];
	$email = $_POST['email'];
	$password = $_POST['password'];
	$number = $_POST['number'];

	// Database connection
	$conn = new mysqli('localhost','root','','test');
	// $mysqli = new mysqli("localhost", $username, $password, $database);
	if($conn->connect_error)
		{
		echo "$conn->connect_error";
		die("Not working : ". $conn->connect_error);
		} 
	else {
		$stmt = $conn->prepare("insert into registration(fullName, course, gender, email, password, number) values(?, ?, ?, ?, ?, ?)");
		$stmt->bind_param("sssssi", $fullName, $course, $gender, $email, $password, $number);
		$execval = $stmt->execute();
		echo $execval;
		echo "Registration successfully...";
		$stmt->close();
		$conn->close();
		}
?>


