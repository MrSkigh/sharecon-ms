<?php

if(isset($_POST['test'])){
	header('Content-Type: application/json');
	echo '{"test":{"titel":"wahr"}}';
	return;
}

if (isset($_POST['function'])) {
	if($_POST['function'] == "addNewShare"){
		echo addNewShare();
	}
	else if($_POST['function'] == "loadShares"){
		echo loadShares();
	}
	return;
}

function addNewShare(){
	$title = strip_tags($_POST['inputTitle']);
	$shortdesc = strip_tags($_POST['inputShortDesc']);
	
	$server = "localhost";
	$user = "root";
	$password = "dbroot";
	$dbname = "hz_sharecon";
	
	$conn = new mysqli($server, $user, $password, $dbname);
	
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	}
	
	$sql_query = "INSERT INTO sharedobjects (title, shortdesc) VALUES ('" . $title . "', '" . $shortdesc . "')";
	
	if ($conn->query($sql_query) === TRUE) {
		echo "New record created successfully";
	} else {
		echo "Error: " . $sql_query . "<br>" . $conn->error;
	}

	$conn->close();
}

function loadShares(){
	header('Content-Type: application/json');
	
    $json[] = array
    (
        array(
			'Title' => 'T1',
			'ShortDesc' => 'SD1'
		),
		array(
			'Title' => 'T2',
			'ShortDesc' => 'SD2'
		)
    );
	echo json_encode($json);
	return;
	
	$server = "localhost";
	$user = "root";
	$password = "dbroot";
	$dbname = "hz_sharecon";
	
	$conn = new mysqli($server, $user, $password, $dbname);
	
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	}
	
	$resArray = array();
	$sql_query = "SELECT * FROM sharedobjects";
	
	if($result = $conn->query($sql_query)){
		while($row = $result->fetch_array(MYSQLI_ASSOC)) {
				$resArray[] = $row;
		}
		echo json_encode($resArray);
	}
	else { echo "";}

	$result->close();
	$conn->close();
}
?>