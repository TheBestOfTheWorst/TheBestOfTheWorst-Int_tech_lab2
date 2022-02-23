<?php
try {
	require_once __DIR__ . "/vendor/autoload.php";
	
	$m = new MongoDB\Client();
	$db = $m->selectDatabase("lab2");
	$collection = $db->selectCollection("computers");
}
catch (Exception $e) {
	echo $e->GetMessage();
}
?>
