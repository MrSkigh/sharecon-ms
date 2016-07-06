<?php

set_include_path(get_include_path() . PATH_SEPARATOR . "/var/www/html/";
include('include/message.php');
//require_once('addon/sharingecon/sharingecon.php');

if(isset($_POST['test'])){
	header('Content-Type: application/json');
	echo '{"test":{"titel":"wahr"}}';
	return;
}

if (isset($_POST['function'])) {
	if($_POST['function'] == "write_message"){
		echo write_message($_POST['input-message-recipient'], $_POST['input-message-subject'], $_POST['input-message-body']);
	}

	return;
}

function add_new_share($data){
	
	$server = "localhost";
	$user = "root";
	$password = "dbroot";
	$dbname = "hz_sharecon";
	
	$conn = new mysqli($server, $user, $password, $dbname);
	
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	}
	
	$sql_query = "INSERT INTO sharedObjects (title, shortdesc, owner) VALUES ('" . $data['title'] . "', '" . $data['shortdesc'] . "', '" . $data['owner'] . "')";
	
	if ($conn->query($sql_query) === TRUE) {
		return "New record created successfully";
	} else {
		return "Error: " . $sql_query . "<br>" . $conn->error;
	}

	$conn->close();
}

function load_shares($args){
	$server = "localhost";
	$user = "root";
	$password = "dbroot";
	$dbname = "hz_sharecon";
	
	$conn = new mysqli($server, $user, $password, $dbname);
	
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	}
	
	$resArray = array();
	$sql_query = "SELECT * FROM sharedObjects";
	
	if(isset($args['owner'])){
		$sql_query .= " WHERE owner = '" . $args['owner'] . "'";
	}
	
	if($result = $conn->query($sql_query)){
		while($row = $result->fetch_array(MYSQLI_ASSOC)) {
				$resArray[] = $row;
		}
		//echo json_encode($resArray);
		return $resArray;
	}
	else return null; //{ echo "";}

	$conn->close();
}

function load_share_details($id){
	header('Content-Type: application/json');
	
	$server = "localhost";
	$user = "root";
	$password = "dbroot";
	$dbname = "hz_sharecon";
	
	$conn = new mysqli($server, $user, $password, $dbname);
	
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	}
	
	$resArray = array();
	$sql_query = "SELECT * FROM sharedObjects WHERE ID=" . $id;
	
	if($result = $conn->query($sql_query)){
		while($row = $result->fetch_array(MYSQLI_ASSOC)) {
				$resArray[] = $row;
		}
		return $resArray[0];
	}
	else { return "";}

	$conn->close();
}

function write_message($rec, $subject, $body){
	send_message(null, $rec, $body,$subject);
}
?>