<?php
// تحقق من أن النموذج قد تم إرساله باستخدام POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // تحقق من وجود بيانات المستخدم المرسلة
    if (isset($_POST["username"]) && isset($_POST["password"])) {
        // استدعاء ملف الاتصال بقاعدة البيانات
        require_once 'db_connection.php';

        // تخزين البيانات المدخلة في متغيرات
        $username = $_POST["username"];
        $password = $_POST["password"];

        // تشفير كلمة المرور
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        // استعداء استعلام SQL لإضافة المستخدم إلى قاعدة البيانات
        $sql = "INSERT INTO users (username, password) VALUES ('$username', '$hashed_password')";

        // تنفيذ الاستعلام
        if ($conn->query($sql) === TRUE) {
            echo "تم تسجيل المستخدم بنجاح";
        } else {
            echo "حدث خطأ أثناء تسجيل المستخدم: " . $conn->error;
        }

        // إغلاق الاتصال بقاعدة البيانات
        $conn->close();
    } else {
        echo "الرجاء ملء جميع الحقول";
    }
}
?>
