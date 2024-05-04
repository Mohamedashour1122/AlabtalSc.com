<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>بحث عن لاعب</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            margin: 0;
            padding: 0;
        }

        .container {
            width: 100%;
            max-width: 800px;
            margin: 50px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0px 0px 10px 0px rgba(0, 0, 0, 0.1);
            direction: rtl;
            text-align: right;
        }

        h2 {
            text-align: center;
            color: #333;
        }

        form {
            margin-top: 20px;
        }

        input[type="text"] {
            width: calc(100% - 22px);
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        input[type="submit"] {
            width: 100%;
            background-color: #007bff;
            color: white;
            padding: 12px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
            transition: background-color 0.3s ease;
        }

        input[type="submit"]:hover {
            background-color: #0056b3;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 10px;
            text-align: center;
        }

        th {
            background-color: #f2f2f2;
        }

        img {
            max-width: 120%;
            height: auto;
        }

        .home-button {
            text-align: center;
            margin-top: 20px;
        }

        .home-button a {
            display: inline-block;
            padding: 10px 20px;
            background-color: #007bff;
            color: white;
            text-decoration: none;
            border-radius: 4px;
            transition: background-color 0.3s ease;
        }

        .home-button a:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>

<div class="container">
    <h2>بحث عن لاعب</h2>
    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <label for="academy_id">رقم الأكاديمية:</label>
        <input type="text" id="academy_id" name="academy_id" required> <!-- تعديل اسم و ID الحقل ليكون academy_id -->
        <input type="submit" value="بحث">
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
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

        // استخراج رقم الأكاديمية المدخل من النموذج
        $academy_id = $_POST["academy_id"];

        // استعلام SQL للبحث عن اللاعب برقم الأكاديمية
        $sql = "SELECT * FROM external_academies WHERE AcademyID = '$academy_id'"; // تغيير الاستعلام لاستخدام AcademyID
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            // عرض نتائج البحث في جدول
            echo "<h3>نتائج البحث:</h3>";
            echo "<table>";
            echo "<tr><th>رقم الأكاديمية</th><th>اسم اللاعب</th><th>تاريخ الميلاد</th><th>رقم القومي</th><th>العمر</th><th>النشاط</th><th>العنوان</th><th>رقم الهاتف ١</th><th>رقم الهاتف ٢</th><th>صورة الملف الشخصي</th><th>اسم الأكاديمية</th><th>تاريخ بدء التسجيل</th><th>الملاحظات</th></tr>";
            while($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row["AcademyID"] . "</td>";
                echo "<td>" . $row["PlayerName"] . "</td>";
                echo "<td>" . $row["DateOfBirth"] . "</td>";
                echo "<td>" . $row["NationalID"] . "</td>";
                echo "<td>" . $row["Age"] . "</td>";
                echo "<td>" . $row["Activity"] . "</td>";
                echo "<td>" . $row["Address"] . "</td>";
                echo "<td>" . $row["PhoneNumber1"] . "</td>";
                echo "<td>" . $row["PhoneNumber2"] . "</td>";
                echo "<td><img src='" . $row["ProfilePicture"] . "' alt='صورة الملف الشخصي'></td>";
                echo "<td>" . $row["AcademyName"] . "</td>";
                echo "<td>" . $row["RegistrationStartDate"] . "</td>";
                echo "<td>" . $row["Notes"] . "</td>";
                echo "</tr>";
            }
            echo "</table>";
        } else {
            echo "<p>لم يتم العثور على أي لاعب بهذا الرقم الأكاديمية.</p>";
        }

        // إغلاق الاتصال بقاعدة البيانات
        $conn->close();
    }
    ?>
</div>

<div class="home-button">
    <a href="Fransiscan.php">الصفحة الرئيسية</a>
</div>
</body>
</html>
