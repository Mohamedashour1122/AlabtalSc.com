<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

// تحقق من وجود بيانات مرسلة عبر الطلب POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
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

    // الحصول على معرف النشاط المراد حذفه (إذا تم النقر على زر الحذف)
    if(isset($_POST['delete'])) {
        $activity_id = $_POST['activity_id'];
        $sql_delete = "DELETE FROM activities WHERE ActivityID = $activity_id";
        if ($conn->query($sql_delete) === TRUE) {
            echo "تم حذف النشاط بنجاح";
        } else {
            echo "حدث خطأ أثناء حذف النشاط: " . $conn->error;
        }
    }

    // الحصول على البيانات المراد إضافتها (إذا تم النقر على زر الإضافة)
    if(isset($_POST['add_activity'])) {
        $activity_name = $_POST['activity_name'];
        $trainer_name = $_POST['trainer_name'];
        $start_date = $_POST['start_date'];
        $sql_insert = "INSERT INTO activities (ActivityName, TrainerName, StartDate) VALUES ('$activity_name', '$trainer_name', '$start_date')";
        if ($conn->query($sql_insert) === TRUE) {
            echo "تمت إضافة النشاط بنجاح";
        } else {
            echo "حدث خطأ أثناء إضافة النشاط: " . $conn->error;
        }
    }

    // إغلاق الاتصال
    $conn->close();
} else {
    // إذا تم الوصول إلى هذه الصفحة بطريقة غير صحيحة
    echo "طلب غير صحيح";
}
?>
<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

// تحقق من وجود بيانات مرسلة عبر الطلب POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
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

    // الحصول على معرف النشاط المراد حذفه (إذا تم النقر على زر الحذف)
    if(isset($_POST['delete'])) {
        $activity_id = $_POST['activity_id'];
        $sql_delete = "DELETE FROM activities WHERE ActivityID = $activity_id";
        if ($conn->query($sql_delete) === TRUE) {
            echo "تم حذف النشاط بنجاح";
        } else {
            echo "حدث خطأ أثناء حذف النشاط: " . $conn->error;
        }
    }

    // الحصول على البيانات المراد إضافتها (إذا تم النقر على زر الإضافة)
    if(isset($_POST['add_activity'])) {
        $activity_name = $_POST['activity_name'];
        $trainer_name = $_POST['trainer_name'];
        $start_date = $_POST['start_date'];
        $sql_insert = "INSERT INTO activities (ActivityName, TrainerName, StartDate) VALUES ('$activity_name', '$trainer_name', '$start_date')";
        if ($conn->query($sql_insert) === TRUE) {
            echo "تمت إضافة النشاط بنجاح";
        } else {
            echo "حدث خطأ أثناء إضافة النشاط: " . $conn->error;
        }
    }

    // إغلاق الاتصال
    $conn->close();
} else {
    // إذا تم الوصول إلى هذه الصفحة بطريقة غير صحيحة
    echo "طلب غير صحيح";
}
?>
