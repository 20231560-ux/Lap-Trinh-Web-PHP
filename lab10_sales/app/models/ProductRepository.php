<?php
class ProductRepository {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    public function getAll($kw = '', $sort = 'created_at', $dir = 'desc') {
        $whitelist = ['name', 'price', 'stock', 'created_at'];
        if (!in_array($sort, $whitelist)) $sort = 'created_at';
        $dir = $dir === 'asc' ? 'asc' : 'desc';

        $sql = "SELECT * FROM products
                WHERE name LIKE :kw OR sku LIKE :kw
                ORDER BY $sort $dir";

        $stmt = $this->pdo->prepare($sql);
        $stmt->execute(['kw' => "%$kw%"]);
        return $stmt->fetchAll();
    }

    public function create($data) {
        $stmt = $this->pdo->prepare(
            "INSERT INTO products(name, sku, price, stock)
             VALUES(:name, :sku, :price, :stock)"
        );
        return $stmt->execute($data);
    }

    public function find($id) {
        $stmt = $this->pdo->prepare("SELECT * FROM products WHERE id=?");
        $stmt->execute([$id]);
        return $stmt->fetch();
    }

    public function update($id, $data) {
        $data['id'] = $id;
        $stmt = $this->pdo->prepare(
            "UPDATE products SET name=:name, sku=:sku, price=:price, stock=:stock
             WHERE id=:id"
        );
        return $stmt->execute($data);
    }

    public function delete($id) {
        $stmt = $this->pdo->prepare("DELETE FROM products WHERE id=?");
        return $stmt->execute([$id]);
    }
}
