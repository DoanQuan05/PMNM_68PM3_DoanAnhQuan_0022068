<style>
    .form-card { background: white; border-radius: 10px; padding: 30px; max-width: 500px; box-shadow: 0 2px 12px rgba(0,0,0,0.08); }
    .form-card h3 { background: #ffc107; color: #212529; padding: 14px 20px; border-radius: 6px; margin: -30px -30px 24px; }
    .form-group { margin-bottom: 18px; }
    .form-group label { display: block; margin-bottom: 6px; font-size: 13px; font-weight: 600; color: #4a5568; }
    .form-group input, .form-group select { width: 100%; padding: 10px 12px; border: 1px solid #e2e8f0; border-radius: 6px; font-size: 14px; outline: none; }
    .form-group input:focus, .form-group select:focus { border-color: #ffc107; box-shadow: 0 0 0 3px rgba(255,193,7,0.2); }
    .btn { display: inline-block; padding: 10px 20px; color: white; border: none; border-radius: 6px; cursor: pointer; font-size: 14px; text-decoration: none; }
    .btn-warning { background: #ffc107; color: #212529; }
    .btn-secondary { background: #6c757d; margin-left: 8px; }
</style>

<div class="form-card">
    <h3>Sửa thông tin sinh viên</h3>
    <form action="/sinhvien/update/<?php echo $sinhvien['id']; ?>" method="POST">
        <div class="form-group">
            <label>MSSV</label>
            <input type="text" name="MSSV" value="<?php echo htmlspecialchars($sinhvien['MSSV']); ?>" required>
        </div>
        <div class="form-group">
            <label>Họ tên</label>
            <input type="text" name="HoTen" value="<?php echo htmlspecialchars($sinhvien['HoTen']); ?>" required>
        </div>
        <div class="form-group">
            <label>Giới tính</label>
            <select name="GioiTinh" required>
                <option value="">-- Chọn giới tính --</option>
                <option value="Nam" <?php echo ($sinhvien['GioiTinh'] === 'Nam') ? 'selected' : ''; ?>>Nam</option>
                <option value="Nu" <?php echo ($sinhvien['GioiTinh'] === 'Nu' || $sinhvien['GioiTinh'] === 'Nữ') ? 'selected' : ''; ?>>Nữ</option>
            </select>
        </div>
        <div class="form-group">
            <label>Lớp học</label>
            <select name="MaLop">
                <option value="">-- Chưa phân lớp --</option>
                <?php foreach ($lophoc as $lop): ?>
                    <option value="<?php echo htmlspecialchars($lop['MaLop']); ?>"
                        <?php echo ($sinhvien['MaLop'] === $lop['MaLop']) ? 'selected' : ''; ?>>
                        <?php echo htmlspecialchars($lop['MaLop'] . ' - ' . $lop['TenLop']); ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>
        <button type="submit" class="btn btn-warning">Cập nhật</button>
        <a href="/sinhvien/index" class="btn btn-secondary">Hủy</a>
    </form>
</div>
