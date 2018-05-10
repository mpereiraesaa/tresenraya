<?php

require_once('../model/model.php');
require_once('board.php');
require_once('player.php');

class game extends model {
    public $timestamp = NULL;
    public $board = NULL;
    public $player1 = NULL;
    public $player2 = NULL;
    public $player1_mark = NULL;
    public $player2_mark = NULL;
    public $id = NULL;

    public function __construct($db, $data) {
        parent::__construct('games', $db);

        if(is_array($data) || !empty($data)) {
            if (array_key_exists("oldPlayer1", $data)) {
                $this->player1 = player::load($db, $data["oldPlayer1"]);
            }

            if (array_key_exists("oldPlayer2", $data)) {
                $this->player2 = player::load($db, $data["oldPlayer2"]);
            }

            if (!$this->player1) {
                if (array_key_exists("player1", $data)) {
                    $this->player1 = new player($db, $data["player1"]);
                }
            }

            if (!$this->player2) {
                if (array_key_exists("player2", $data)) {
                    $this->player2 = new player($db, $data["player2"]);
                }
            }

            $this->player1_mark = $data["player1_mark"];
            $this->player2_mark = $data["player2_mark"];
            $this->board = new board($db);
            $this->timestamp = date("Y-m-d H:i:s");

            $data = array(
                "player1_id" => $this->player1->getId(),
                "player2_id" => $this->player2->getId(),
                "player1_mark" =>  $this->player1_mark,
                "player2_mark" =>  $this->player2_mark,
                "board_id" => $this->board->getId(),
                "timestamp" =>  $this->timestamp
            );

            $this->id = $this->save($data);
        }
    }

    static function load($db, $game) {
        $gameLoaded = new game($db, null);

        $loadedData = $gameLoaded->readById($game);

        $gameLoaded->player1 = player::load($db, $loadedData["player1_id"]);
        $gameLoaded->player2 = player::load($db, $loadedData["player2_id"]);
        $gameLoaded->board = board::load($db, $loadedData["board_id"]);
        $gameLoaded->player1_mark = $loadedData["player1_mark"];
        $gameLoaded->player2_mark = $loadedData["player2_mark"];
        $gameLoaded->timestamp = $loadedData["timestamp"];
        $gameLoaded->id = $loadedData["id"];

        if ($loadedData) {
            return $gameLoaded;
        }
        else {
            return false;
        }
    }

    public function findPlayer($id) {
        if ($this->player1->id == $id) {
            return $this->player1;
        }
        else if ($this->player2->id == $id) {
            return $this->player2;
        }
        else {
            return false;
        }
    }
}

?>
