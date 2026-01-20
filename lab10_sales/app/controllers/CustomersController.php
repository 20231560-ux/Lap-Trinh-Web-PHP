<?php
require_once '../app/models/Customer.php';

class CustomersController extends Controller {

    public function index() {
        $model = new Customer($this->db);
        $customers = $model->all();
        $this->view('customers/index', [
            'customers' => $customers
        ]);
    }

    public function create() {
        $this->view('customers/create');
    }

    public function store() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $full_name = trim($_POST['full_name']);
            $email = trim($_POST['email']);
            $phone = trim($_POST['phone']);

            // Validate email
            if ($email && !filter_var($email, FILTER_VALIDATE_EMAIL)) {
                die("Email không hợp lệ");
            }

            $model = new Customer($this->db);
            $model->create([
                'full_name' => $full_name,
                'email' => $email,
                'phone' => $phone
            ]);

            header("Location: /Labs/lab10_sales/public/index.php?controller=customers&action=index");
exit;

        }
    }
}
