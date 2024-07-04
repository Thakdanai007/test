<?php
$db_config = array(
    "host" => "localhost",  // โฮสต์ของ MySQL Server
    "user" => "root",       // ชื่อผู้ใช้ MySQL
    "pass" => "",           // รหัสผ่าน MySQL (ปล่อยว่างหากไม่ได้ตั้งรหัสผ่าน)
    "dbname" => "test",     // ชื่อฐานข้อมูลที่ต้องการเชื่อมต่อ
    "charset" => "utf8"     // การเซ็ต charset สำหรับการเชื่อมต่อ
);

// เชื่อมต่อกับ MySQL
$mysqli = new mysqli($db_config['host'], $db_config['user'], $db_config['pass'], $db_config['dbname']);

// ตรวจสอบการเชื่อมต่อ
if ($mysqli->connect_errno) {
    echo "เชื่อมต่อกับ MySQL ไม่สำเร็จ: " . $mysqli->connect_error;
    exit();
}

// ตัวอย่างการ query
$query = "SELECT * FROM tb_test"; // ชื่อตารางที่ต้องการดึงข้อมูล

$result = $mysqli->query($query);

// ตรวจสอบว่ามีข้อมูลหรือไม่
if ($result->num_rows > 0) {
    // เริ่มต้นแสดงผลข้อมูลในรูปแบบของตาราง HTML
    echo '<table>';
    echo '<tr>';
    echo '<th>CustomerID</th>';
    echo '<th>CustomerName</th>';
    echo '<th>ContactName</th>';
    echo '<th>Address</th>';
    echo '<th>City</th>';
    echo '<th>PostalCode</th>';
    echo '<th>Country</th>';
    echo '</tr>';

    // แสดงข้อมูลแต่ละแถว
    while ($row = $result->fetch_assoc()) {
        echo '<tr>';
        echo '<td>' . $row['CustomerID'] . '</td>';
        echo '<td>' . $row['CustomerName'] . '</td>';
        echo '<td>' . $row['ContactName'] . '</td>';
        echo '<td>' . $row['Address'] . '</td>';
        echo '<td>' . $row['City'] . '</td>';
        echo '<td>' . $row['PostalCode'] . '</td>';
        echo '<td>' . $row['Country'] . '</td>';
        echo '</tr>';
    }

    // ปิดตาราง HTML
    echo '</table>';
} else {
    echo "ไม่พบข้อมูล";
}

// ปิดการเชื่อมต่อ MySQL
$mysqli->close();
?>

<style>
table {
  font-family: Arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

td, th {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;
}

tr:nth-child(even) {
  background-color: #f2f2f2;
}
</style>
