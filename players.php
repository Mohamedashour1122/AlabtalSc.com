<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>تحديث بيانات اللاعبين</title>
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
    // توصيل قاعدة البيانات
    $servername = "localhost";
    $username = "root";
    $password = "01033744372@";
    $dbname = "systemalabtal";

    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    } else {
        echo "تم الاتصال بنجاح<br>";
    }

    // استعلام لاسترداد بيانات اللاعبين من جدول external_academies
    $sql = "SELECT * FROM external_academies";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo "<h1>تحديث بيانات اللاعبين</h1>";
        echo "<table>
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
        echo "لا توجد نتائج";
    }

    $conn->close();
    ?>
</body>
</html>
