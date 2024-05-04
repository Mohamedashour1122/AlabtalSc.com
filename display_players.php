<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>عرض بيانات اللاعبين</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: center;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body dir="rtl">
    <?php
    // تحديد معلومات الاتصال بقاعدة البيانات
    $servername = "localhost";
    $username = "root";
    $password = "password";
    $dbname = "systemalabtal";

    // محاولة الاتصال بقاعدة البيانات
    $conn = new mysqli($servername, $username, $password, $dbname);

    // التحقق من وجود أي أخطاء في الاتصال
    if ($conn->connect_error) {
        // إذا حدث أي خطأ، عرض رسالة الخطأ وإيقاف تشغيل البرنامج
        die("Connection failed: " . $conn->connect_error);
    }

    // استعلام لاسترداد بيانات اللاعبين من جدول external_academies
    $sql = "SELECT * FROM external_academies";

    // تنفيذ الاستعلام والتحقق من نجاحه
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // إذا وجد بيانات، عرضها في جدول HTML
        echo "<h1>عرض بيانات اللاعبين</h1>";
        echo "<table border='1'>
                <tr>
                    <th>رقم الأكاديمية</th>
                    <th>اسم اللاعب</th>
                    <th>تاريخ الميلاد</th>
                    <th>الرقم القومي</th>
                    <th>العمر</th>
                    <th>النشاط</th>
                    <th>العنوان</th>
                    <th>رقم الهاتف الأول</th>
                    <th>رقم الهاتف الثاني</th>
                    <th>صورة الملف الشخصي</th>
                    <th>تاريخ التسجيل</th>
                    <th>ملاحظات</th>
                    <th>تحديث البيانات</th>
                </tr>";

        // عرض البيانات في الجدول
        while($row = $result->fetch_assoc()) {
            echo "<tr>
                    <td>".$row["AcademyID"]."</td>
                    <td>".$row["PlayerName"]."</td>
                    <td>".$row["DateOfBirth"]."</td>
                    <td>".$row["NationalID"]."</td>
                    <td>".$row["Age"]."</td>
                    <td>".$row["Activity"]."</td>
                    <td>".$row["Address"]."</td>
                    <td>".$row["PhoneNumber1"]."</td>
                    <td>".$row["PhoneNumber2"]."</td>
                    <td>".$row["ProfilePicture"]."</td>
                    <td>".$row["RegistrationStartDate"]."</td>
                    <td>".$row["Notes"]."</td>
                    <td><a href='update_player.php?AcademyID=".$row["AcademyID"]."'>تحديث البيانات</a></td>
                </tr>";
        }

        echo "</table>";
    } else {
        // إذا لم يتم العثور على أي بيانات
        echo "<h1>لا توجد بيانات لعرضها</h1>";
    }

    // إغلاق الاتصال بقاعدة البيانات
    $conn->close();
    ?>
</body>
</html>
