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

        // استعداد استعلام SQL لاسترداد بيانات الاشتراك المحدد
        $sql = "SELECT * FROM subscriptions WHERE SubscriptionID=$subscriptionID";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            // استخراج البيانات وتعبئة النموذج
            $row = $result->fetch_assoc();
            $activityName = $row["ActivityName"];
            $subscriptionPrice = $row["SubscriptionPrice"];
            $subscriptionDuration = $row["SubscriptionDuration"];
            $renewalStatus = $row["RenewalStatus"];
            $subscriptionEndDate = $row["SubscriptionEndDate"];
        } else {
            echo "لا يمكن العثور على الاشتراك";
            exit();
        }
    } else {
        echo "معرف الاشتراك غير محدد";
        exit();
    }
?>

<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>تعديل الاشتراك</title>
</head>
<body>
    <h2>تعديل الاشتراك</h2>
    <form action="process_subscription.php" method="post">
        <input type="hidden" name="subscriptionID" value="<?php echo $subscriptionID; ?>">
        <label for="activityName">اسم النشاط:</label><br>
        <input type="text" id="activityName" name="activityName" value="<?php echo $activityName; ?>"><br>
        <label for="subscriptionPrice">سعر الاشتراك:</label><br>
        <input type="text" id="subscriptionPrice" name="subscriptionPrice" value="<?php echo $subscriptionPrice; ?>"><br>
        <label for="subscriptionDuration">مدة الاشتراك (بالأيام):</label><br>
        <input type="text" id="subscriptionDuration" name="subscriptionDuration" value="<?php echo $subscriptionDuration; ?>"><br>
        <label for="renewalStatus">حالة التجديد:</label><br>
        <select id="renewalStatus" name="renewalStatus">
            <option value="Yes" <?php if($renewalStatus == "Yes") echo "selected"; ?>>نعم</option>
            <option value="No" <?php if($renewalStatus == "No") echo "selected"; ?>>لا</option>
        </select><br>
        <label for="subscriptionEndDate">تاريخ انتهاء الاشتراك:</label><br>
        <input type="date" id="subscriptionEndDate" name="subscriptionEndDate" value="<?php echo $subscriptionEndDate; ?>"><br><br>
        <input type="submit" value="تحديث الاشتراك">
    </form>
</body>
</html>

<?php
    // إغلاق الاتصال
    $conn->close();
?>
