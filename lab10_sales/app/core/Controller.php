<?php
class Controller {
    protected $db;

    public function __construct() {
        $this->db = require __DIR__ . '/../config/db.php';
    }


    protected function view($path, $data = []) {
        extract($data);
        require __DIR__ . '/../views/' . $path . '.php';
    }

    protected function redirect($url) {
        header("Location: $url");
        exit;
    }
}
