<?php
// تعيين قيم افتراضية لمتغيرات الخطأ
$usernameErr = $passwordErr = $login_err = "";

$servername = "localhost"; // اسم الخادم
$username = "root"; // اسم المستخدم لقاعدة البيانات
$password = "01033744372@"; // كلمة المرور لقاعدة البيانات
$dbname = "systemalabtal"; // اسم قاعدة البيانات

// إنشاء الاتصال
$conn = new mysqli($servername, $username, $password, $dbname);

// التحقق من الاتصال
if ($conn->connect_error) {
    die("فشل الاتصال: " . $conn->connect_error);
}

// تأكد من وجود القيم المرسلة بواسطة الطلب POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // التحقق من وجود اسم المستخدم وكلمة المرور
    if (!empty($_POST["username"]) && !empty($_POST["password"])) {
        // الاستعلام للحصول على معلومات المستخدم المطابقة
        $sql = "SELECT * FROM users WHERE username = '" . $_POST["username"] . "' AND password = '" . $_POST["password"] . "'";
        $result = $conn->query($sql);

        // التحقق من وجود مستخدم مطابق
        if ($result->num_rows > 0) {
            // يتم تحقق الدخول بنجاح
            // استخراج بيانات المستخدم
            $row = $result->fetch_assoc();
            $page_destination = $row['page_destination'];

            // توجيه المستخدم إلى الصفحة المناسبة بناءً على page_destination
            header("Location: $page_destination");
            exit;
        } else {
            // لم يتم العثور على مستخدم مطابق
            $login_err = "اسم المستخدم أو كلمة المرور غير صحيحة";
            // إفراغ الحقول
            $_POST["username"] = $_POST["password"] = "";
        }
    } else {
        // إذا لم يتم تقديم اسم المستخدم أو كلمة المرور
        $login_err = "الرجاء إدخال اسم المستخدم وكلمة المرور";
    }
}
?>

<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>تسجيل الدخول</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .login-container {
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .input-group {
            margin-bottom: 15px;
        }

        .input-group label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }

        .input-group input {
            width: 100%;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }

        .error {
            color: red;
            margin-bottom: 10px;
        }

        .login-container button {
            background-color: #4caf50;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
        }
    </style>
</head>
<body>
    <div class="login-container">
        <h2>تسجيل الدخول</h2>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <?php if(!empty($login_err)) { ?>
                <p class="error"><?php echo $login_err; ?></p>
            <?php } ?>
            <div class="input-group">
                <label for="username">اسم المستخدم:</label>
                <input type="text" id="username" name="username" value="" required>
            </div>
            <div class="input-group">
                <label for="password">كلمة المرور:</label>
                <input type="password" id="password" name="password" autocomplete="off" required>
            </div>
            <input type="submit" value="تسجيل الدخول">
        </form>
    </div>
</body>
</html>
