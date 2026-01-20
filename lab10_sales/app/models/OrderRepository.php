<?php

class OrderRepository {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    public function all() {
        $stmt = $this->pdo->query("
            SELECT o.id, o.order_date, o.total, c.full_name
            FROM orders o
            JOIN customers c ON o.customer_id = c.id
            ORDER BY o.id DESC
        ");
        return $stmt->fetchAll();
    }

    public function createOrder($customer_id, $items) {
        // Tạo order
        $stmt = $this->pdo->prepare("
            INSERT INTO orders (customer_id, order_date, total)
            VALUES (?, CURDATE(), 0)
        ");
        $stmt->execute([$customer_id]);

        $order_id = $this->pdo->lastInsertId();
        $total = 0;

        foreach ($items as $product_id => $qty) {
            if ($qty <= 0) continue;

            // Lấy giá sản phẩm
            $stmt = $this->pdo->prepare("SELECT price FROM products WHERE id = ?");
            $stmt->execute([$product_id]);
            $price = $stmt->fetchColumn();

            $lineTotal = $price * $qty;
            $total += $lineTotal;

            // Lưu order_items
            $stmt = $this->pdo->prepare("
                INSERT INTO order_items (order_id, product_id, qty, price)
                VALUES (?, ?, ?, ?)
            ");
            $stmt->execute([$order_id, $product_id, $qty, $price]);
        }

        // Update total
        $stmt = $this->pdo->prepare("
            UPDATE orders SET total = ? WHERE id = ?
        ");
        $stmt->execute([$total, $order_id]);
    }
}
