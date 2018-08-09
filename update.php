<?php
require __DIR__.'/inc/db.php';
$method = $_SERVER['REQUEST_METHOD'];

if ($method != 'PUT' && $method != 'PATCH') {
	http_response_code(405);
	echo json_encode('method not allowed');
	return;
	
}
if (!isset($_POST['name'])) {
	echo json_encode('name is required');
	return;
}elseif (!isset($_POST['value'])) {
	echo json_encode('value is required');
	return;
}elseif (!isset($_POST['id'])) {
	echo json_encode('id is required');
	return;
}

$db = new DB();
$db->update($_POST['name'], $_POST['value'], $_POST['id']);