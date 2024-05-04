<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>إدارة الأنشطة</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            padding: 8px;
            text-align: center;
            border-bottom: 1px solid #ddd;
        }
        th {
            background-color: #f2f2f2;
        }
        tr:hover {
            background-color: #f5f5f5;
        }
        a {
            text-decoration: none;
            color: blue;
        }
        a:hover {
            color: red;
        }
        #homeLink {
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <h1>قائمة الأنشطة</h1>
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

    // استعلام SQL لاسترداد بيانات الأنشطة
    $sql = "SELECT * FROM activities";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // عرض الأنشطة كجدول HTML
        echo "<table border='1'>
            <tr>
                <th>اسم النشاط</th>
                <th>اسم المدرب</th>
                <th>تاريخ البدء</th>
                <th>التحكم</th>
            </tr>";
        while($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row['ActivityName'] . "</td>";
            echo "<td>" . $row['TrainerName'] . "</td>";
            echo "<td>" . $row['StartDate'] . "</td>";
            echo "<td><form method='post' action='process_activity.php'>
                    <input type='hidden' name='activity_id' value='".$row['ActivityID']."'>
                    <input type='submit' name='delete' value='حذف' style='color: red;'>
                  </form></td>";
            echo "</tr>";
        }
        echo "</table>";
    } else {
        echo "لا توجد أنشطة لعرضها";
    }

    // إغلاق الاتصال
    $conn->close();
    ?>

    <br>
    <a href="add_activity.php">إضافة نشاط جديد</a>
    </div>
    <div id="homeLink">
        <a href="indexe.html">الصفحة الرئيسية</a>
    </div>
</body>
</html>
