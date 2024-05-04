<?php
// اتصال بقاعدة البيانات
$servername = "localhost";
$username = "root";
$password = "01033744372@";
$dbname = "systemalabtal";

// إنشاء الاتصال
$conn = new mysqli($servername, $username, $password, $dbname);

// التحقق من الاتصال
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// استقبال معرف الأكاديمية المطلوب حذفه من الطلب
$academyID = $_GET['id'];

// استعلام لحذف الأكاديمية المحددة
$sql = "DELETE FROM academies WHERE AcademyID = $academyID";

if ($conn->query($sql) === TRUE) {
    echo "تم حذف الأكاديمية بنجاح";
} else {
    echo "خطأ في حذف الأكاديمية: " . $conn->error;
}

// إغلاق الاتصال بقاعدة البيانات
$conn->close();
?>
