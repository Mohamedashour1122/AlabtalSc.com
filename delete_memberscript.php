<?php
// تضمين ملف الاتصال بقاعدة البيانات
include 'db_connection.php';

// فحص ما إذا تم تقديم النموذج
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // استخراج رقم العضو المراد حذفه من النموذج
    $memberID = $_POST['memberID'];

    // حذف بيانات العضو من قاعدة البيانات
    $sql = "DELETE FROM members WHERE MemberID='$memberID'";

    if ($conn->query($sql) === TRUE) {
        echo "Member deleted successfully";
    } else {
        echo "Error deleting member: " . $conn->error;
    }
}
// إغلاق الاتصال بقاعدة البيانات
$conn->close();
?>
