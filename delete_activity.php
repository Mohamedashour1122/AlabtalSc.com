<?php
// التحقق من أن الطلب تم بواسطة طريقة POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // التحقق من وجود وتعيين قيمة معرف النشاط المُرسلة
    if (isset($_POST['activityID'])) {
        $activityID = $_POST['activityID'];

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

        // حذف النشاط من قاعدة البيانات
        $sql = "DELETE FROM activities WHERE ActivityID=$activityID";

        if ($conn->query($sql) === TRUE) {
            echo "تم حذف النشاط بنجاح";
        } else {
            echo "خطأ في حذف النشاط: " . $conn->error;
        }

        // إغلاق الاتصال
        $conn->close();
    } else {
        echo "لا يمكن العثور على معرف النشاط المُرسل";
    }
} else {
    echo "الرجاء استخدام الطريقة الصحيحة لحذف النشاط";
}
?>
