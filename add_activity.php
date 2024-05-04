<!DOCTYPE html>
error_reporting(E_ALL);
ini_set('display_errors', 1);

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>إضافة نشاط جديد</title>
</head>
<body>
    <h1>إضافة نشاط جديد</h1>
    <form action="process_activity.php" method="post">
        <label for="activity_name">اسم النشاط:</label><br>
        <input type="text" id="activity_name" name="activity_name"><br><br>

        <label for="trainer_name">اسم المدرب:</label><br>
        <input type="text" id="trainer_name" name="trainer_name"><br><br>

        <label for="start_date">تاريخ البدء:</label><br>
        <input type="date" id="start_date" name="start_date"><br><br>

        <input type="submit" value="إضافة نشاط">
    </form>
    <div > 
        <a href="indexe.html">الصفحة الرئيسية</a>
    </div>
</body>
</html>
