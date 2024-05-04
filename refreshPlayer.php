</div>

<!-- زر الصفحة الرئيسية -->
<div class="home-button">
    <a href="ACADEMY.html.">الصفحة الرئيسية</a>
</div>
<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>تحديث بيانات الأعضاء</title>
    <style>
        @page {
            size: A4 portrait;
            margin: 0;
        }
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            direction: rtl;
            background-color: #fff;
            width: 21cm;
            height: 29.7cm;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: center;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
            max-width: 300px;
        }
        th {
            background-color: #f2f2f2;
        }
        .update-button, .delete-button {
            text-decoration: none;
            padding: 5px 10px;
            border-radius: 5px;
            color: #fff;
            font-weight: bold;
        }
        .update-button {
            background-color: #007bff;
        }
        .delete-button {
            background-color: #dc3545;
        }
        .profile-image {
            width: 100%;
            height: auto;
            max-width: 200px;
        }
    </style>
</head>
<body>

<?php
include 'db_connection.php';

$sql = "SELECT * FROM external_academies";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<h2>تحديث بيانات اللاعبين</h2>";
    echo "<table>";
    echo "<tr>
            <th>رقم الأكاديمية</th>
            <th>اسم الأكاديمية</th>
            <th>اسم اللاعب</th>
            <th>تاريخ الميلاد</th>
            <th>العمر</th>
            <th>الجنسية</th>
            <th>العنوان</th>
            <th>رقم الهاتف 1</th>
            <th>رقم الهاتف 2</th>
            <th>صورة البروفايل</th>
            <th>تاريخ بداية التسجيل</th>
            <th>ملاحظات</th>
            <th>تحديث</th>
            <th>حذف</th>
        </tr>";
    while($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>".$row["AcademyID"]."</td>";
        echo "<td>".$row["AcademyName"]."</td>";
        echo "<td>".$row["PlayerName"]."</td>";
        echo "<td>".$row["DateOfBirth"]."</td>";
        echo "<td>".$row["Age"]."</td>";
        echo "<td>".$row["NationalID"]."</td>";
        echo "<td>".$row["Address"]."</td>";
        echo "<td>".$row["PhoneNumber1"]."</td>";
        echo "<td>".$row["PhoneNumber2"]."</td>";
        echo "<td><img src='".$row["ProfilePicture"]."' alt='صورة الملف الشخصي' class='profile-image'></td>";
        echo "<td>".$row["RegistrationStartDate"]."</td>";
        echo "<td>".$row["Notes"]."</td>";
        echo "<td><a href='update_player.php?AcademyID=".$row['AcademyID']."' class='update-button'>تحديث</a></td>";
        echo "<td><a href='delete_player.php?AcademyID=".$row['AcademyID']."' class='delete-button'>حذف</a></td>";
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "لا توجد بيانات لعرضها";
}

$conn->close();
?>

</body>
</html>
