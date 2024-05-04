<?php
include 'db_connection.php'; // تضمين ملف الاتصال بقاعدة البيانات

// التحقق من وجود بيانات مرسلة عبر الرابط
if(isset($_GET['AcademyID']) && !empty($_GET['AcademyID'])) {
    // استقبال رقم الأكاديمية للحذف
    $AcademyID = $_GET['AcademyID'];

    // عملية حذف اللاعب من قاعدة البيانات
    $sql = "DELETE FROM external_academies WHERE AcademyID='$AcademyID'";

    if ($conn->query($sql) === TRUE) {
        echo "تم حذف بيانات اللاعب بنجاح";
    } else {
        echo "حدث خطأ أثناء حذف بيانات اللاعب: " . $conn->error;
    }
} else {
    echo "لا توجد بيانات مرسلة";
}

// إغلاق الاتصال بقاعدة البيانات
$conn->close();
?>
