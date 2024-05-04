<?php
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

// التحقق من وجود البيانات المرسلة من النموذج
if(isset($_POST['activity_id']) && isset($_POST['activity_name']) && isset($_POST['trainer_name']) && isset($_POST['start_date'])) {
    $activityID = $_POST['activity_id'];
    $activityName = $_POST['activity_name'];
    $trainerName = $_POST['trainer_name'];
    $startDate = $_POST['start_date'];

    // استعداد استعلام SQL لتحديث النشاط
    $sql = "UPDATE activities SET ActivityName='$activityName', TrainerName='$trainerName', StartDate='$startDate' WHERE ActivityID=$activityID";

    // تنفيذ الاستعلام والتحقق من نجاح التحديث
    if ($conn->query($sql) === TRUE) {
        echo "تم تحديث النشاط بنجاح";
    } else {
        echo "خطأ في تحديث النشاط: " . $conn->error;
    }
} else {
    echo "يرجى ملء جميع الحقول المطلوبة";
}

// إغلاق الاتصال
$conn->close();
?>
