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

// استقبال البيانات من نموذج تحديث الأكاديمية
$academyID = $_POST['academyID'];
$academyName = $_POST['academyName'];
$address = $_POST['address'];
$director = $_POST['director'];
$sportsActivities = $_POST['sportsActivities'];

// استعلام لتحديث بيانات الأكاديمية
$sql = "UPDATE academies SET AcademyName='$academyName', Address='$address', Director='$director', SportsActivities='$sportsActivities' WHERE AcademyID=$academyID";

if ($conn->query($sql) === TRUE) {
    echo "تم تحديث بيانات الأكاديمية بنجاح";
} else {
    echo "خطأ في تحديث البيانات: " . $conn->error;
}

// إغلاق الاتصال بقاعدة البيانات
$conn->close();
?>
