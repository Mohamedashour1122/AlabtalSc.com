<!DOCTYPE html>
<html>
<head>
    <title>تحديث بيانات الأعضاء</title>
</head>
<body>

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

// عرض بيانات الأعضاء
$sql = "SELECT * FROM members";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<h2>تحديث بيانات الأعضاء</h2>";
    echo "<table>";
    echo "<tr><th>رقم العضو</th><th>الاسم</th><th>تاريخ الميلاد</th><th>الرقم القومي</th><th>العمر</th><th>الجنس</th><th>النشاط</th><th>العنوان</th><th>رقم الهاتف</th><th>تحديث</th></tr>";
    while($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>".$row["MemberID"]."</td>";
        echo "<td>".$row["Name"]."</td>";
        echo "<td>".$row["DateOfBirth"]."</td>";
        echo "<td>".$row["NationalID"]."</td>";
        echo "<td>".$row["Age"]."</td>";
        echo "<td>".$row["Gender"]."</td>";
        echo "<td>".$row["Activity"]."</td>";
        echo "<td>".$row["Address"]."</td>";
        echo "<td>".$row["PhoneNumber"]."</td>";
        echo "<td><a href='update_member.php?id=".$row['MemberID']."'>تحديث</a></td>";
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "لا توجد بيانات لعرضها";
}

$conn->close();
?>

</body>
</html>
