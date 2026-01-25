<?php

class Controller {
    protected $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    protected function view($path, $data = []) {
        extract($data);
        require __DIR__ . '/../app/Views/' . $path . '.php';
    }
}
