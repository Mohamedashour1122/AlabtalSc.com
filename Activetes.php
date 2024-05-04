<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>عــرض جميع  الأنشطة</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f8f8;
            padding: 20px;
            text-align: center;
        }
        h2 {
            color: #333;
            margin-bottom: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            border: 1px solid #ddd;
            background-color: #fff;
        }
        th, td {
            padding: 10px;
            border-bottom: 1px solid #ddd;
            text-align: center;
        }
        th {
            background-color: #f2f2f2;
            color: #333;
        }
        td {
            color: #666;
        }
    </style>
</head>
<body>

<?php
// تعريف معلومات الاتصال بقاعدة البيانات
$servername = "localhost";
$username = "root";
$password = "01033744372@"; // تم تعديل كلمة المرور هنا
$dbname = "systemalabtal";

// إنشاء الاتصال
$conn = new mysqli($servername, $username, $password, $dbname);

// التحقق من الاتصال
if ($conn->connect_error) {
    die("فشل الاتصال: " . $conn->connect_error);
}

// الحصول على الأنشطة من قاعدة البيانات
$sql = "SELECT * FROM activities";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // عرض الأنشطة كجدول HTML
    echo "<h2>الأنشطة</h2>";
    echo "<table>
    <tr>
    <th>تاريخ البدء</th>
    <th>اسم المدرب</th>
    <th>اسم النشاط</th>
    <th>رقم النشاط</th>
    </tr>";
    while($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>".$row["StartDate"]."</td>";
        echo "<td>".$row["TrainerName"]."</td>";
        echo "<td>".$row["ActivityName"]."</td>";
        echo "<td>".$row["ActivityID"]."</td>";
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "<p>لا توجد أنشطة لعرضها</p>";
}

// إغلاق الاتصال
$conn->close();
?>

<a href="indexe.html">العودة للصفحة الرئيسية</a>


</body>
</html>
