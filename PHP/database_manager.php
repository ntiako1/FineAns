<?php
include_once("./config.php");

class DatabaseManager {
    private static $instance = null;
    private mysqli|null $database = null;

    public function __construct() {
        $this->instance = $this;
        $this->database = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
    }

    public function getUserByMail(string $mail): bool|mysqli_result|null{
        if($this->database === false){return null;}
        $query = "SELECT * FROM utilisateurs WHERE email='{$mail}'";
        return $this->database->query($query);
    }

    public function getUserByName(string $name): bool|mysqli_result|null{
        if($this->database === false){return null;}
        $query = "SELECT * FROM utilisateurs WHERE name='{$name}'";
        return $this->database->query($query);
    }
}