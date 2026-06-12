<style>
    * { box-sizing: border-box; margin: 0; padding: 0; }
    body { font-family: 'Segoe UI', sans-serif; background: #f0f2f5; }
    .navbar {
        width: 100%;
        height: 60px;
        background: linear-gradient(135deg, #667eea, #764ba2);
        display: flex;
        align-items: center;
        justify-content: space-between;
        padding: 0 30px;
        position: fixed;
        top: 0;
        z-index: 1000;
        box-shadow: 0 2px 10px rgba(0,0,0,0.2);
    }
    .navbar .brand { color: white; font-size: 20px; font-weight: 700; text-decoration: none; }
    .navbar nav a {
        color: rgba(255,255,255,0.85);
        text-decoration: none;
        margin-left: 20px;
        font-size: 14px;
        padding: 6px 14px;
        border-radius: 20px;
        transition: background 0.2s;
    }
    .navbar nav a:hover { background: rgba(255,255,255,0.2); color: white; }
    .content { margin-top: 60px; padding: 30px; }
</style>
<div class="navbar">
    <a class="brand" href="/home/index">🎓 Quản lý Sinh viên</a>
    <nav>
        <a href="/home/index">Trang chủ</a>
        <a href="/sinhvien/index">Sinh viên</a>
        <a href="/home/logout">Đăng xuất</a>
    </nav>
</div>
