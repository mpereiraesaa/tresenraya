<?php
require_once('../objects/game.php');
require_once('../config.php');

class moveController {
    static function getResponse() {
        $db = new database();
        $movedata = json_decode(urldecode($_GET['movedata']), true);
        if (!is_array($movedata)) {
            die('Received content contained invalid JSON!');
        }

        // receives { game: 2, value:"X", player: 3, cell: "0,0" } en base al click en el cliente.
        extract($movedata);

        $loadedGame = game::load($db, $game);

        // Make the move
        $loadedGame->board->setValue($value, $cell);

        $response_data = array(
            "next" => NULL,
            "nextPlayer" => NULL,
            "winner" => NULL
        );

        $isOver = $loadedGame->board->getTriplet();

        if ($isOver) {
            if ($isOver == $value) {
                $winner = $loadedGame->findPlayer($player);
                $winner->incrementScore();
                $data["winner"] = $winner;
            }
        }
        else {
            if ($value == "O") {
                $data["next"] = "X";
            }
            else {
                $data["next"] = "O";
            }

            if ($loadedGame->player1_mark === $data["next"]) {
                $data["nextPlayer"] = 1;
            }
            else {
                $data["nextPlayer"] = 2;
            }
        }

        echo json_encode($response_data);
    }
}

?>
