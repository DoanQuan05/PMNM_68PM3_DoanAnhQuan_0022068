<?php
require_once '../app/core/DB.php';
class sinhvienModel {
    private $conn;
    public function __construct() {
        $this->conn = ConnectDB::Connect();
    }

    public function getAllSinhvien() {
        $stmt = $this->conn->prepare("SELECT s.*, l.TenLop FROM sinhvien s LEFT JOIN lophoc l ON s.MaLop = l.MaLop");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getById($id) {
        $stmt = $this->conn->prepare("SELECT * FROM sinhvien WHERE id = :id");
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function create($HoTen, $GioiTinh, $MSSV, $MaLop = null) {
        $query = "INSERT INTO sinhvien (HoTen, GioiTinh, MSSV, MaLop) VALUES (:HoTen, :GioiTinh, :MSSV, :MaLop)";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':HoTen', $HoTen);
        $stmt->bindParam(':GioiTinh', $GioiTinh);
        $stmt->bindParam(':MSSV', $MSSV);
        $stmt->bindParam(':MaLop', $MaLop);
        return $stmt->execute();
    }

    public function update($id, $HoTen, $GioiTinh, $MSSV, $MaLop = null) {
        $query = "UPDATE sinhvien SET HoTen=:HoTen, GioiTinh=:GioiTinh, MSSV=:MSSV, MaLop=:MaLop WHERE id=:id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':HoTen', $HoTen);
        $stmt->bindParam(':GioiTinh', $GioiTinh);
        $stmt->bindParam(':MSSV', $MSSV);
        $stmt->bindParam(':MaLop', $MaLop);
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);
        return $stmt->execute();
    }

    public function delete($id) {
        $stmt = $this->conn->prepare("DELETE FROM sinhvien WHERE id = :id");
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);
        return $stmt->execute();
    }

    public function getSinhvienById($id) {
        return $this->getById($id);
    }

    public function paging($limit = 5, $offset = 0, $search = "") {
        $limit = (int)$limit;
        $offset = (int)$offset;
        $query = "SELECT s.*, l.TenLop FROM sinhvien s LEFT JOIN lophoc l ON s.MaLop = l.MaLop LIMIT :limit OFFSET :offset";
        $stmt = $this->conn->prepare($query);
        $stmt->bindValue(':limit', $limit, PDO::PARAM_INT);
        $stmt->bindValue(':offset', $offset, PDO::PARAM_INT);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $countQuery = $this->conn->prepare("SELECT COUNT(*) FROM sinhvien");
        $countQuery->execute();
        $totalRecord = $countQuery->fetchColumn();
        $totalPage = ceil($totalRecord / $limit);

        return ["sinhvien" => $result, "totalPage" => $totalPage];
    }
}
?>
