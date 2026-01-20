<?php

class Customer {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    public function all() {
        $stmt = $this->pdo->prepare("SELECT * FROM customers");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function create($data) {
        $stmt = $this->pdo->prepare(
            "INSERT INTO customers (full_name, email, phone) VALUES (?, ?, ?)"
        );
        return $stmt->execute([
            $data['full_name'],
            $data['email'],
            $data['phone']
        ]);
    }
}
