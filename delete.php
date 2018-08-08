<?php
require __DIR__.'/inc/db.php';

if (!isset($_GET['id'])) {
	echo json_encode('id is required');
	return;
}

$db = new DB();
$db->delete($_GET['id']);