<?php

include_once("user.php");
include_once("category.php");
include_once("transaction.php");
include_once("schedule.php");

define('DB_SERVER', '');
define('DB_USERNAME', '');
define('DB_PASSWORD', '');
define('DB_NAME', '');

class DatabaseManager {
    private mysqli|null $database = null;

    public function __construct() {
        $this->database = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
    }

    public function getUserByMail(string $mail): User|null{
        $result = $this->executeQuery("SELECT * FROM utilisateurs WHERE email='{$mail}'");
        if($result === null){return null;}
        if(mysqli_num_rows($result) === 0 || $result === false){
            return null;
        }
        $user = mysqli_fetch_array($result);
        return new User($user['id'], $user['name'], $user['mail'], $user['hpassword'], $this);
    }

    public function getCategories(int $user_id): array|null {
        $result = $this->executeQuery("SELECT * FROM categories WHERE user_id={$user_id}");
        if($result === null){return null;}
        $categories = array();
        while($row = mysqli_fetch_array($result)){
            $categories[$row["name"]] = new Category($row["id"], $row["name"], $row["user_id"], $row["amount"], $this);
        }
        return $categories;
    }

    public function saveCategory(Category $category): null|bool {
        return $this->executeQuery("UPDATE categories SET name={$category->getName()}, amount={$category->getAmount()} WHERE id={$category->getId()}");
    }

    public function getTransactionsByUser(int $user_id): null|array {
        $result = $this->executeQuery("SELECT * FROM transactions WHERE user_id={$user_id}");
        if($result === null){return null;}
        $transactions = array();
        while($row = mysqli_fetch_array($result)){
            $transactions[$row["id"]] = new Transaction($row["id"], $row["name"], $row["transaction_date"], $row["amount"], $row["category_id"], $user_id, $this);
        }
        return $transactions;
    }

    public function getTransactionsByCategory(int $category_id): null|array {
        $result = $this->executeQuery("SELECT * FROM transactions WHERE category_id={$category_id}");
        if($result === null){return null;}
        $transactions = array();
        while($row = mysqli_fetch_array($result)){
            $transactions[$row["id"]] = new Transaction($row["id"], $row["name"], $row["transaction_date"], $row["amount"], $category_id, $row["user_id"], $this);
        }
        return $transactions;
    }

    public function getSchedulesByUser(int $user_id): null|array {
        $result = $this->executeQuery("SELECT * FROM schedules WHERE user_id={$user_id}");
        if($result === null){return null;}
        $schedules = array();
        while($row = mysqli_fetch_array($result)){
            $schedules[$row["id"]] = new Schedule($row["id"], $row["name"], $row["amount"], $row["day"], $user_id, $row["user_id"], $this);
        }
        return $schedules;
    }

    public function getSchedulesByCategory(int $category_id): null|array {
        $result = $this->executeQuery("SELECT * FROM schedules WHERE category_id={$category_id}");
        if($result === null){return null;}
        $schedules = array();
        while($row = mysqli_fetch_array($result)){
            $schedules[$row["id"]] = new Schedule($row["id"], $row["name"], $row["amount"], $row["day"], $category_id, $row["user_id"], $this);
        }
        return $schedules;
    }

    private function executeQuery(string $query): null|bool|mysqli_result {
        if($this->database === false){return null;}
        return mysqli_query($this->database, $query);
    }
}