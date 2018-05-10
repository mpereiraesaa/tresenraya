<?php
require_once('api.php');
require_once('../objects/game.php');
require_once('../config.php');

$content = trim(file_get_contents("php://input"));

$decoded = json_decode($content, true);

if(!is_array($decoded)) {
    die('Received content contained invalid JSON!');
}

$db = new database();

$game = new game($db, $decoded);

echo json_encode($game);

?>
