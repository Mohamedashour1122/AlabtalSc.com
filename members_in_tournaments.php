<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>أعضاء البطولات</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
            margin: 0;
            padding: 0;
        }
        h1 {
            text-align: center;
            color: #333;
        }
        table {
            width: 80%;
            margin: 20px auto;
            border-collapse: collapse;
            border: 2px solid #ddd;
            background-color: #fff;
        }
        th, td {
            padding: 12px;
            text-align: center;
        }
        th {
            background-color: #f2f2f2;
            color: #333;
            border-bottom: 2px solid #ddd;
        }
        td {
            border-bottom: 1px solid #ddd;
        }
        tr:hover {
            background-color: #f5f5f5;
        }
        .home-link {
            float: right;
            margin-top: 20px;
            margin-right: 20px;
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            text-decoration: none;
        }
        .home-link:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>

<a href="indexe.html" class="home-link">الصفحة الرئيسية</a>

<h1>أعضاء البطولات</h1>

<table>
    <thead>
        <tr>
            <th>اسم العضو</th>
            <th>اسم البطولة</th>
            <th>تاريخ البطولة</th>
            <th>المركز</th>
        </tr>
    </thead>
    <tbody>
    <?php
    // تضمين ملف الاتصال بقاعدة البيانات
    require_once 'db_connection.php';

    // استعلام SQL لاسترجاع الأعضاء في البطولات
    $sql = "SELECT m.Name, t.TournamentName, t.TournamentDate, mt.Position
            FROM members m
            INNER JOIN memberstournaments mt ON m.MemberID = mt.MemberID
            INNER JOIN tournaments t ON mt.TournamentID = t.TournamentID";

    // تنفيذ الاستعلام
    $result = $conn->query($sql);

    // التحقق من وجود بيانات
    if ($result === false) {
        echo "حدث خطأ أثناء استرجاع البيانات: " . $conn->error;
    } elseif ($result->num_rows == 0) {
        echo "<tr><td colspan='4'>لا توجد بيانات</td></tr>";
    } else {
        while ($row = $result->fetch_assoc()) {
            echo "<tr><td>" . $row["Name"] . "</td><td>" . $row["TournamentName"] . "</td><td>" . $row["TournamentDate"] . "</td><td>" . $row["Position"] . "</td></tr>";
        }
    }

    // إغلاق الاتصال بقاعدة البيانات
    $conn->close();
    ?>
    </tbody>
</table>

</body>
</html>
