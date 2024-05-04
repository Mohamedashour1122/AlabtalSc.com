<?php
$servername = "localhost"; // اسم الخادم
$username = "root"; // اسم المستخدم لقاعدة البيانات
$password = "01033744372@"; // كلمة المرور لقاعدة البيانات
$dbname = "systemalabtal"; // اسم قاعدة البيانات

// إنشاء الاتصال
$conn = new mysqli($servername, $username, $password, $dbname);

// التحقق من الاتصال
if ($conn->connect_error) {
    die("فشل الاتصال: " . $conn->connect_error);
}
?>
