<?php
	$mysqli=new mysqli('localhost','root','','kino');
	if ($mysqli->connect_errno) {
		echo "Неудалось подключитьсякMySQL: " . mysqli_connect_error();
		return false;
	};
	$mysqli->set_charset("utf8");
	$method = $_SERVER['REQUEST_METHOD'];
		if ($method == 'POST'){
			$json = json_decode(file_get_contents('php://input'),true);
			
			$text="INSERT INTO `films`(`name`) VALUES ('".$json['name']."')";
			$result=$mysqli->query($text);
			$text="SELECT MAX(`ID`) as id FROM `films`"; 
			$result=$mysqli->query($text);
			if ($row = mysqli_fetch_assoc($result)){
				$a=array('result'=>$row['id']);
				echo json_encode($a);
			}
			return;
		}
?>