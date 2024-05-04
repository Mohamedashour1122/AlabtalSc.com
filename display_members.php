<!DOCTYPE html>
<html>
<head>
    <title>عرض البيانات</title>
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

// استعلام SQL لاسترداد بيانات العضو
$sql = "SELECT * FROM members";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // عرض البيانات كجدول HTML
    echo "<table border='1'>
    <tr>
    <th>الصورة الشخصية</th>
    <th>الاسم</th>
    <th>تاريخ الميلاد</th>
    <th>الرقم القومي</th>
    <th>العمر</th>
    <th>الجنس</th>
    <th>النشاط</th>
    <th>العنوان</th>
    <th>رقم الهاتف</th>
    </tr>";
    while($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td><img src='" . $row['ProfilePicture'] . "' width='100' height='100'></td>"; // إضافة عرض وارتفاع الصورة
        echo "<td>" . $row['Name'] . "</td>";
        echo "<td>" . $row['DateOfBirth'] . "</td>";
        echo "<td>" . $row['NationalID'] . "</td>";
        echo "<td>" . $row['Age'] . "</td>";
        echo "<td>" . $row['Gender'] . "</td>";
        echo "<td>" . $row['Activity'] . "</td>";
        echo "<td>" . $row['Address'] . "</td>";
        echo "<td>" . $row['PhoneNumber'] . "</td>";
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "0 نتائج";
}
$conn->close();
?>

</body>
</html>
