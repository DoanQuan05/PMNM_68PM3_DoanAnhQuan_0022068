<style>
    .form-card { background: white; border-radius: 10px; padding: 30px; max-width: 500px; box-shadow: 0 2px 12px rgba(0,0,0,0.08); }
    .form-card h3 { color: white; background: #28a745; padding: 14px 20px; border-radius: 6px; margin: -30px -30px 24px; }
    .form-group { margin-bottom: 18px; }
    .form-group label { display: block; margin-bottom: 6px; font-size: 13px; font-weight: 600; color: #4a5568; }
    .form-group input, .form-group select { width: 100%; padding: 10px 12px; border: 1px solid #e2e8f0; border-radius: 6px; font-size: 14px; outline: none; }
    .form-group input:focus, .form-group select:focus { border-color: #28a745; box-shadow: 0 0 0 3px rgba(40,167,69,0.15); }
    .btn { display: inline-block; padding: 10px 20px; color: white; border: none; border-radius: 6px; cursor: pointer; font-size: 14px; text-decoration: none; }
    .btn-success { background: #28a745; }
    .btn-secondary { background: #6c757d; margin-left: 8px; }
</style>

<div class="form-card">
    <h3>Thêm sinh viên mới</h3>
    <form action="/sinhvien/store" method="POST">
        <div class="form-group">
            <label>MSSV</label>
            <input type="text" name="MSSV" placeholder="Mã số sinh viên" required>
        </div>
        <div class="form-group">
            <label>Họ tên</label>
            <input type="text" name="HoTen" placeholder="Họ và tên" required>
        </div>
        <div class="form-group">
            <label>Giới tính</label>
            <select name="GioiTinh" required>
                <option value="">-- Chọn giới tính --</option>
                <option value="Nam">Nam</option>
                <option value="Nu">Nữ</option>
            </select>
        </div>
        <div class="form-group">
            <label>Lớp học</label>
            <select name="MaLop">
                <option value="">-- Chưa phân lớp --</option>
                <?php foreach ($lophoc as $lop): ?>
                    <option value="<?php echo htmlspecialchars($lop['MaLop']); ?>">
                        <?php echo htmlspecialchars($lop['MaLop'] . ' - ' . $lop['TenLop']); ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>
        <button type="submit" class="btn btn-success">Lưu sinh viên</button>
        <a href="/sinhvien/index" class="btn btn-secondary">Hủy</a>
    </form>
</div>
