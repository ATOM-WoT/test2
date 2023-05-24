<?php
	$mysqli=new mysqli('localhost','root','','kino');
	if ($mysqli->connect_errno) {
		echo "Не удалось подключиться к MySQL: " . mysqli_connect_error();
		return false;
	};
	$mysqli->set_charset("utf8");
	$method = $_SERVER['REQUEST_METHOD'];
		if ($method == 'POST'){
			$json = json_decode(file_get_contents('php://input'),true);
			
			$text="INSERT INTO `theatres`(`name`, `address`) VALUES ('".$json['name']."','".$json['address']."')";
			$result=$mysqli->query($text);
			$a=array('result'=>$result);
			echo json_encode($a);
			return;
		}
?>
