<?php
require __DIR__.'/inc/db.php';

if (!isset($_GET['name'])) {
	echo json_encode('name is required');
	return;
}elseif (!isset($_GET['value'])) {
	echo json_encode('value is required');
	return;
}elseif (!isset($_GET['id'])) {
	echo json_encode('id is required');
	return;
}

$db = new DB();
$db->update($_GET['name'], $_GET['value'], $_GET['id']);