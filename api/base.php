<?php
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Headers: Content-Type');

require_once('./gameController.php');
require_once('./moveController.php');
require_once('./playerController.php');

$type = "";
if(isset($_GET['type']))
	$type = $_GET['type'];

switch($type) {
    case "game":
	gameController::getGame();
    break;
    case "move":
	moveController::getResponse();
    break;
    case "players":
	playerController::getAll();
    break;
    default:
    break;
}
?>
