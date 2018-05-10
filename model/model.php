<?php

class model {
    private $conn = NULL;
    private $table = NULL;

    public function __construct($table, $db) {
        $this->conn = $db->conn;
        $this->table = $table;

        $this->conn;
    }

    public function save($assoc) {
        $columns = implode(', ',array_keys($assoc));
        $values = array_values($assoc);
        $holders = '';

        foreach ($assoc as $key => $value) {
            $holders .= '?,';
        }

        $holders = rtrim($holders, ',');

        $stmt = $this->conn->prepare("INSERT INTO $this->table ($columns) VALUES ($holders)");
        $stmt->execute($values);

        return $this->conn->lastInsertId();
    }

    public function readAll() {
        $stmt = $this->conn->prepare("SELECT * FROM $this->table");
        $stmt->execute();

        $ret = array();

        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
            array_push($ret, $row);
        }

        return $ret;
    }

    public function readById($id) {
        $stmt = $this->conn->prepare("SELECT * FROM $this->table WHERE id=$id");
        $stmt->execute();

        $item = $stmt->fetch();

        return $item;
    }

    public function update($id, $assoc) {
        $placeholders = '';

        foreach ($assoc as $key => $value) {
            $placeholders .= $key . '=:' . $key . ',';
        }

        // Remueve las ultimas comas al final.
        $placeholders = rtrim($placeholders, ',');

        $stmt = $this->conn->prepare("UPDATE $this->table SET $placeholders WHERE id=$id");
        $stmt->execute($assoc);

        return $this->readById($id);
    }
}

?>
