<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>إضافة فعالية جديدة</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
            margin: 0;
            padding: 20px;
            direction: rtl; /* تغيير اتجاه النصوص إلى اليمين */
        }

        h2 {
            text-align: center;
            color: #007bff;
        }

        form {
            max-width: 400px;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0px 0px 10px 0px rgba(0, 0, 0, 0.1);
            direction: rtl; /* تغيير اتجاه النصوص إلى اليمين */
        }

        label {
            font-weight: bold;
            color: #495057;
            direction: rtl; /* تغيير اتجاه النصوص إلى اليمين */
            text-align: right; /* محاذاة النصوص إلى اليمين */
        }

        input[type="text"],
        input[type="date"],
        select {
            width: 100%;
            padding: 10px;
            margin: 8px 0;
            border: 1px solid #ced4da;
            border-radius: 4px;
            box-sizing: border-box;
            text-align: right; /* محاذاة النصوص إلى اليمين */
        }

        input[type="submit"] {
            width: 100%;
            padding: 10px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        input[type="submit"]:hover {
            background-color: #0056b3;
        }

        .homepage-link {
            display: block;
            text-align: center;
            margin-top: 20px;
            color: #007bff;
            text-decoration: none;
        }
    </style>
</head>
<body>
    <h2>إضافة فعالية جديدة</h2>
    <form action="process_event.php" method="post">
        <label for="eventName">اسم الفعالية:</label><br>
        <input type="text" id="eventName" name="eventName" required><br>

        <label for="eventType">نوع الفعالية:</label><br>
        <select id="eventType" name="eventType" required>
            <option value="Concert">حفلة</option>
            <option value="Exhibition">معرض</option>
            <option value="Conference">مؤتمر</option>
            <option value="Workshop">ورشة عمل</option>
        </select><br>

        <label for="eventDate">تاريخ الفعالية:</label><br>
        <input type="date" id="eventDate" name="eventDate" required><br>

        <label for="location">موقع الفعالية:</label><br>
        <input type="text" id="location" name="location"><br>

        <label for="organizer">المنظم:</label><br>
        <input type="text" id="organizer" name="organizer"><br>

        <input type="submit" value="إضافة فعالية">
    </form>

    <!-- زر الصفحة الرئيسية -->
    <a href="indexe.html" class="homepage-link">الصفحة الرئيسية</a>
</body>
</html>
