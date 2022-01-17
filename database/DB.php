<?php

class DB {
    private $host = "localhost";
    private $db_name = "online_store";
    private $username = "root";
    private $password = "";
    public static $conn = null;

    public static function connect() {
        if(is_null(self::$conn)) {
            self::$conn = new self();
        }

        return self::$conn;
    }

    public function __construct() {
        try{
            self::$conn = new PDO('mysql:host=' . $this->host . ';dbname=' . $this->db_name, $this->username, $this->password, [PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC]);
            self::$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            file_put_contents(__DIR__ ."/../readme/log.txt", date("Y-m-d H:i:s") . ": {$e->getMessage()}" . PHP_EOL, FILE_APPEND);
            die("Can not connect to database");
        }

        return self::$conn;  
    }

}



?>