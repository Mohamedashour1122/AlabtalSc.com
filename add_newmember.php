<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>قائمة الأعضاء</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        /* أضف أي تنسيق إضافي هنا */
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 1200px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-align: center;
            margin-bottom: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            padding: 10px;
            text-align: center;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #f2f2f2;
        }

        tr:hover {
            background-color: #f9f9f9;
        }

        a {
            text-decoration: none;
            color: #007bff;
        }

        a:hover {
            text-decoration: underline;
        }

        .add-member-link {
            display: block;
            text-align: center;
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>قائمة الأعضاء</h1>
        <a href="add_member.php" class="add-member-link">إضافة عضو جديد</a> <!-- رابط إضافة عضو جديد -->
        <table>
            <thead>
                <tr>
                    <th>رقم العضو</th>
                    <th>الاسم</th>
                    <th>تاريخ الميلاد</th>
                    <th>الرقم القومي</th>
                    <th>العمر</th>
                  
