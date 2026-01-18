<?php

class BaseController {

    protected function view($path, $data = []) {
        extract($data);
        require __DIR__ . '/../views/' . $path . '.php';
    }
}
