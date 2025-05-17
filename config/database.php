<?php
class Database {
    private $host = "127.0.0.1";
    private $user = "root";
    private $password = "";
    private $database = "db_up_var3";
    public $conn;

    public function __construct() {
        $this->conn = new mysqli(
            $this->host, 
            $this->user, 
            $this->password, 
            $this->database
        );

        if ($this->conn->connect_error) {
            die("Connection failed: " . $this->conn->connect_error);
        }
        
        $this->conn->set_charset("utf8mb4");
    }

    public function query($sql, $params = []) {
        $stmt = $this->conn->prepare($sql);
        if (!$stmt) {
            die("Prepare failed: " . $this->conn->error);
        }

        if (!empty($params)) {
            $types = str_repeat('s', count($params));
            $stmt->bind_param($types, ...$params);
        }

        $stmt->execute();
        return $stmt;
    }

    public function __destruct() {
        $this->conn->close();
    }
}
?>