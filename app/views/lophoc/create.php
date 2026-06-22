<style>
    .form-card { background: white; border-radius: 10px; padding: 30px; max-width: 500px; box-shadow: 0 2px 12px rgba(0,0,0,0.08); }
    .form-card h3 { margin-bottom: 24px; color: white; background: #28a745; padding: 14px 20px; border-radius: 6px; margin: -30px -30px 24px; }
    .form-group { margin-bottom: 18px; }
    .form-group label { display: block; margin-bottom: 6px; font-size: 13px; font-weight: 600; color: #4a5568; }
    .form-group label span { color: red; }
    .form-group input, .form-group textarea { width: 100%; padding: 10px 12px; border: 1px solid #e2e8f0; border-radius: 6px; font-size: 14px; outline: none; }
    .form-group input:focus, .form-group textarea:focus { border-color: #28a745; box-shadow: 0 0 0 3px rgba(40,167,69,0.15); }
    .btn { display: inline-block; padding: 10px 20px; color: white; border: none; border-radius: 6px; cursor: pointer; font-size: 14px; text-decoration: none; }
    .btn-success { background: #28a745; }
    .btn-secondary { background: #6c757d; margin-left: 8px; }
</style>

<div class="form-card">
    <h3>Thêm lớp học mới</h3>
    <form action="/lophoc/store" method="POST">
        <div class="form-group">
            <label>Mã lớp <span>*</span></label>
            <input type="text" name="MaLop" placeholder="VD: CNTT01, 68PM3..." required>
        </div>
        <div class="form-group">
            <label>Tên lớp <span>*</span></label>
            <input type="text" name="TenLop" placeholder="VD: Công nghệ thông tin K01" required>
        </div>
        <div class="form-group">
            <label>Ghi chú</label>
            <textarea name="GhiChu" rows="3" placeholder="Ghi chú (tùy chọn)"></textarea>
        </div>
        <button type="submit" class="btn btn-success">Lưu lớp học</button>
        <a href="/lophoc/index" class="btn btn-secondary">Hủy</a>
    </form>
</div>
