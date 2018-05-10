<?php

require_once('../model/model.php');

class board extends model {
    public $id = NULL;
    public $cells = NULL;
    private $combo = NULL;

    public function __construct($db, $id = NULL) {
        parent::__construct('boards', $db);

        $this->combo = array(
            array("0,0", "0,1", "0,2"),
            array("0,1", "1,1", "2,1"),
            array("0,2", "1,2", "2,2"),
            array("1,0", "1,1", "1,2"),
            array("2,0", "2,1", "2,2"),
            array("0,0", "1,1", "2,2"),
            array("0,2", "1,1", "2,0")
        );

        if(empty($id)) {
            $this->cells = array(array(0,0,0), array(0,0,0), array(0,0,0));
            $data = array(
                "cells" => json_encode($this->cells)
            );

            $this->id = $this->save($data);
        }
    }

    static function load($db, $board) {
        $boardLoaded = new board($db, $board);

        $loadedData = $boardLoaded->readById($board);

        $boardLoaded->cells = json_decode($loadedData["cells"]);
        $boardLoaded->id = $loadedData["id"];

        if ($loadedData) {
            return $boardLoaded;
        }
        else {
            return false;
        }
    }

    public function getId() {
        return $this->id;
    }

    public function setValue($value, $cell) {
        $offset = explode(",", $cell);

        $this->cells[$offset[0]][$offset[1]] = $value;

        $data = array(
            "cells" => json_encode($this->cells)
        );

        $this->update($this->id, $data);
    }

    public function getTriplet() {
        foreach ($this->combo as $key => $combo) {
            $arr1 = explode(",", $combo[0]);
            $arr2 = explode(",", $combo[1]);
            $arr3 = explode(",", $combo[2]);

            if ($this->cells[$arr1[0]][$arr1[1]] === 0) {
                continue;
            }

            if($this->cells[$arr1[0]][$arr1[1]] === $this->cells[$arr2[0]][$arr2[1]] &&
                $this->cells[$arr2[0]][$arr2[1]] === $this->cells[$arr3[0]][$arr3[1]]) {
                return $this->cells[$arr2[0]][$arr2[1]];
            }
        }

        return false;
    }
}

?>
