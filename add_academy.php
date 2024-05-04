<!DOCTYPE html>
</div>
<!-- زر الصفحة الرئيسية -->
<div class="home-button">
    <a href="ACADEMY.html.">الصفحة الرئيسية</a>
</div>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>إضافة أكاديمية جديدة</title>
    <style>
        /* أضف الأنماط CSS هنا */
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 600px;
            margin: 50px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0px 0px 10px 0px rgba(0, 0, 0, 0.1);
            direction: rtl; /* توجيه النصوص إلى اليمين */
        }
        h2 {
            text-align: center;
            color: #333;
        }
        form {
            margin-top: 20px;
        }
        input[type="text"],
        input[type="number"] {
            width: 100%;
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
    </style>
</head>
<body>

<div class="container">
    <h2>إضافة أكاديمية جديدة</h2>
    <form action="add_academy.php" method="post">
        <label for="academy_name">اسم الأكاديمية:</label>
        <input type="text" id="academy_name" name="academy_name" required>
        
        <label for="address">العنوان:</label>
        <input type="text" id="address" name="address" required>
        
        <label for="director">المدير:</label>
        <input type="text" id="director" name="director" required>
        
        <label for="sports_activities">الأنشطة الرياضية:</label>
        <input type="text" id="sports_activities" name="sports_activities" required>
        
        <input type="submit" value="إضافة">
    </form>
</div>

<?php
// معلومات الاتصال بقاعدة البيانات
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

// جلب البيانات من النموذج
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $academy_name = $_POST['academy_name'];
    $address = $_POST['address'];
    $director = $_POST['director'];
    $sports_activities = $_POST['sports_activities'];

    // إدخال البيانات إلى قاعدة البيانات
    $sql = "INSERT INTO academies (AcademyName, Address, Director, SportsActivities) 
            VALUES ('$academy_name', '$address', '$director', '$sports_activities')";

    if ($conn->query($sql) === TRUE) {
        echo "<p>تمت إضافة الأكاديمية بنجاح</p>";
    } else {
        echo "حدث خطأ أثناء إضافة الأكاديمية: " . $conn->error;
    }
}

// إغلاق الاتصال بقاعدة البيانات
$conn->close();
?>


</body>
</html>
