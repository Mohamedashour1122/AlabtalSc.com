<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>عرض الأكاديميات</title>
    <style>
        /* أضف الأنماط CSS هنا */
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            margin: 0;
            padding: 0;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            border: 1px solid #dddddd;
            text-align: center;
            padding: 8px;
        }
        th {
            background-color: #f2f2f2;
        }
        tr:nth-child(even) {
            background-color: #ffffff;
        }
        tr:nth-child(odd) {
            background-color: #f9f9f9;
        }
        .delete-button, .update-button {
            background-color: #007bff;
            color: #ffffff;
            border: none;
            padding: 6px 10px;
            border-radius: 4px;
            cursor: pointer;
            text-decoration: none;
            display: inline-block;
            margin-right: 5px;
        }
        .delete-button:hover, .update-button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>

<?php
// اتصال بقاعدة البيانات
$servername = "localhost";
$username = "root";
$password = "01033744372@";
$dbname = "systemalabtal";

// إنشاء الاتصال
$conn = new mysqli($servername, $username, $password, $dbname);

// التحقق من الاتصال
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// استعلام لاسترجاع البيانات من جدول الأكاديميات
$sql = "SELECT * FROM academies";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // عرض البيانات في الجدول
    echo "<table>
            <thead>
                <tr>
                    <th>الأنشطة الرياضية</th>
                    <th>المدير</th>
                    <th>العنوان</th>
                    <th>اسم الأكاديمية</th>
                    <th>رقم الأكاديمية</th>
                    <th>تحديث</th>
                    <th>حذف</th>
                </tr>
            </thead>
            <tbody>";
    while($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>".$row["SportsActivities"]."</td>";
        echo "<td>".$row["Director"]."</td>";
        echo "<td>".$row["Address"]."</td>";
        echo "<td>".$row["AcademyName"]."</td>";
        echo "<td>".$row["AcademyID"]."</td>";
        echo "<td><a href='update_academy_form.php?academyID=".$row['AcademyID']."' class='update-button'>تحديث</a></td>";
        echo "<td><button class='delete-button' onclick='deleteAcademy(".$row['AcademyID'].")'>حذف</button></td>";
        echo "</tr>";
    }
    echo "</tbody></table>";
} else {
    echo "<p>لا توجد بيانات متاحة</p>";
}

// إغلاق الاتصال بقاعدة البيانات
$conn->close();
?>

<script>
function deleteAcademy(academyID) {
    var confirmation = confirm("هل أنت متأكد من حذف هذه الأكاديمية؟");
    if (confirmation) {
        // إرسال طلب حذف الأكاديمية إلى الخادم
        // يمكنك إضافة الكود هنا لإرسال طلب حذف الأكاديمية إلى الخادم باستخدام AJAX أو طريقة أخرى
        // يجب تحديث الصفحة بعد حذف الأكاديمية لتحديث الجدول
        alert("تم حذف الأكاديمية رقم " + academyID);
    }
}
</script>
</div>

<!-- زر الصفحة الرئيسية -->
<div class="home-button">
    <a href="ACADEMY.html.">الصفحة الرئيسية</a>
</div>
</body>
</html>
