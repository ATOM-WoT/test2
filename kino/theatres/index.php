<?php
	$mysqli=new mysqli('localhost','root','','kino');
	if ($mysqli->connect_errno) {
		echo "Не удалось подключиться к MySQL: " . mysqli_connect_error();
		return false;
	};
	$mysqli->set_charset("utf8");
	$method = $_SERVER['REQUEST_METHOD'];
	if ($method == 'GET'){
		$a=array();
			$text="select * from theatres where name like '%".$_GET['name']."%' or address like '%".$_GET ['name']."%'";
			$result=$mysqli->query($text);
			while ($row = mysqli_fetch_assoc($result)){
				$b=array("name"=>$row['name'], "address"=>$row['address']);
				$a[]=$b;
			}
			echo json_encode($a);
			return;
	}
?>
