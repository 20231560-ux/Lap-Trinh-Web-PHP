<?php

class Product {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    public function search($q = '') {
        if ($q === '') {
            $stmt = $this->pdo->prepare("SELECT * FROM products ORDER BY id DESC");
        } else {
            $stmt = $this->pdo->prepare(
                "SELECT * FROM products 
                 WHERE name LIKE :q OR code LIKE :q 
                 ORDER BY id DESC"
            );
            $stmt->bindValue(':q', "%$q%");
        }
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function delete($id) {
        $stmt = $this->pdo->prepare("DELETE FROM products WHERE id = ?");
        return $stmt->execute([$id]);
    }
}
