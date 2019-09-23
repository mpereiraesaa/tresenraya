<?php
require_once('../objects/game.php');
require_once('../config.php');

class gameController {
    static function getGame() {
        $gamedata = json_decode(urldecode($_GET['gamedata']), true);
        if(!is_array($gamedata)) {
            die('Received content contained invalid JSON!');
        }
        $db = new database();
        $game = new game($db, $gamedata);
        echo json_encode($game);
    }
}
?>
