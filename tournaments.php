<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>البطولات</title>
</head>
<body>
    <h2>إضافة بطولة</h2>
    <!-- نموذج إضافة بطولة -->
    <form action="process_tournament.php" method="POST">
        <label for="tournamentName">اسم البطولة:</label><br>
        <input type="text" id="tournamentName" name="tournamentName" required><br><br>

        <label for="tournamentPrice">سعر البطولة:</label><br>
        <input type="text" id="tournamentPrice" name="tournamentPrice" required><br><br>

        <label for="tournamentDuration">مدة البطولة:</label><br>
        <input type="text" id="tournamentDuration" name="tournamentDuration" required><br><br>

        <label for="renewalStatus">حالة التجديد:</label><br>
        <select id="renewalStatus" name="renewalStatus" required>
            <option value="Yes">نعم</option>
            <option value="No">لا</option>
        </select><br><br>

        <label for="tournamentEndDate">تاريخ نهاية البطولة:</label><br>
        <input type="date" id="tournamentEndDate" name="tournamentEndDate" required><br><br>

        <input type="submit" value="إضافة بطولة">
    </form>

    <h2>قائمة البطولات</h2>
    <!-- جدول لعرض بيانات البطولات -->
    <table border="1">
        <tr>
            <th>رقم البطولة</th>
            <th>اسم البطولة</th>
            <th>سعر البطولة</th>
            <th>مدة البطولة</th>
            <th>حالة التجديد</th>
            <th>تاريخ نهاية البطولة</th>
            <th>الإجراءات</th>
        </tr>
        <?php
        // الاتصال بقاعدة البيانات
        $conn = new mysqli($servername, $username, $password, $dbname);

        // التحقق من نجاح الاتصال
        if ($conn->connect_error) {
            die("فشل الاتصال: " . $conn->connect_error);
        }

        // الاستعلام لاسترداد بيانات البطولات
        $sql = "SELECT * FROM tournaments";
        $result = $conn->query($sql);

        if ($result) {
            // عرض بيانات البطولات في الجدول
            while($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row["TournamentID"] . "</td>";
                echo "<td>" . $row["TournamentName"] . "</td>";
                echo "<td>" . $row["TournamentPrice"] . "</td>";
                echo "<td>" . $row["TournamentDuration"] . "</td>";
                echo "<td>" . $row["RenewalStatus"] . "</td>";
                echo "<td>" . $row["TournamentEndDate"] . "</td>";
                echo "<td><a href='edit_tournament.php?id=" . $row["TournamentID"] . "'>تعديل</a> | <a href='delete_tournament.php?id=" . $row["TournamentID"] . "'>حذف</a></td>";
                echo "</tr>";
            }
            $result->free(); // تحرير النتائج
        } else {
            echo "<tr><td colspan='7'>لا يوجد بيانات متاحة</td></tr>";
        }
        $conn->close(); // إغلاق الاتصال
        ?>
    </table>
</body>
</html>
