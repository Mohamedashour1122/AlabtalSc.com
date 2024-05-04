<?php
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

// استعداد الاستعلام لاستعراض البطولات
$sql = "SELECT * FROM tournaments";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // عرض البطولات في جدول
    echo "<table border='1'>
    <tr>
    <th>رقم البطولة</th>
    <th>اسم البطولة</th>
    <th>نوع البطولة</th>
    <th>تاريخ البطولة</th>
    <th>الموقع</th>
    <th>المنظم</th>
    <th>الموقع</th>
    </tr>";

    while($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row['TournamentID'] . "</td>";
        echo "<td>" . $row['TournamentName'] . "</td>";
        echo "<td>" . $row['TournamentType'] . "</td>";
        echo "<td>" . $row['TournamentDate'] . "</td>";
        echo "<td>" . $row['Location'] . "</td>";
        echo "<td>" . $row['Organizer'] . "</td>";
        echo "<td>" . $row['Position'] . "</td>";
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "0 نتائج";
}

$conn->close();
?>
