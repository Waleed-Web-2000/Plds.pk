>?php
	$firstName = $_POST['firstName'];
	$lastName = $_POST['lastName'];
	$email = $_POST['email'];
	$msg = $_POST['msg'];

	<!-- //database -->
	$conn = new mysqli('localhost','root','','test');
	if($conn->connect_error){
		die('Connection Failed : ' $conn->connect_error);
	}else{
		$stmt = $conn->prepare("insert into registration(firstName, lastName, email, msg)
			values(?, ?, ?, ?)");
		$stmt->blind_param("ssss",$firstName, $lastName, $email, $msg);
		$stmt->execute();
		echo "registration Successfully...";
		$stmt->close();
		$conn->close();
}
?>