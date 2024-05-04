<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>تحديث الأكاديمية</title>
    <style>
        /* أضف الأنماط CSS هنا */
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            margin: 0;
            padding: 0;
        }
        form {
            max-width: 600px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        input[type="text"],
        input[type="submit"] {
            width: 100%;
            padding: 10px;
            margin: 8px 0;
            display: inline-block;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }
        input[type="submit"] {
            background-color: #007bff;
            color: #fff;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>

<?php
// التحقق من وجود معرف الأكاديمية في الرابط
if(isset($_GET['academyID'])) {
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

    // استعلام لاسترجاع بيانات الأكاديمية المحددة
    $academyID = $_GET['academyID'];
    $sql = "SELECT * FROM academies WHERE AcademyID = $academyID";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // عرض نموذج التحديث مع بيانات الأكاديمية المحددة
        $row = $result->fetch_assoc();
        ?>
        <form action="update_academy_process.php" method="post">
            <input type="hidden" name="academyID" value="<?php echo $row['AcademyID']; ?>">
            <label for="academyName">اسم الأكاديمية:</label>
            <input type="text" id="academyName" name="academyName" value="<?php echo $row['AcademyName']; ?>" required>
            <label for="address">العنوان:</label>
            <input type="text" id="address" name="address" value="<?php echo $row['Address']; ?>" required>
            <label for="director">المدير:</label>
            <input type="text" id="director" name="director" value="<?php echo $row['Director']; ?>" required>
            <label for="sportsActivities">الأنشطة الرياضية:</label>
            <input type="text" id="sportsActivities" name="sportsActivities" value="<?php echo $row['SportsActivities']; ?>" required>
            <input type="submit" value="حفظ التغييرات">
        </form>
        <?php
    } else {
        echo "<p>لا توجد بيانات متاحة لهذه الأكاديمية</p>";
    }

    // إغلاق الاتصال بقاعدة البيانات
    $conn->close();
} else {
    echo "<p>معرف الأكاديمية غير موجود</p>";
}
?>

</body>
</html>
