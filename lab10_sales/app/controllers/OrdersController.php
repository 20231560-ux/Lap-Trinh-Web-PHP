<?php

require_once __DIR__ . '/../core/Controller.php';
require_once __DIR__ . '/../models/OrderRepository.php';
require_once __DIR__ . '/../models/ProductRepository.php';
require_once __DIR__ . '/../models/Customer.php';

class OrdersController extends Controller {

    private $orders;
    private $products;
    private $customers;

    public function __construct($pdo) {
        parent::__construct($pdo);
        $this->orders = new OrderRepository($pdo);
        $this->products = new ProductRepository($pdo);
        $this->customers = new Customer($pdo);
    }

    public function index() {
        $orders = $this->orders->all();
        $this->view('orders/index', compact('orders'));
    }

    public function create() {
        $products = $this->products->getAll();
        $customers = $this->customers->all();
        $this->view('orders/create', compact('products', 'customers'));
    }

    public function store() {
        $customer_id = $_POST['customer_id'];
        $items = $_POST['items'];

        $this->orders->createOrder($customer_id, $items);

        header("Location: /Labs/lab10_sales/public/index.php?controller=orders&action=index");
        exit;
    }
}
