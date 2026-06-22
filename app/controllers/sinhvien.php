<?php
require_once '../app/core/Controller.php';
class sinhvien extends Controller {

    public function index($limit = 5, $offset = 0, $search = '') {
        $sinhvienModel = $this->model('sinhvienModel');
        $result = $sinhvienModel->paging($limit, $offset, $search);
        $sinhvien = $result['sinhvien'] ?? [];
        $totalPage = $result['totalPage'] ?? 1;
        $this->view('sinhvien/index', ['sinhvien' => $sinhvien, 'totalPage' => $totalPage], 'Danh sách sinh viên');
    }

    public function create() {
        $lophocModel = $this->model('lophocModel');
        $lophoc = $lophocModel->getAll();
        $this->view('sinhvien/create', ['lophoc' => $lophoc], 'Thêm sinh viên');
    }

    public function store() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $HoTen   = $_POST['HoTen'] ?? '';
            $GioiTinh = $_POST['GioiTinh'] ?? '';
            $MSSV    = $_POST['MSSV'] ?? '';
            $MaLop   = $_POST['MaLop'] ?: null;
            $sinhvienModel = $this->model('sinhvienModel');
            if ($sinhvienModel->create($HoTen, $GioiTinh, $MSSV, $MaLop)) {
                header('Location: /sinhvien/index');
            } else {
                echo "<script>alert('Lỗi: MSSV đã tồn tại!'); window.history.back();</script>";
            }
            exit();
        }
    }

    public function edit($id) {
        $sinhvienModel = $this->model('sinhvienModel');
        $lophocModel   = $this->model('lophocModel');
        $sinhvien = $sinhvienModel->getSinhvienById($id);
        $lophoc   = $lophocModel->getAll();
        if ($sinhvien) {
            $this->view('sinhvien/edit', ['sinhvien' => $sinhvien, 'lophoc' => $lophoc], 'Sửa sinh viên');
        } else {
            echo "Không tìm thấy sinh viên!";
        }
    }

    public function update($id) {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $HoTen    = $_POST['HoTen'] ?? '';
            $GioiTinh = $_POST['GioiTinh'] ?? '';
            $MSSV     = $_POST['MSSV'] ?? '';
            $MaLop    = $_POST['MaLop'] ?: null;
            $sinhvienModel = $this->model('sinhvienModel');
            if ($sinhvienModel->update($id, $HoTen, $GioiTinh, $MSSV, $MaLop)) {
                header('Location: /sinhvien/index');
            } else {
                echo "<script>alert('Lỗi cập nhật!'); window.history.back();</script>";
            }
            exit();
        }
    }

    public function delete($id) {
        $sinhvienModel = $this->model('sinhvienModel');
        $sinhvienModel->delete($id);
        header('Location: /sinhvien/index');
        exit();
    }
}
?>
