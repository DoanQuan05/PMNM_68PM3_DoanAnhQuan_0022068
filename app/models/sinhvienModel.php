<?php
    require_once '../app/core/DB.php';
    class sinhvienModel {
        private $conn;
        public function __construct() {
            $this -> conn = ConnectDB::Connect();
        }

        public function getAllSinhvien() {
            $query = "SELECT * FROM sinhvien";
            $stmt = $this -> conn -> prepare($query);
            $stmt -> execute();
            return $stmt -> fetchAll(PDO::FETCH_ASSOC);
        }
        public function create($HoTen, $GioiTinh, $MSSV) {
            $query = "INSERT INTO sinhvien (HoTen, GioiTinh, MSSV) VALUES (:HoTen, :GioiTinh, :MSSV)";
            $stmt = $this -> conn -> prepare($query);
            $stmt -> bindParam(':HoTen', $HoTen);
            $stmt -> bindParam(':GioiTinh', $GioiTinh);
            $stmt -> bindParam(':MSSV', $MSSV);
            if($stmt -> execute()) {
                return true;
            } else {
                return false;
            }
        }
        public function paging($limit = 5, $offset = 0, $search = "") {
            $limit = (int)$limit;
            $offset = (int)$offset;
            $query = "SELECT * FROM sinhvien LIMIT :limit OFFSET :offset";
            $stmt = $this->conn->prepare($query);
            $stmt->bindValue(':limit', $limit, PDO::PARAM_INT);
            $stmt->bindValue(':offset', $offset, PDO::PARAM_INT);
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

            $selectAllQuery = $this->conn->prepare("SELECT COUNT(*) FROM sinhvien");
            $selectAllQuery->execute();
            $totalRecord = $selectAllQuery->fetchColumn();
            $totalPage = ceil($totalRecord / $limit);

            return ["sinhvien" => $result, "totalPage" => $totalPage];
        }
    }
    
?>