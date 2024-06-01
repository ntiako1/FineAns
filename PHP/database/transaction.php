<?php
include_once("database_manager.php");

class Transaction {
    private int $id;
    private string $name;
    private string $date;
    private float $amount;
    private int $category_id;
    private int $user_id;
    private DatabaseManager $databaseManager;

    public function __construct(int $id, string $name, string $transaction_date, float $amount, int $category_id, int $user_id, DatabaseManager $databaseManager) {
        $this->id = $id;
        $this->name = $name;
        $this->transaction_date = $transaction_date;
        $this->amount = $amount;
        $this->category_id = $category_id;
        $this->user_id = $user_id;
        $this->date = $transaction_date;
        $this->databaseManager = $databaseManager;
    }

    public function getId(): int {
        return $this->id;
    }

    public function getName(): string {
        return $this->name;
    }
    
    public function getDate(): string {
        return $this->date;
    }
    
    public function getAmount(): float {
        return $this->amount;
    }
    
    public function getCategoryId(): int {
        return $this->category_id;
    }
    
    public function getUserId(): int {
        return $this->user_id;
    }
}