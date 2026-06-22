<style>
    table { border-collapse: collapse; width: 100%; }
    th, td { border: 1px solid #ddd; padding: 10px 14px; text-align: left; }
    th { background-color: #f2f2f2; font-weight: 600; }
    tr:hover { background-color: #f9f9f9; }
    .btn { display: inline-block; padding: 6px 14px; text-decoration: none; color: white; background-color: #007bff; border-radius: 4px; font-size: 13px; }
    .btn-success { background-color: #28a745; }
    .btn-warning { background-color: #ffc107; color: #212529; }
    .btn-danger { background-color: #dc3545; }
    .pagination { margin-top: 16px; display: flex; gap: 6px; }
</style>

<h2>Danh sách sinh viên</h2>
<a href="/sinhvien/create" class="btn btn-success" style="margin-bottom:14px;display:inline-block">+ Thêm mới</a>

<table>
    <thead>
        <tr>
            <th>STT</th>
            <th>MSSV</th>
            <th>Họ tên</th>
            <th>Giới tính</th>
            <th>Lớp học</th>
            <th>Thao tác</th>
        </tr>
    </thead>
    <tbody>
        <?php if (!empty($sinhvien)): ?>
            <?php foreach ($sinhvien as $i => $sv): ?>
                <tr>
                    <td><?php echo $i + 1; ?></td>
                    <td><?php echo htmlspecialchars($sv['MSSV']); ?></td>
                    <td><?php echo htmlspecialchars($sv['HoTen']); ?></td>
                    <td><?php echo htmlspecialchars($sv['GioiTinh']); ?></td>
                    <td>
                        <?php if (!empty($sv['TenLop'])): ?>
                            <span style="background:#667eea;color:white;padding:3px 10px;border-radius:12px;font-size:12px"><?php echo htmlspecialchars($sv['TenLop']); ?></span>
                        <?php else: ?>
                            <span style="color:#999;font-size:12px">Chưa phân lớp</span>
                        <?php endif; ?>
                    </td>
                    <td>
                        <a href="/sinhvien/edit/<?php echo $sv['id']; ?>" class="btn btn-warning">Sửa</a>
                        <a href="/sinhvien/delete/<?php echo $sv['id']; ?>" class="btn btn-danger" onclick="return confirm('Xóa sinh viên này?')">Xóa</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        <?php else: ?>
            <tr><td colspan="6" style="text-align:center">Không có dữ liệu</td></tr>
        <?php endif; ?>
    </tbody>
</table>

<div class="pagination">
    <?php
        $pageSize = 5;
        for ($i = 1; $i <= $totalPage; $i++) {
            $offset = ($i - 1) * $pageSize;
            echo "<a class='btn' href='/sinhvien/index/$pageSize/$offset'>$i</a>";
        }
    ?>
</div>
