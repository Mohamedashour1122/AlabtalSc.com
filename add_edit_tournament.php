<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>تعديل بطولة</title>
</head>
<body>
    <h2>تعديل بطولة</h2>
    <?php
    // التأكد من أن تم تمرير معرف البطولة
    if(isset($_GET['id'])) {
        $tournamentID = $_GET['id'];

        // الاتصال بقاعدة البيانات
        $servername = "localhost";
        $username = "root";
        $password = "01033744372@";
        $dbname = "systemalabtal";

        $conn = new mysqli($servername, $username, $password, $dbname);

        // التأكد من نجاح الاتصال
        if ($conn->connect_error) {
            die("فشل الاتصال: " . $conn->connect_error);
        }

        // استعداد الاستعلام لاسترداد بيانات البطولة
        $sql = "SELECT * FROM tournaments WHERE TournamentID = $tournamentID";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            ?>
            <form action="update_tournament.php" method="POST">
                <input type="hidden" name="tournamentID" value="<?php echo $row['TournamentID']; ?>">
                <label for="tournamentName">اسم البطولة:</label><br>
                <input type="text" id="tournamentName" name="tournamentName" value="<?php echo $row['TournamentName']; ?>" required><br><br>

                <label for="tournamentType">نوع البطولة:</label><br>
                <input type="text" id="tournamentType" name="tournamentType" value="<?php echo $row['TournamentType']; ?>" required><br><br>

                <label for="tournamentDate">تاريخ البطولة:</label><br>
                <input type="date" id="tournamentDate" name="tournamentDate" value="<?php echo $row['TournamentDate']; ?>" required><br><br>

                <label for="location">الموقع:</label><br>
                <input type="text" id="location" name="location" value="<?php echo $row['Location']; ?>" required><br><br>

                <label for="organizer">المنظم:</label><br>
                <input type="text" id="organizer" name="organizer" value="<?php echo $row['Organizer']; ?>" required><br><br>

                <label for="position">الموقع:</label><br>
                <input type="text" id="position" name="position" value="<?php echo $row['Position']; ?>" required><br><br>

                <input type="submit" value="تحديث بطولة">
            </form>
            <?php
        } else {
            echo "لا توجد بطولات مطابقة";
        }

        $conn->close();
    } else {
        echo "لم يتم تمرير معرف البطولة";
    }
    ?>
</body>
</html>
