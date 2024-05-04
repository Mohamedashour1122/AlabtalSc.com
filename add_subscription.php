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
    if (isset($_POST['activityName']) && isset($_POST['subscriptionPrice']) && isset($_POST['subscriptionDuration']) && isset($_POST['renewalStatus']) && isset($_POST['subscriptionEndDate'])) {
        // استقبال البيانات المرسلة
        $activityName = $_POST['activityName'];
        $subscriptionPrice = $_POST['subscriptionPrice'];
        $subscriptionDuration = $_POST['subscriptionDuration'];
        $renewalStatus = $_POST['renewalStatus'];
        $subscriptionEndDate = $_POST['subscriptionEndDate'];

        // إنشاء استعلام الإضافة
        $sql = "INSERT INTO subscriptions (ActivityName, SubscriptionPrice, SubscriptionDuration, RenewalStatus, SubscriptionEndDate) VALUES ('$activityName', '$subscriptionPrice', '$subscriptionDuration', '$renewalStatus', '$subscriptionEndDate')";

        if ($conn->query($sql) === TRUE) {
            // إعادة توجيه المستخدم إلى صفحة عرض الاشتراكات بعد الإضافة بنجاح
            header("Location: view_subscriptions.php");
            exit();
        } else {
            echo "خطأ في إضافة الاشتراك: " . $conn->error;
        }
    } else {
        echo "البيانات المرسلة غير كافية لإضافة الاشتراك";
    }
} else {
    echo "الرجاء استخدام الطريقة الصحيحة لإضافة الاشتراك";
}

// إغلاق الاتصال
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Subscription</title>
</head>
<body>
    <h2>Add Subscription</h2>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <label for="activityName">Activity Name:</label><br>
        <input type="text" id="activityName" name="activityName" required><br><br>

        <label for="subscriptionPrice">Subscription Price:</label><br>
        <input type="text" id="subscriptionPrice" name="subscriptionPrice" required><br><br>

        <label for="subscriptionDuration">Subscription Duration:</label><br>
        <input type="text" id="subscriptionDuration" name="subscriptionDuration" required><br><br>

        <label for="renewalStatus">Renewal Status:</label><br>
        <select id="renewalStatus" name="renewalStatus" required>
            <option value="Yes">Yes</option>
            <option value="No">No</option>
        </select><br><br>

        <label for="subscriptionEndDate">Subscription End Date:</label><br>
        <input type="date" id="subscriptionEndDate" name="subscriptionEndDate" required><br><br>

        <input type="submit" value="Add Subscription">
    </form>
</body>
</html>
