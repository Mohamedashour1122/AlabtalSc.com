<?php
// تحقق من وجود بيانات مرسلة
if (isset($_POST['username']) && isset($_POST['password'])) {
    // بيانات قاعدة البيانات
    $servername = "localhost";
    $db_username = "root"; // اسم المستخدم
    $db_password = "01033744372@"; // كلمة المرور
    $dbname = "systemalabtal"; // اسم قاعدة البيانات

    // إنشاء الاتصال
    $conn = new mysqli($servername, $db_username, $db_password, $dbname);

    // التحقق من الاتصال
    if ($conn->connect_error) {
        die("فشل الاتصال: " . $conn->connect_error);
    }

    // تهيئة بيانات المستخدم
    $username = $_POST['username'];
    $password = $_POST['password'];

    // استعلام SQL للتحقق من اسم المستخدم وكلمة المرور
    $sql = "SELECT * FROM users WHERE username='$username' AND password='$password'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // تم العثور على مستخدم مطابق
        session_start();
        $_SESSION['loggedin'] = true;
        header("Location: home.php"); // توجيه المستخدم إلى الصفحة الرئيسية بعد تسجيل الدخول
        exit;
    } else {
        // لم يتم العثور على مستخدم مطابق
        echo "اسم المستخدم أو كلمة المرور غير صحيحة.";
    }

    $conn->close();
} else {
    // إعادة توجيه المستخدم إذا لم تكن هناك بيانات مرسلة
    header("Location: login.php");
    exit;
}
?>
