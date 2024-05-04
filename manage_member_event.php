<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>إدارة علاقة الأعضاء بالفعاليات</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            direction: rtl;
        }
        h2 {
            text-align: center;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            border: 1px solid #dddddd;
            text-align: center;
            padding: 8px;
        }
        th {
            background-color: #f2f2f2;
        }
        form {
            max-width: 400px;
            margin: auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        label {
            display: block;
            margin-bottom: 10px;
        }
        select, input[type="submit"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }
        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            border: none;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: #45a049;
        }
    </style>
    <div id="homeLink">
        <a href="indexe.html">الصفحة الرئيسية</a>
    </div>
</head>
<body>
    <h2>إدارة علاقة الأعضاء بالفعاليات</h2>
    
    <!-- عرض الأعضاء المسجلين في الفعاليات -->
    <h3>الأعضاء المسجلين في الفعاليات:</h3>
    <table>
        <thead>
            <tr>
                <th>اسم العضو</th>
                <th>اسم الفعالية</th>
                <th>حالة الحضور</th>
            </tr>
        </thead>
        <tbody>
            <?php
            // الاتصال بقاعدة البيانات
            $servername = "localhost";
            $username = "root";
            $password = "01033744372@";
            $dbname = "systemalabtal";
            $conn = new mysqli($servername, $username, $password, $dbname);
            
            // التحقق من نجاح الاتصال
            if ($conn->connect_error) {
                die("فشل الاتصال: " . $conn->connect_error);
            }

            // الاستعلام لاسترداد البيانات
            $sql = "SELECT members.Name AS MemberName, events.EventName, membersevents.Attendance
                    FROM members
                    INNER JOIN membersevents ON members.MemberID = membersevents.MemberID
                    INNER JOIN events ON membersevents.EventID = events.EventID";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                // عرض البيانات في الجدول
                while($row = $result->fetch_assoc()) {
                    echo "<tr>
                            <td>".$row["MemberName"]."</td>
                            <td>".$row["EventName"]."</td>
                            <td>".$row["Attendance"]."</td>
                          </tr>";
                }
            } else {
                echo "<tr><td colspan='3'>لا توجد بيانات</td></tr>";
            }
            $conn->close();
            ?>
        </tbody>
    </table>
    
    <!-- إضافة عضو إلى فعالية -->
    <h3>إضافة عضو إلى فعالية:</h3>
    <form action="process_add_member_to_event.php" method="POST">
        <label for="memberID">رقم العضو:</label><br>
        <select id="memberID" name="memberID" required>
            <!-- استعراض قائمة الأعضاء من قاعدة البيانات -->
            <?php
            // الاتصال بقاعدة البيانات
            $conn = new mysqli($servername, $username, $password, $dbname);
            
            // التحقق من نجاح الاتصال
            if ($conn->connect_error) {
                die("فشل الاتصال: " . $conn->connect_error);
            }

            // الاستعلام لاسترداد قائمة الأعضاء
            $sql = "SELECT MemberID, Name FROM members";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                // عرض قائمة الأعضاء في الخيارات
                while($row = $result->fetch_assoc()) {
                    echo "<option value='".$row["MemberID"]."'>".$row["Name"]."</option>";
                }
            } else {
                echo "<option value=''>لا يوجد أعضاء مسجلين</option>";
            }
            $conn->close();
            ?>
        </select><br><br>

        <label for="eventName">اسم الفعالية:</label><br>
        <select id="eventName" name="eventName" required>
            <!-- استعراض قائمة الفعاليات من قاعدة البيانات -->
            <?php
            // الاتصال بقاعدة البيانات
            $conn = new mysqli($servername, $username, $password, $dbname);
            
            // التحقق من نجاح الاتصال
            if ($conn->connect_error) {
                die("فشل الاتصال: " . $conn->connect_error);
            }

            // الاستعلام لاسترداد قائمة الفعاليات
            $sql = "SELECT EventID, EventName FROM events";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                // عرض قائمة الفعاليات في الخيارات
                while($row = $result->fetch_assoc()) {
                    echo "<option value='".$row["EventID"]."'>".$row["EventName"]."</option>";
                }
            } else {
                echo "<option value=''>لا توجد فعاليات مسجلة</option>";
            }
            $conn->close();
            ?>
        </select><br><br>

        <label for="attendance">حالة الحضور:</label><br>
        <select id="attendance" name="attendance" required>
            <option value="1">حاضر</option>
            <option value="0">غائب</option>
        </select><br><br>

        <input type="submit" value="إضافة عضو">
    </form>
</body>
</html>
