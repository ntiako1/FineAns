<?php
require_once("database_manager.php");

class Category {
    private int $id;
    private string $name;
    private int $user_id;
    private float $amount;
    private DatabaseManager $databaseManager;
    private array $transactions;
    private array $schedules;

    public function __construct(int $id, string $name, int $user_id, float $amount, DatabaseManager $databaseManager) {
        $this->id = $id;
        $this->name = $name;
        $this->user_id = $user_id;
        $this->amount = $amount;
        $this->databaseManager = $databaseManager;
        
        $this->transactions = $databaseManager->getTransactionsByCategory($id);
        $this->schedules = $databaseManager->getSchedulesByCategory($id);
    }

    public function getId(): int {
        return $this->id;
    }

    public function getName(): string {
        return $this->name;
    }

    public function getUserID(): int {
        return $this->user_id;
    }

    public function getAmount(): float {
        return $this->amount;
    }

    public function addAmount(float $amount): void {
        $this->amount += $amount;
        $this->save();
    }

    public function removeAmount(float $amount): bool {
        if($this->amount-$amount < 0) { return false; }
        $this->amount -= $amount;
        $this->save();
        return true;
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

    private function save(): void {
        $this->databaseManager->saveCategory($this);
    }
}