<?php
include_once("database_manager.php");

class Schedule {
    private int $id;
    private string $name;
    private float $amount;
    private int $day;
    private int $category_id;
    private int $user_id;
    private DatabaseManager $databaseManager;

    public function __construct(int $id, string $name, float $amount, int $day, int $category_id, int $user_id, DatabaseManager $databaseManager) {
        $this->id = $id;
        $this->name = $name;
        $this->amount = $amount;
        $this->day = $day;
        $this->category_id = $category_id;
        $this->user_id = $user_id;
        $this->databaseManager = $databaseManager;
    }

    public function getId(): int {
        return $this->id;
    }

    public function getName(): string {
        return $this->name;
    }

    public function getAmount(): int {
        return $this->amount;
    }

    public function getDay(): int {
        return $this->day;
    }

    public function getCategoryId(): int {
        return $this->category_id;
    }
    
    public function getUserId(): int {
        return $this->user_id;
    }
}