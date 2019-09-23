<?php
require_once('../config.php');
require_once('../objects/player.php');

class playerController {
    static function getAll() {
        $db = new database();
        echo json_encode(player::getAll($db));
    }
}
?>
