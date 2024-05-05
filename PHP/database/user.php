<?php
include_once("database_manager.php");

class User {
    private int $id;
    private string $name;
    private string $email;
    private string $hpassword;
    private DatabaseManager $databaseManager;

    private array $categories;
    private array $transactions;
    private array $schedules;

    public function __construct(int $id, string $name, string $email, string $hpassword, DatabaseManager $databaseManager) {
        $this->id = $id;
        $this->name = $name;
        $this->email = $email;
        $this->hpassword = $hpassword;
        $this->databaseManager = $databaseManager;

        $this->categories = $databaseManager->getCategories($id);
        $this->transactions = $databaseManager->getTransactionsByUser($id);
        $this->schedules = $databaseManager->getSchedulesByUser($id);
    }

    public function getName(): string {
        return $this->name;
    }

    public function getEmail(): string {
        return $this->email;
    }

    public function verifyPassword(string $password): bool {
        return $this->hpassword === hash('md5', $password);
    }

    public function getCategories(): array{
        return $this->categories;
    }

    public function getCategory(string $name): Category|null {
        return $this->getCategories()[$name] ?? null;
    }

    public function getTransactions(): array {
        return $this->transactions;
    }
    public function getTransaction(int $id): Transaction|null {
        return $this->getTransactions()[$id] ?? null;
    }

    public function getSchedules(): array {
        return $this->schedules;
    }
    
    public function getSchedule(int $id): Schedule|null {
        return $this->getSchedules()[$id] ?? null;
    }
}