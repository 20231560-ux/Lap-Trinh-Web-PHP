<?php

class Category {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    public function getAll($q = '') {
        if ($q) {
            $stmt = $this->pdo->prepare(
                "SELECT * FROM categories WHERE name LIKE :q ORDER BY id DESC"
            );
            $stmt->execute(['q' => "%$q%"]);
        } else {
            $stmt = $this->pdo->query("SELECT * FROM categories ORDER BY id DESC");
        }

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function insert($name) {
        $stmt = $this->pdo->prepare(
            "INSERT INTO categories(name) VALUES(:name)"
        );
        return $stmt->execute(['name' => $name]);
    }

    public function findById($id) {
        $stmt = $this->pdo->prepare(
            "SELECT * FROM categories WHERE id = :id"
        );
        $stmt->execute(['id' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function update($id, $name) {
        $stmt = $this->pdo->prepare(
            "UPDATE categories SET name = :name WHERE id = :id"
        );
        return $stmt->execute([
            'name' => $name,
            'id' => $id
        ]);
    }

    public function delete($id) {
        $stmt = $this->pdo->prepare(
            "DELETE FROM categories WHERE id = :id"
        );
        return $stmt->execute(['id' => $id]);
    }
}
