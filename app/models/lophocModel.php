<?php
require_once '../app/core/DB.php';
class lophocModel {
    private $conn;
    public function __construct() {
        $this->conn = ConnectDB::Connect();
    }

    public function getAll() {
        $stmt = $this->conn->prepare("SELECT * FROM lophoc ORDER BY MaLop");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getById($id) {
        $stmt = $this->conn->prepare("SELECT * FROM lophoc WHERE id = :id");
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function create($MaLop, $TenLop, $GhiChu) {
        $stmt = $this->conn->prepare("INSERT INTO lophoc (MaLop, TenLop, GhiChu) VALUES (:MaLop, :TenLop, :GhiChu)");
        $stmt->bindParam(':MaLop', $MaLop);
        $stmt->bindParam(':TenLop', $TenLop);
        $stmt->bindParam(':GhiChu', $GhiChu);
        return $stmt->execute();
    }

    public function update($id, $MaLop, $TenLop, $GhiChu) {
        $stmt = $this->conn->prepare("UPDATE lophoc SET MaLop=:MaLop, TenLop=:TenLop, GhiChu=:GhiChu WHERE id=:id");
        $stmt->bindParam(':MaLop', $MaLop);
        $stmt->bindParam(':TenLop', $TenLop);
        $stmt->bindParam(':GhiChu', $GhiChu);
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);
        return $stmt->execute();
    }

    public function delete($id) {
        $stmt = $this->conn->prepare("DELETE FROM lophoc WHERE id = :id");
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);
        return $stmt->execute();
    }
}
?>
