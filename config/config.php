<?php
class Database {
    private $host = "127.0.0.1:3306";
    private $db_name = "db_up_var3";
    private $username = "root";
    private $password = "";
    public $conn;

    public function getConnection() {
        $this->conn = null;
        try {
            $this->conn = new PDO(
                "mysql:host=" . $this->host . ";dbname=" . $this->db_name, 
                $this->username, 
                $this->password
            );
            $this->conn->exec("set names utf8");
        } catch(PDOException $e) {
            error_log("DB Error: " . $e->getMessage());
        }
        return $this->conn;
    }
}
?>