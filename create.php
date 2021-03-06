<?php 
require __DIR__.'/inc/db.php';

$method = $_SERVER['REQUEST_METHOD'];

if ($method != 'POST') {
	http_response_code(405);
	echo json_encode(['error' => 'method not allowed']);
	return;
	
}
if (!isset($_POST['start'])) {
	echo json_encode(['error' => 'start is required']);
	return;
}elseif (!isset($_POST['end'])) {
	echo json_encode(['error' => 'end is required']);
	return;
}elseif (!isset($_POST['start_unit'])) {
	echo json_encode(['error' => 'start unit is required']);
	return;
}elseif (!isset($_POST['end_unit'])) {
	echo json_encode(['error' => 'end unit is required']);
	return;
}

$db = new DB();
$db->insert($_POST['start'], $_POST['end'], $_POST['start_unit'], $_POST['end_unit']);