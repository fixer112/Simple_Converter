<?php

require __DIR__.'/inc/db.php';
$method = $_SERVER['REQUEST_METHOD'];

if ($method != 'GET') {
	http_response_code(405);
	echo json_encode('method not allowed');
	return;
	
}

$db = new DB();
echo $db->select_all();