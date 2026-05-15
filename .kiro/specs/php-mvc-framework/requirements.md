# Requirements Document

## Giới thiệu

Hoàn thiện PHP MVC Framework thuần (không dùng thư viện ngoài) với đầy đủ các thành phần core: Controller base, View rendering có truyền dữ liệu, và Model base kết nối database. Framework đã có sẵn URL routing trong `App.php` và `Controller.php` cơ bản.

## Glossary

- **App**: Class core xử lý routing, phân tích URL và điều phối request tới đúng Controller/Action.
- **Controller**: Class base mà tất cả controller cụ thể kế thừa, cung cấp helper `view()` và `model()`.
- **View**: File PHP template hiển thị giao diện, nhận dữ liệu từ Controller.
- **Model**: Class base cung cấp kết nối database và các thao tác CRUD cơ bản.
- **Database**: Class singleton quản lý kết nối PDO tới MySQL.
- **Router**: Cơ chế trong `App.php` phân tích URL thành controller/action/params.

---

## Requirements

### Requirement 1: Controller Base và View Rendering

**User Story:** As a developer, I want a base Controller class that can load views and pass data to them, so that I can display dynamic content from controllers.

#### Acceptance Criteria

1. THE Controller SHALL provide a `view($view, $data = [])` method that loads the corresponding PHP template file from `app/views/`.
2. WHEN `$data` is passed to `view()`, THE Controller SHALL extract the array so each key becomes an accessible variable inside the view file.
3. IF the view file does not exist, THEN THE Controller SHALL throw an Exception với thông báo rõ ràng.
4. THE Controller SHALL provide a `model($model)` method that loads and instantiates the corresponding model class from `app/models/`.
5. IF the model file does not exist, THEN THE Controller SHALL throw an Exception với thông báo rõ ràng.

---

### Requirement 2: View Template System

**User Story:** As a developer, I want view files to receive data as local variables, so that I can render dynamic HTML without mixing business logic into templates.

#### Acceptance Criteria

1. WHEN a controller calls `$this->view('home/index', ['title' => 'Trang chủ'])`, THE View SHALL render the file `app/views/home/index.php` với biến `$title` có giá trị `'Trang chủ'` khả dụng bên trong template.
2. THE View system SHALL support nested view paths (e.g., `home/index`, `user/profile`).
3. WHEN a view file is loaded, THE View SHALL not expose the `$data` array directly — only the extracted variables SHALL be accessible.

---

### Requirement 3: Database Connection

**User Story:** As a developer, I want a singleton Database class that manages a PDO connection, so that the application has a single, reusable database connection.

#### Acceptance Criteria

1. THE Database class SHALL implement the Singleton pattern, ensuring only one PDO instance exists per request.
2. WHEN `Database::getInstance()` is called, THE Database SHALL return the existing PDO connection if one already exists.
3. THE Database SHALL read connection parameters (host, dbname, username, password) from a configuration file `app/config/config.php`.
4. IF the database connection fails, THEN THE Database SHALL throw a PDOException với thông báo lỗi.
5. THE Database SHALL set PDO error mode to `PDO::ERRMODE_EXCEPTION`.

---

### Requirement 4: Model Base

**User Story:** As a developer, I want a base Model class with common database operations, so that I can perform CRUD without writing raw SQL repeatedly.

#### Acceptance Criteria

1. THE Model base class SHALL provide a `query($sql, $params = [])` method that executes a prepared statement và trả về PDOStatement.
2. WHEN `query()` is called with parameters, THE Model SHALL use PDO prepared statements để tránh SQL injection.
3. THE Model SHALL provide a `getAll()` method that fetches all rows from the model's associated table as an associative array.
4. THE Model SHALL provide a `getById($id)` method that fetches a single row by primary key `id`.
5. IF a query fails, THEN THE Model SHALL throw a PDOException với thông báo lỗi.
6. THE Model SHALL define a `$table` property that subclasses override to specify the database table name.

---

### Requirement 5: URL Routing

**User Story:** As a developer, I want the App router to correctly map URLs to controllers and actions, so that requests are dispatched to the right handler.

#### Acceptance Criteria

1. WHEN a URL like `/home/index` is requested, THE App SHALL load `app/controllers/home.php`, instantiate `home`, và gọi method `index()`.
2. WHEN a URL contains additional segments (e.g., `/home/show/42`), THE App SHALL pass `['42']` as params tới action `show`.
3. WHEN no URL is provided, THE App SHALL default to controller `home` và action `index`.
4. IF the requested controller file does not exist, THEN THE App SHALL fall back to the default controller `home`.
5. IF the requested action method does not exist on the controller, THEN THE App SHALL fall back to the default action `index`.
6. THE App SHALL sanitize the URL using `filter_var()` trước khi xử lý.
