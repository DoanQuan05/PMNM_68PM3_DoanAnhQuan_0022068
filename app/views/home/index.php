<style>
    .welcome-card {
        background: white;
        border-radius: 12px;
        padding: 40px;
        box-shadow: 0 2px 12px rgba(0,0,0,0.08);
        max-width: 700px;
    }
    .welcome-card h2 { color: #2d3748; margin-bottom: 10px; font-size: 24px; }
    .welcome-card p { color: #718096; margin-bottom: 24px; line-height: 1.6; }
    .card-grid { display: flex; gap: 16px; flex-wrap: wrap; margin-top: 24px; }
    .card-item {
        flex: 1;
        min-width: 160px;
        background: linear-gradient(135deg, #667eea, #764ba2);
        color: white;
        padding: 24px;
        border-radius: 10px;
        text-decoration: none;
        text-align: center;
        transition: transform 0.2s, box-shadow 0.2s;
    }
    .card-item:hover { transform: translateY(-3px); box-shadow: 0 8px 25px rgba(102,126,234,0.4); }
    .card-item .icon { font-size: 32px; margin-bottom: 8px; }
    .card-item span { display: block; font-size: 14px; font-weight: 600; }
</style>

<div class="welcome-card">
    <h2>👋 Chào mừng!</h2>
    <p>Đây là hệ thống quản lý sinh viên. Bạn có thể quản lý danh sách sinh viên, thêm, sửa và xóa thông tin.</p>
    <div class="card-grid">
        <a href="/sinhvien/index" class="card-item">
            <div class="icon">👨‍🎓</div>
            <span>Danh sách sinh viên</span>
        </a>
        <a href="/sinhvien/create" class="card-item">
            <div class="icon">➕</div>
            <span>Thêm sinh viên mới</span>
        </a>
    </div>
</div>
