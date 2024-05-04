<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>الأعضاء</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f9f9f9;
            margin: 0;
            padding: 0;
            direction: rtl; /* تغيير اتجاه النصوص إلى اليمين */
            position: relative; /* لاستخدام الـ position: absolute للأزرار */
        }
        h1 {
            text-align: center;
            color: #333;
        }
        table {
            width: 100%; /* تغيير عرض الجدول ليمتد على العرض بالكامل */
            margin: 50px auto; /* زيادة المسافة من الأعلى */
            border-collapse: collapse;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 5px;
        }
        th, td {
            padding: 12px 15px;
            border-bottom: 1px solid #ddd;
            text-align: center;
        }
        th {
            background-color: #f2f2f2;
            color: #333;
            text-transform: uppercase;
        }
        tbody tr:hover {
            background-color: #f5f5f5;
        }
        #homeLink {
            position: absolute;
            top: 20px; /* الهامش العلوي */
            right: 20px; /* الهامش الأيمن */
        }
        #homeLink a {
            padding: 10px 20px;
            background-color: #007bff;
            color: white;
            border-radius: 5px;
            text-decoration: none;
            transition: background-color 0.3s ease;
        }
        #homeLink a:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div id="homeLink">
        <a href="index.html">الصفحة الرئيسية</a>
    </div>
    <h1>الأعضاء</h1>
    <table id="membersTable">
        <thead>
            <tr>
                <th>رقم العضو</th> <!-- إضافة عنوان العضو -->
                <th>الاسم</th>
                <th>تاريخ الميلاد</th>
                <th>الرقم القومي</th>
                <th>العمر</th>
                <th>الجنس</th>
                <th>النشاط</th>
                <th>العنوان</th>
                <th>رقم الهاتف</th>
                <th>صورة شخصية</th>
                <!-- تمت إضافة العنوان الجديد هنا -->
                <th>تاريخ بداية القيد</th>
            </tr>
        </thead>
        <tbody>
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

            // استعلام SQL لاسترداد بيانات الأعضاء
            $sql = "SELECT * FROM members";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                // عرض بيانات الأعضاء في صيغة جدول HTML
                while($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>".$row["ID"]."</td>"; // رقم العضو
                    echo "<td>".$row["Name"]."</td>";
                    echo "<td>".$row["DateOfBirth"]."</td>";
                    echo "<td>".$row["NationalID"]."</td>";
                    echo "<td>".$row["Age"]."</td>";
                    echo "<td>".$row["Gender"]."</td>";
                    echo "<td>".$row["Activity"]."</td>";
                    echo "<td>".$row["Address"]."</td>";
                    echo "<td>".$row["PhoneNumber"]."</td>";
                    echo "<td><img src='".$row["ProfilePicture"]."' width='100'></td>";
                    echo "<td>".$row["MembershipStartDate"]."</td>"; // تاريخ بداية القيد
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='10'>لا توجد بيانات لعرضها</td></tr>";
            }

            // إغلاق الاتصال
            $conn->close();
            ?>
        </tbody>
    </table>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
</body>
</html>
