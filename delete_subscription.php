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

    // التحقق من وجود معرف الاشتراك في الرابط
    if(isset($_GET['id'])) {
        $subscriptionID = $_GET['id'];

        // استعداد استعلام SQL لحذف الاشتراك المحدد
        $sql = "DELETE FROM subscriptions WHERE SubscriptionID=$subscriptionID";

        if ($conn->query($sql) === TRUE) {
            echo "تم حذف الاشتراك بنجاح";
        } else {
            echo "خطأ في حذف الاشتراك: " . $conn->error;
        }
    } else {
        echo "معرف الاشتراك غير محدد";
    }

    // إغلاق الاتصال
    $conn->close();
?>
