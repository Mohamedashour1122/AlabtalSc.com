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

// الاستعلام لاسترداد الأرقام العضوية المتاحة
$sql = "SELECT MemberID FROM available_member_ids WHERE IsAvailable = true";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // عرض البيانات كقائمة بسيطة
    echo "<h2>أرقام الأعضاء المتاحة</h2>";
    echo "<ul>";
    while($row = $result->fetch_assoc()) {
        echo "<li>" . $row['MemberID'] . "</li>";
    }
    echo "</ul>";
} else {
    echo "لا توجد أرقام عضوية متاحة حاليًا";
}

// إغلاق الاتصال
$conn->close();
?>
