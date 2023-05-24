<?php
	$mysqli=new mysqli('localhost','root','','kino');
	if ($mysqli->connect_errno) {
		echo "Не удалось подключиться к MySQL: " . mysqli_connect_error();
		return false;
	};
	$mysqli->set_charset("utf8");
	$method = $_SERVER['REQUEST_METHOD'];
	//print_r($_SERVER);
	//print_r($_GET);
	//print_r($_POST);
	if ($method == 'GET'){
		$a=array();
			$text="SELECT films.name as fname, theatres.name as tname, theatres.address as taddress from films JOIN theartres_films on theartres_films.filmID=films.ID JOIN  theatres on theatres.ID=theartres_films.teatreID where films.name like '%".$_GET['name']."%'";
			$result=$mysqli->query($text);
			while ($row = mysqli_fetch_assoc($result)){
				$b=array("fname"=>$row['fname'],"tname"=>$row['tname'],"taddress"=>$row['taddress']);
				$a[]=$b;
			}
			echo json_encode($a);
			return;
	}
?>