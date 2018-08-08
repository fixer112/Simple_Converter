<?php

require __DIR__.'/inc/db.php';

$db = new DB();
echo $db->select_all();