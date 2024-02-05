<?php
class Database {

    private static $instance = null;
    private $conn;
    private $servername;
    private $username;
    private $password;
    private $dbname;

    public function __construct($servername, $username, $password, $dbname) {
        $this->servername = $servername;
        $this->username = $username;
        $this->password = $password;
        $this->dbname = $dbname;

        if(self::$instance === null){
            try {
                self::$instance = new PDO("mysql:host=$this->servername;dbname=$this->dbname", $this->username, $this->password);
                self::$instance->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (PDOException $e) {
                die("Connection failed: " . $e->getMessage());
            }
        }
    }

    public function getConnection() {
        return self::$instance;
    }

    public function prepare($query) {
        return $this->conn->prepare($query);
    }

    public function query($sql) {
        return $this->conn->query($sql);
    }
}
