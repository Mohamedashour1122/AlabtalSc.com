<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>عرض اللاعبين في الأكاديميات الخارجية</title>
    <style>
        body {
            text-align: center;
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
            white-space: nowrap; /* يمنع النص من الانتقال إلى سطر جديد */
            overflow: hidden; /* يخفي النص الزائد */
            text-overflow: ellipsis; /* يضيف نقط الانقطاع في نهاية النص في حال تجاوز العرض المتاح */
        }
        th {
            background-color: #f2f2f2;
        }
        /* تنسيق زر الرجوع للصفحة الرئيسية */
        .back-button {
            position: absolute;
            top: 20px;
            right: 20px;
            padding: 10px 20px;
            background-color: #4CAF50;
            color: white;
            text-decoration: none;
            border-radius: 5px;
        }
    </style>
</head>
<body dir="rtl">
    <!-- زر الرجوع للصفحة الرئيسية -->
    <a href="ACADEMY.html" class="back-button">الرجوع للصفحة الرئيسية</a>
    
    <h1>عرض اللاعبين في الأكاديميات الخارجية</h1>
    <table>
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
            <th>اسم الأكاديمية</th>
            <th>تاريخ التسجيل</th>
            <th>ملاحظات</th>
        </tr>
        <?php
        // توصيل قاعدة البيانات
        $servername = "localhost";
        $username = "root";
        $password = "01033744372@";
        $dbname = "systemalabtal";

        $conn = new mysqli($servername, $username, $password, $dbname);
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // استعلام لاسترداد بيانات اللاعبين من جدول external_academies
        $sql = "SELECT * FROM external_academies";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
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
                        <td><img src='".$row["ProfilePicture"]."' alt='صورة الملف الشخصي' style='width: 50%;'></td>
                        <td>".$row["AcademyName"]."</td>
                        <td>".$row["RegistrationStartDate"]."</td>
                        <td>".$row["Notes"]."</td>
                    </tr>";
            }
        } else {
            echo "0 results";
        }
        $conn->close();
        ?>
    </table>
</body>
</html>
