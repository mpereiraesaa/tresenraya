<?php
require_once('api.php');
require_once('../config.php');
require_once('../objects/player.php');

$db = new database();

echo json_encode(player::getAll($db));

?>
