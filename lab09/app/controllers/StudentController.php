<?php

class StudentController extends BaseController {

    public function index() {
        $this->view('students/index');
    }

    public function api() {
        $action = $_GET['action'] ?? '';

        switch ($action) {
            case 'list':
                $this->listStudents();
                break;

            case 'create':
                $this->createStudent();
                break;

            case 'delete':
                $this->deleteStudent();
                break;

            default:
                echo json_encode(["success" => false, "message" => "Action không hợp lệ"]);
        }
    }

    public function listStudents() {
        header('Content-Type: application/json');

        $db = Database::getInstance()->getConnection();

        $sql = "SELECT * FROM students ORDER BY id DESC";
        $result = $db->query($sql);

        $data = [];
        while ($row = $result->fetch_assoc()) {
            $data[] = $row;
        }

        echo json_encode([
            "success" => true,
            "data" => $data
        ]);
    }

    public function createStudent() {
        header('Content-Type: application/json');

        $db = Database::getInstance()->getConnection();

        $code = $_POST['code'] ?? '';
        $full_name = $_POST['full_name'] ?? '';
        $email = $_POST['email'] ?? '';
        $dob = $_POST['dob'] ?? '';

        if (!$code || !$full_name || !$email) {
            echo json_encode(["success" => false, "message" => "Thiếu dữ liệu"]);
            return;
        }

        $sql = "INSERT INTO students(code, full_name, email, dob)
                VALUES('$code', '$full_name', '$email', '$dob')";

        if ($db->query($sql)) {
            echo json_encode(["success" => true]);
        } else {
            echo json_encode(["success" => false, "message" => "Lỗi thêm sinh viên"]);
        }
    }

    public function deleteStudent() {
        header('Content-Type: application/json');

        $db = Database::getInstance()->getConnection();
        $id = $_GET['id'] ?? 0;

        $sql = "DELETE FROM students WHERE id = $id";

        if ($db->query($sql)) {
            echo json_encode(["success" => true]);
        } else {
            echo json_encode(["success" => false]);
        }
    }
}
