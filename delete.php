<?php
require __DIR__.'/inc/db.php';

$method = $_SERVER['REQUEST_METHOD'];

if ($method != 'DELETE') {
	http_response_code(405);
	echo json_encode('method not allowed');
	return;
	
}

if (!isset($_GET['id'])) {
	echo json_encode('id is required');
	return;
}

$db = new DB();
$db->delete($_GET['id']);