<?php

require_once('../model/model.php');
require_once('score.php');

class player extends model {
    public $id = NULL;
    public $name = NULL;
    public $score = NULL;

    public function __construct($db, $name) {
        parent::__construct('players', $db);

        if(!empty($name)) {
            $this->name = $name;
            $this->score = new score($db);

            $data = array(
                "name" => $this->name,
                "score_id" => $this->score->getId(),
            );

            $this->id = $this->save($data);
        }
    }

    static function getAll($db) {
        $model = new model('players', $db);

        $players = $model->readAll();

        return $players;
    }

    static function load($db, $player) {
        $playerLoaded = new player($db, null);

        $loadedData = $playerLoaded->readById($player);

        $playerLoaded->name = $loadedData["name"];
        $playerLoaded->id = $loadedData["id"];
        $playerLoaded->score = score::load($db, $loadedData["score_id"]);

        if ($loadedData) {
            return $playerLoaded;
        }
        else {
            return false;
        }
    }

    public function getName() {
        return $this->name;
    }

    public function getId() {
        return $this->id;
    }

    public function incrementScore() {
        $this->score->value = $this->score->value + 5;

        $this->score->increment();
    }
}

?>
