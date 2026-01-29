<?php
class Product {
  private $pdo;

  public function __construct($pdo) {
    $this->pdo = $pdo;
  }

  public function countAll() {
    return $this->pdo->query("SELECT COUNT(*) FROM products")->fetchColumn();
  }

  public function getPage($limit, $offset) {
    $stmt = $this->pdo->prepare("SELECT * FROM products ORDER BY id DESC LIMIT ? OFFSET ?");
    $stmt->bindValue(1, $limit, PDO::PARAM_INT);
    $stmt->bindValue(2, $offset, PDO::PARAM_INT);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
  }

  public function create($data) {
    $stmt = $this->pdo->prepare("INSERT INTO products(name,price,image) VALUES (?,?,?)");
    return $stmt->execute([$data['name'], $data['price'], $data['image']]);
  }

  public function find($id) {
    $stmt = $this->pdo->prepare("SELECT * FROM products WHERE id=?");
    $stmt->execute([$id]);
    return $stmt->fetch(PDO::FETCH_ASSOC);
  }

  public function update($id, $data) {
    $stmt = $this->pdo->prepare("UPDATE products SET name=?, price=?, image=? WHERE id=?");
    return $stmt->execute([$data['name'], $data['price'], $data['image'], $id]);
  }

  public function delete($id) {
    $stmt = $this->pdo->prepare("DELETE FROM products WHERE id=?");
    return $stmt->execute([$id]);
  }
}
