<?php
require __DIR__ . '/../models/ProductRepository.php';

class ProductsController extends Controller {
    private $repo;

    public function __construct($pdo) {
        parent::__construct($pdo);
        $this->repo = new ProductRepository($pdo);
    }

    public function index() {
        $kw = $_GET['kw'] ?? '';
        $sort = $_GET['sort'] ?? 'created_at';
        $dir = $_GET['dir'] ?? 'desc';

        $products = $this->repo->getAll($kw, $sort, $dir);
        $this->view('products/index', compact('products', 'kw'));
    }

    public function create() {
        $this->view('products/create');
    }

    public function store() {
        $data = [
            'name' => $_POST['name'],
            'sku' => $_POST['sku'],
            'price' => max(0, floatval($_POST['price'])),
            'stock' => max(0, intval($_POST['stock']))
        ];

        $this->repo->create($data);
        $this->redirect("index.php?c=products");
    }

    public function edit() {
        $id = intval($_GET['id']);
        $product = $this->repo->find($id);
        $this->view('products/edit', compact('product'));
    }

    public function update() {
        $id = intval($_POST['id']);
        $data = [
            'name' => $_POST['name'],
            'sku' => $_POST['sku'],
            'price' => max(0, floatval($_POST['price'])),
            'stock' => max(0, intval($_POST['stock']))
        ];

        $this->repo->update($id, $data);
        $this->redirect("index.php?c=products");
    }

    public function delete() {
        $id = intval($_POST['id']);
        $this->repo->delete($id);
        $this->redirect("index.php?c=products");
    }
}
