<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>إضافة اشتراك للعضو</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            text-align: center;
            background-color: #f2f2f2;
            margin: 0;
            padding: 0;
        }
        form {
            width: 50%;
            margin: 50px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h2 {
            color: #007bff;
        }
        label {
            display: block;
            margin-bottom: 10px;
        }
        input[type="text"],
        input[type="date"],
        input[type="submit"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }
        input[type="submit"] {
            background-color: #007bff;
            color: #fff;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
        input[type="submit"]:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>

<?php
// التحقق من أن الطلب تم بواسطة طريقة POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // التحقق من وجود وتعيين البيانات المرسلة من النموذج
    if (isset($_POST['memberID'], $_POST['subscriptionID'], $_POST['paymentDate'])) {
        // البيانات المرسلة من النموذج
        $memberID = $_POST['memberID'];
        $subscriptionID = $_POST['subscriptionID'];
        $paymentDate = $_POST['paymentDate'];

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

        // استعلام إضافة الاشتراك
        $sql = "INSERT INTO memberssubscriptions (MemberID, SubscriptionID, PaymentDate) 
                VALUES ('$memberID', '$subscriptionID', '$paymentDate')";

        if ($conn->query($sql) === TRUE) {
            echo "تمت إضافة الاشتراك بنجاح";
        } else {
            echo "خطأ في إضافة الاشتراك: " . $conn->error;
        }

        // إغلاق الاتصال
        $conn->close();
    } else {
        echo "البيانات المرسلة غير كافية لإضافة الاشتراك";
    }
} else {
    echo "الرجاء استخدام الطريقة الصحيحة لإضافة الاشتراك";
}
?>

<h2>إضافة اشتراك للعضو</h2>
<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
    <label for="memberID">رقم العضو:</label>
    <input type="text" id="memberID" name="memberID" required><br>

    <label for="subscriptionID">رقم الاشتراك:</label>
    <input type="text" id="subscriptionID" name="subscriptionID" required><br>

    <label for="paymentDate">تاريخ الدفع:</label>
    <input type="date" id="paymentDate" name="paymentDate" required><br>

    <input type="submit" value="إضافة الاشتراك">
</form>
</div>
<a href="indexe.html" class="back-button">العودة للصفحة الرئيسية</a>
</body>
</html>
