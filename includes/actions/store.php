<?php
include_once('../db/DB.php');
include_once('../functions.php');

$dataFromClient = json_decode(trim(file_get_contents("php://input")), true);
$data = getData($dataFromClient['id']);

$db = new DB();
$db->insert($data);
addToLogFile($data);

echo json_encode("Data created successfully! Card id: {$dataFromClient['id']}.");