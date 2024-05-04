<?php
// تضمين ملف الاتصال بقاعدة البيانات
include 'db_connection.php';

// استعلام لاسترداد الأحداث
$sql = "SELECT * FROM events";

// تنفيذ الاستعلام
$result = mysqli_query($conn, $sql);

// التأكد من وجود نتائج
if (mysqli_num_rows($result) > 0) {
    // عرض البيانات كجدول HTML
    echo "<table>";
    echo "<tr><th>اسم الحدث</th><th>نوع الحدث</th><th>تاريخ الحدث</th><th>الموقع</th><th>المنظم</th></tr>";
    while($row = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        echo "<td>" . $row["EventName"] . "</td>";
        echo "<td>" . $row["EventType"] . "</td>";
        echo "<td>" . $row["EventDate"] . "</td>";
        echo "<td>" . $row["Location"] . "</td>";
        echo "<td>" . $row["Organizer"] . "</td>";
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "لا توجد أحداث متاحة.";
}

// إغلاق الاتصال بقاعدة البيانات
mysqli_close($conn);
?>
