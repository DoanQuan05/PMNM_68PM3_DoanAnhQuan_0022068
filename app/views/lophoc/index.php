<style>
    table { border-collapse: collapse; width: 100%; }
    th, td { border: 1px solid #ddd; padding: 10px 14px; text-align: left; }
    th { background-color: #f2f2f2; font-weight: 600; }
    tr:hover { background-color: #f9f9f9; }
    .btn { display: inline-block; padding: 6px 14px; text-decoration: none; color: white; background-color: #007bff; border-radius: 4px; font-size: 13px; }
    .btn-success { background-color: #28a745; }
    .btn-warning { background-color: #ffc107; color: #212529; }
    .btn-danger { background-color: #dc3545; }
    .badge { display: inline-block; padding: 3px 10px; border-radius: 12px; font-size: 12px; font-weight: 600; background: #667eea; color: white; }
</style>

<h2>Danh sách lớp học</h2>
<a href="/lophoc/create" class="btn btn-success" style="margin-bottom:14px;display:inline-block">+ Thêm lớp học</a>

<table>
    <thead>
        <tr>
            <th>STT</th>
            <th>Mã lớp</th>
            <th>Tên lớp</th>
            <th>Ghi chú</th>
            <th>Thao tác</th>
        </tr>
    </thead>
    <tbody>
        <?php if (!empty($lophoc)): ?>
            <?php foreach ($lophoc as $i => $lop): ?>
                <tr>
                    <td><?php echo $i + 1; ?></td>
                    <td><span class="badge"><?php echo htmlspecialchars($lop['MaLop']); ?></span></td>
                    <td><?php echo htmlspecialchars($lop['TenLop']); ?></td>
                    <td><?php echo htmlspecialchars($lop['GhiChu'] ?? ''); ?></td>
                    <td>
                        <a href="/lophoc/edit/<?php echo $lop['id']; ?>" class="btn btn-warning">Sửa</a>
                        <a href="/lophoc/delete/<?php echo $lop['id']; ?>" class="btn btn-danger" onclick="return confirm('Xóa lớp này?')">Xóa</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        <?php else: ?>
            <tr><td colspan="5" style="text-align:center">Không có dữ liệu</td></tr>
        <?php endif; ?>
    </tbody>
</table>
