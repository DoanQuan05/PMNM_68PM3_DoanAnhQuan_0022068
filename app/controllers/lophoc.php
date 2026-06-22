<?php
require_once '../app/core/Controller.php';
class lophoc extends Controller {

    public function index() {
        $lophocModel = $this->model('lophocModel');
        $lophoc = $lophocModel->getAll();
        $this->view('lophoc/index', ['lophoc' => $lophoc], 'Danh sách lớp học');
    }

    public function create() {
        $this->view('lophoc/create', [], 'Thêm lớp học');
    }

    public function store() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $MaLop  = $_POST['MaLop'] ?? '';
            $TenLop = $_POST['TenLop'] ?? '';
            $GhiChu = $_POST['GhiChu'] ?? '';
            $lophocModel = $this->model('lophocModel');
            if ($lophocModel->create($MaLop, $TenLop, $GhiChu)) {
                header('Location: /lophoc/index');
            } else {
                echo "<script>alert('Lỗi: Mã lớp đã tồn tại!'); window.history.back();</script>";
            }
            exit();
        }
    }

    public function edit($id) {
        $lophocModel = $this->model('lophocModel');
        $lophoc = $lophocModel->getById($id);
        if ($lophoc) {
            $this->view('lophoc/edit', ['lophoc' => $lophoc], 'Sửa lớp học');
        } else {
            echo "Không tìm thấy lớp học!";
        }
    }

    public function update($id) {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $MaLop  = $_POST['MaLop'] ?? '';
            $TenLop = $_POST['TenLop'] ?? '';
            $GhiChu = $_POST['GhiChu'] ?? '';
            $lophocModel = $this->model('lophocModel');
            if ($lophocModel->update($id, $MaLop, $TenLop, $GhiChu)) {
                header('Location: /lophoc/index');
            } else {
                echo "<script>alert('Lỗi cập nhật!'); window.history.back();</script>";
            }
            exit();
        }
    }

    public function delete($id) {
        $lophocModel = $this->model('lophocModel');
        $lophocModel->delete($id);
        header('Location: /lophoc/index');
        exit();
    }
}
?>
