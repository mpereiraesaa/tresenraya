<?php

require_once('../model/model.php');

class score extends model {
    public $id = NULL;
    public $value = NULL;
    public $timestamp = NULL;

    public function __construct($db, $id = NULL) {
        parent::__construct('scores', $db);

        if(empty($id)) {
            $this->value = 0;
            $this->timestamp = date("Y-m-d H:i:s");

            $data = array(
                "value" => $this->value,
                "timestamp" => $this->timestamp
            );

            $this->id = $this->save($data);
        }
    }

    static function load($db, $score) {
        $scoreLoaded = new score($db, null);

        $loadedData = $scoreLoaded->readById($score);

        $scoreLoaded->value = $loadedData["value"];
        $scoreLoaded->id = $loadedData["id"];
        $scoreLoaded->timestamp = $loadedData["timestamp"];

        if ($loadedData) {
            return $scoreLoaded;
        }
        else {
            return false;
        }
    }

    public function increment(){
        $this->timestamp = date("Y-m-d H:i:s");

        $data = array(
            "value" => $this->value,
            "timestamp" => $this->timestamp
        );

        $this->update($this->id, $data);
    }

    public function getId() {
        return $this->id;
    }
}

?>
