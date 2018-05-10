<?php

class database {
    private $DB_host = "localhost";
    private $DB_user = "XXXXX";
    private $DB_pass = "XXXXX";
    private $DB_name = "XXXXX";
    public $conn;

    public function __construct() {
        try {
            $this->conn = new PDO("mysql:host={$this->DB_host};dbname={$this->DB_name}",$this->DB_user,$this->DB_pass);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }
        catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
}

?>
