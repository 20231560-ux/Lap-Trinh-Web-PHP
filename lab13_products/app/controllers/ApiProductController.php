<?php
require_once __DIR__ . '/../models/Product.php';

class ApiProductController {
    private $model;

    public function __construct($pdo) {
        $this->model = new Product($pdo);
    }

    public function search() {
        header('Content-Type: application/json; charset=utf-8');
        try {
            $q = $_GET['q'] ?? '';
            $data = $this->model->search($q);
            echo json_encode([
                'success' => true,
                'message' => 'OK',
                'data' => $data
            ]);
        } catch (Exception $e) {
            http_response_code(500);
            echo json_encode([
                'success' => false,
                'message' => 'Server error',
                'data' => null
            ]);
        }
    }

    public function delete() {
        header('Content-Type: application/json; charset=utf-8');
        try {
            $id = $_POST['id'] ?? 0;
            if (!$id) {
                throw new Exception('Thiếu ID');
            }

            $this->model->delete($id);
            echo json_encode([
                'success' => true,
                'message' => 'Đã xóa',
                'data' => null
            ]);
        } catch (Exception $e) {
            http_response_code(400);
            echo json_encode([
                'success' => false,
                'message' => $e->getMessage(),
                'data' => null
            ]);
        }
    }
}
