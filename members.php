<?php
// تضمين ملف الاتصال
require_once 'db_connection.php';

// استعلام SQL لاسترجاع الأعضاء
$sql = "SELECT * FROM members";
$result = mysqli_query($conn, $sql);

// عرض الأعضاء إذا تم العثور عليهم
if (mysqli_num_rows($result) > 0) {
    echo "<h2>قائمة الأعضاء</h2>";
    echo "<table>";
    echo "<tr><th>الاسم</th><th>تاريخ الميلاد</th><th>العمر</th><th>الجنس</th><th>النشاط</th><th>العنوان</th><th>رقم الهاتف</th></tr>";
    while($row = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        echo "<td>" . $row["Name"] . "</td>";
        echo "<td>" . $row["DateOfBirth"] . "</td>";
        echo "<td>" . $row["Age"] . "</td>";
        echo "<td>" . $row["Gender"] . "</td>";
        echo "<td>" . $row["Activity"] . "</td>";
        echo "<td>" . $row["Address"] . "</td>";
        echo "<td>" . $row["PhoneNumber"] . "</td>";
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "<p>لا يوجد أعضاء</p>";
}

// إغلاق الاتصال بقاعدة البيانات
mysqli_close($conn);
?>
