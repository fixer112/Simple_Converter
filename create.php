<?php 
require __DIR__.'/inc/db.php';

if (!isset($_GET['start'])) {
	echo json_encode('start is required');
	return;
}elseif (!isset($_GET['end'])) {
	echo json_encode('end is required');
	return;
}elseif (!isset($_GET['start_unit'])) {
	echo json_encode('start unit is required');
	return;
}elseif (!isset($_GET['end_unit'])) {
	echo json_encode('end unit is required');
	return;
}

$db = new DB();
$db->insert($_GET['start'], $_GET['end'], $_GET['start_unit'], $_GET['end_unit']);