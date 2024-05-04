<?php
// التحقق من أن الطلب تم بواسطة طريقة POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // التحقق من وجود وتعيين قيمة معرف النشاط والبيانات المرسلة
    if (isset($_POST['activityID'], $_POST['activityName'], $_POST['trainerName'], $_POST['startDate'])) {
        $activityID = $_POST['activityID'];
        $activityName = $_POST['activityName'];
        $trainerName = $_POST['trainerName'];
        $startDate = $_POST['startDate'];

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

        // تحضير البيانات وتنظيفها
        $activityID = mysqli_real_escape_string($conn, $activityID);
        $activityName = mysqli_real_escape_string($conn, $activityName);
        $trainerName = mysqli_real_escape_string($conn, $trainerName);
        $startDate = mysqli_real_escape_string($conn, $startDate);

        // التحقق من صحة المعرف المرسل
        if (!is_numeric($activityID) || $activityID <= 0) {
            die("معرف النشاط غير صالح");
        }

        // تحقق من أن الطلب تم بواسطة الطريقة الصحيحة
        if ($_SERVER["REQUEST_METHOD"] != "POST") {
            die("الرجاء استخدام الطريقة الصحيحة لتحديث النشاط");
        }

        // تحديث بيانات النشاط في قاعدة البيانات
        $stmt = $conn->prepare("UPDATE activities SET ActivityName=?, TrainerName=?, StartDate=? WHERE ActivityID=?");
        $stmt->bind_param("sssi", $activityName, $trainerName, $startDate, $activityID);

        if ($stmt->execute()) {
            echo "تم تحديث بيانات النشاط بنجاح";
        } else {
            echo "خطأ في تحديث البيانات: " . $conn->error;
        }

        // إغلاق الاتصال
        $stmt->close();
        $conn->close();
    } else {
        echo "البيانات المرسلة غير كافية لتحديث النشاط";
    }
} else {
    echo "الرجاء استخدام الطريقة الصحيحة لتحديث النشاط";
}
?>
