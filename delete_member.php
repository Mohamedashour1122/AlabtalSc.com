<?php
// معلومات الاتصال بقاعدة البيانات
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

// التحقق من وجود معلومات العضو المراد حذفه
if (isset($_GET['id']) && !empty($_GET['id'])) {
    $memberID = $_GET['id'];

    // حذف الصفوف المرتبطة في جدول memberssubscriptions
    $sql1 = "DELETE FROM memberssubscriptions WHERE MemberID = $memberID";

    // حذف الصفوف المرتبطة في جدول membersevents
    $sql2 = "DELETE FROM membersevents WHERE MemberID = $memberID";

    // حذف الصفوف المرتبطة في جدول memberstournaments
    $sql3 = "DELETE FROM memberstournaments WHERE MemberID = $memberID";

    // تنفيذ الاستعلامات
    if ($conn->query($sql1) === TRUE && $conn->query($sql2) === TRUE && $conn->query($sql3) === TRUE) {
        // بعد حذف الصفوف المرتبطة، يمكن حذف العضو من جدول الأعضاء
        $deleteMemberSql = "DELETE FROM members WHERE MemberID = $memberID";
        if ($conn->query($deleteMemberSql) === TRUE) {
            echo "تم حذف العضو بنجاح";
        } else {
            echo "خطأ في عملية حذف العضو: " . $conn->error;
        }
    } else {
        echo "خطأ في عملية حذف الصفوف المرتبطة: " . $conn->error;
    }
} else {
    echo "لم يتم تحديد عضو لحذفه";
}

// إغلاق الاتصال
$conn->close();
?>
