<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>تحديث بيانات الأعضاء</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f9f9f9;
            margin: 0;
            padding: 0;
            direction: rtl; /* تغيير اتجاه النصوص إلى اليمين */
        }
        h2 {
            text-align: center;
            margin-bottom: 20px;
            color: #333;
            text-transform: uppercase;
            letter-spacing: 2px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            border: 1px solid #ddd;
            background-color: #fff;
        }
        th, td {
            border: 1px solid #ddd;
            text-align: center;
            padding: 15px;
            white-space: nowrap; /* تمنع النص من الانتقال إلى سطر جديد */
            overflow: hidden;
            text-overflow: ellipsis; /* إظهار نقاط الإليبسس في حال كان النص طويلًا */
        }
        th {
            background-color: #f2f2f2;
            color: #333;
            font-weight: bold;
            text-transform: uppercase;
        }
        td a {
            color: #007bff;
            text-decoration: none;
            transition: color 0.3s ease;
        }
        td a:hover {
            color: #0056b3;
        }
        .back-button {
            margin-top: 20px;
            display: inline-block;
            text-decoration: none;
            background-color: #007bff;
            color: white;
            padding: 10px 20px;
            border-radius: 5px;
            text-align: center;
            transition: background-color 0.3s ease;
        }
        .back-button:hover {
            background-color: #0056b3;
        }
    </style>
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

// عرض بيانات الأعضاء
$sql = "SELECT * FROM members";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<h2>تحديث بيانات الأعضاء</h2>";
    echo "<table>";
    echo "<tr><th>رقم العضو</th><th>الاسم</th><th>تاريخ الميلاد</th><th>الرقم القومي</th><th>العمر</th><th>الجنس</th><th>النشاط</th><th>العنوان</th><th>رقم الهاتف</th><th>تاريخ بداية القيد</th><th>تحديث</th><th>حذف</th></tr>";
    while($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>".$row["MemberID"]."</td>";
        echo "<td>".$row["Name"]."</td>";
        echo "<td>".$row["DateOfBirth"]."</td>";
        echo "<td>".$row["NationalID"]."</td>";
        echo "<td>".$row["Age"]."</td>";
        echo "<td>".$row["Gender"]."</td>";
        echo "<td>".$row["Activity"]."</td>";
        echo "<td>".$row["Address"]."</td>";
        echo "<td>".$row["PhoneNumber"]."</td>";
        echo "<td>".$row["MembershipStartDate"]."</td>";
        echo "<td><a href='update_member.php?id=".$row['MemberID']."' style='background-color: #28a745; color: white; padding: 8px 15px; border-radius: 5px; text-decoration: none;'>تحديث</a></td>";
        echo "<td><a href='delete_member.php?id=".$row['MemberID']."' style='background-color: #dc3545; color: white; padding: 8px 15px; border-radius: 5px; text-decoration: none;'>حذف</a></td>";
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "لا توجد بيانات لعرضها";
}

// إغلاق الاتصال
$conn->close();
?>

<!-- زر الصفحة الرئيسية -->
<div class="home-button">
    <a href="indexe.html">الصفحة الرئيسية</a>
</div>

</body>
</html>
