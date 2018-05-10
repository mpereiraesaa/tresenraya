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

// recibe { game: 2, value:"X", player: 3, cell: "0,0" } en base al click en el cliente.
extract($decoded);

$gameLoad = game::load($db, $game);

// Make the move
$gameLoad->board->setValue($value, $cell);

$data = array(
    "next" => NULL,
    "nextPlayer" => NULL,
    "winner" => NULL
);

$isOver = $gameLoad->board->getTriplet();

if ($isOver) {
    if ($isOver == $value) {
        $winner = $gameLoad->findPlayer($player);
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

    if ($gameLoad->player1_mark === $data["next"]) {
        $data["nextPlayer"] = 1;
    }
    else {
        $data["nextPlayer"] = 2;
    }
}

echo json_encode($data);

?>
