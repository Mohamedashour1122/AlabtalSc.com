<?php
// توصيل قاعدة البيانات
$servername = "localhost";
$username = "root";
$password = "01033744372@";
$dbname = "systemalabtal";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// استقبال بيانات اللاعب من النموذج
$academyID = $_POST['academyID'];
// استخدم البيانات لتحديث البيانات في قاعدة البيانات

// إغلاق الاتصال بقاعدة البيانات
$conn->close();

// توجيه المستخدم إلى صفحة أخرى بعد إتمام التحديث
header("Location: updated_successfully.php");
exit();
?>
