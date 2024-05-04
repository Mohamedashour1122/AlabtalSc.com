<?php
// تضمين ملف الاتصال بقاعدة البيانات
include 'db_connection.php';

// فحص ما إذا تم تقديم النموذج
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // استخراج البيانات من النموذج
    $memberID = $_POST['memberID'];
    $name = $_POST['name'];
    // قم بالحصول على البيانات الأخرى التي تريد تحريرها
    // ...

    // تحديث بيانات العضو في قاعدة البيانات
    $sql = "UPDATE members SET Name='$name' WHERE MemberID='$memberID'";

    if ($conn->query($sql) === TRUE) {
        echo "Member data updated successfully";
    } else {
        echo "Error updating member data: " . $conn->error;
    }
}
// إغلاق الاتصال بقاعدة البيانات
$conn->close();
?>
