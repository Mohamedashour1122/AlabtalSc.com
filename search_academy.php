<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>البحث عن لاعبين في أكاديمية محددة</title>
    <style>
        /* الستايلات هنا */
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 800px;
            margin: 20px auto 50px auto; /* تعديل المسافات */
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0px 0px 10px 0px rgba(0, 0, 0, 0.1);
            overflow-x: auto; /* تمكين التمرير الأفقي عند الحاجة */
        }

        h2 {
            text-align: center;
            color: #333;
        }

        form {
            margin-top: 20px;
        }

        input[type="text"] {
            width: calc(50% - 10px);
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
            white-space: nowrap; /* يمنع النص من الانتقال إلى سطر جديد */
        }

        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: center;
        }

        th {
            background-color: #f2f2f2;
        }

        .profile-image {
            max-width: 100px;
            max-height: 100px;
            border-radius: 50%;
        }

        .academy-info {
            margin-bottom: 10px;
            text-align: center;
        }

        .home-button {
            text-align: right; /* تحديد محاذاة الزر إلى اليمين */
            margin-top: 20px;
        }

        .home-button a {
            text-decoration: none;
            padding: 10px 20px;
            background-color: #6c757d;
            color: #fff;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }

        .home-button a:hover {
            background-color: #5a6268;
        }
    </style>
</head>
<body>

<!-- زر الصفحة الرئيسية -->
<div class="home-button">
    <a href="ACADEMY.html">الصفحة الرئيسية</a>
</div>

<div class="container">
    <h2>البحث عن لاعبين في أكاديمية محددة</h2>
    <form id="searchForm" method="get" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <input type="text" name="academy" placeholder="اسم الأكاديمية">
        <input type="submit" value="البحث">
    </form>

    <?php
    if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['academy'])) {
        // معلومات الاتصال بقاعدة البيانات
        $servername = "localhost";
        $username = "root";
        $password = "01033744372@";
        $dbname = "systemalabtal"; // استبدال "اسم_قاعدة_البيانات" بـ "systemalabtal"

        // إنشاء الاتصال
        $conn = new mysqli($servername, $username, $password, $dbname);

        // التحقق من الاتصال
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // استخراج البيانات من النموذج
        $academy = $_GET['academy'];

        // استعلام SQL لاسترداد اللاعبين في الأكاديمية المحددة
        $sql = "SELECT * FROM external_academies WHERE AcademyName = '$academy'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            // عرض معلومات الأكاديمية وعدد اللاعبين المسجلين
            echo '<div class="academy-info">';
            echo '<p>الأكاديمية: ' . $academy . '</p>';
            echo '<p>عدد اللاعبين المسجلين: ' . $result->num_rows . '</p>';
            echo '</div>';

            // عرض جدول البيانات
            echo '<table>';
            echo '<tr><th>اسم اللاعب</th><th>تاريخ الميلاد</th><th>العمر</th><th>الجنسية</th><th>العنوان</th><th>رقم الهاتف 1</th><th>رقم الهاتف 2</th><th>صورة البروفايل</th><th>تاريخ بداية التسجيل</th><th>ملاحظات</th></tr>';
            while($row = $result->fetch_assoc()) {
                echo '<tr>';
                echo '<td>' . $row['PlayerName'] . '</td>';
                echo '<td>' . $row['DateOfBirth'] . '</td>';
                echo '<td>' . $row['Age'] . '</td>';
                echo '<td>' . $row['NationalID'] . '</td>';
                echo '<td>' . $row['Address'] . '</td>';
                echo '<td>' . $row['PhoneNumber1'] . '</td>';
                echo '<td>' . $row['PhoneNumber2'] . '</td>';
                echo '<td><img src="' . $row['ProfilePicture'] . '" class="profile-image" alt="صورة اللاعب"></td>';
                echo '<td>' . $row['RegistrationStartDate'] . '</td>';
                echo '<td>' . $row['Notes'] . '</td>';
                echo '</tr>';
            }
            echo '</table>';
        } else {
            echo '<div class="result">لا يوجد لاعبين مسجلين في هذه الأكاديمية.</div>';
        }

        // إغلاق الاتصال بقاعدة البيانات
        $conn->close();
    }
    ?>

</div>

</body>
</html>
