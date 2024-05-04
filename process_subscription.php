<?php
// إعداد الاتصال بقاعدة البيانات
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

// التحقق من أن الطلب تم بواسطة طريقة POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // التحقق من وجود وتعيين البيانات المرسلة من النموذج
    if (isset($_POST['subscriptionID']) && isset($_POST['activityName']) && isset($_POST['subscriptionPrice']) && isset($_POST['subscriptionDuration']) && isset($_POST['renewalStatus']) && isset($_POST['subscriptionEndDate'])) {
        // استقبال البيانات المرسلة
        $subscriptionID = $_POST['subscriptionID'];
        $activityName = $_POST['activityName'];
        $subscriptionPrice = $_POST['subscriptionPrice'];
        $subscriptionDuration = $_POST['subscriptionDuration'];
        $renewalStatus = $_POST['renewalStatus'];
        $subscriptionEndDate = $_POST['subscriptionEndDate'];

        // تحديث بيانات الاشتراك في قاعدة البيانات
        $sql = "UPDATE subscriptions SET ActivityName='$activityName', SubscriptionPrice='$subscriptionPrice', SubscriptionDuration='$subscriptionDuration', RenewalStatus='$renewalStatus', SubscriptionEndDate='$subscriptionEndDate' WHERE SubscriptionID=$subscriptionID";

        if ($conn->query($sql) === TRUE) {
            // إعادة توجيه المستخدم إلى صفحة عرض الاشتراكات بعد التحديث بنجاح
            header("Location: view_subscriptions.php");
            exit();
        } else {
            echo "خطأ في تحديث بيانات الاشتراك: " . $conn->error;
        }
    } else {
        echo "البيانات المرسلة غير كافية لتحديث الاشتراك";
    }
} else {
    echo "الرجاء استخدام الطريقة الصحيحة لتحديث الاشتراك";
}

// إغلاق الاتصال
$conn->close();
?>
