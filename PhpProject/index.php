<?php
// --- PHẦN BACKEND (Xử lý dữ liệu) ---
$servername = "db-mysql"; // Tên service trong docker-compose
$username = "root";
$password = "123";
$dbname = "quanlysinhvien";

// Tạo kết nối
$conn = new mysqli($servername, $username, $password, $dbname);

// Kiểm tra kết nối
if ($conn->connect_error) {
    die("Kết nối thất bại (Đợi 1 chút để MySQL khởi động): " . $conn->connect_error);
}

// Tạo bảng nếu chưa có (Tự động tạo Database)
$sql = "CREATE TABLE IF NOT EXISTS sinhvien (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    hoten VARCHAR(50) NOT NULL,
    mssv VARCHAR(30) NOT NULL
)";
$conn->query($sql);

// Xử lý khi người dùng nhấn nút Thêm
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $ten = $_POST['hoten'];
    $ms = $_POST['mssv'];
    $conn->query("INSERT INTO sinhvien (hoten, mssv) VALUES ('$ten', '$ms')");
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Quản lý Sinh Viên (Docker PHP)</title>
    <style> body { font-family: sans-serif; padding: 20px; } table { border-collapse: collapse; width: 100%; } td, th { border: 1px solid #ddd; padding: 8px; } </style>
</head>
<body>
    <h2>Ứng dụng PHP - Docker - MySQL</h2>
    
    <form method="post" action="">
        Tên SV: <input type="text" name="hoten" required>
        MSSV: <input type="text" name="mssv" required>
        <button type="submit">Lưu vào Database</button>
    </form>
    <br>

    <table>
        <tr><th>ID</th><th>Họ Tên</th><th>MSSV</th></tr>
        <?php
        $result = $conn->query("SELECT * FROM sinhvien");
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo "<tr><td>".$row["id"]."</td><td>".$row["hoten"]."</td><td>".$row["mssv"]."</td></tr>";
            }
        } else {
            echo "<tr><td colspan='3'>Chưa có dữ liệu</td></tr>";
        }
        $conn->close();
        ?>
    </table>
</body>
</html>