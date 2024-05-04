<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>عرض الفعاليات</title>
</head>
<body>

<?php
// الاتصال بقاعدة البيانات
$servername = "localhost";
$username = "root";
$password = "01033744372@";
$dbname = "systemalabtal";

// إنشاء الاتصال
$conn = new mysqli($servername, $username, $password, $dbname);

// التحقق من الاتصال
if ($conn->connect_error) {
    die("فشل الاتصال: " . $conn->connect_error);
}

// استعداد الاستعلام SQL
$sql = "SELECT * FROM events";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // عرض البيانات كجدول HTML
    echo "<h2>قائمة الفعاليات</h2>";
    echo "<table border='1'>
    <tr>
    <th>اسم الفعالية</th>
    <th>نوع الفعالية</th>
    <th>تاريخ الفعالية</th>
    <th>الموقع</th>
    <th>المنظم</th>
    </tr>";
    while($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row['EventName'] . "</td>";
        echo "<td>" . $row['EventType'] . "</td>";
        echo "<td>" . $row['EventDate'] . "</td>";
        echo "<td>" . $row['Location'] . "</td>";
        echo "<td>" . $row['Organizer'] . "</td>";
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "لا توجد فعاليات لعرضها";
}

// إغلاق الاتصال
$conn->close();
?>

</body>
</html>
