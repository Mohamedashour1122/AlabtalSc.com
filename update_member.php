<!DOCTYPE html>
<html>
<head>
    <title>تحديث بيانات العضو</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        .container {
            max-width: 600px;
            margin: 50px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h2 {
            text-align: center;
            color: #333;
        }
        form {
            margin-top: 20px;
        }
        input[type="text"],
        input[type="date"],
        input[type="number"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }
        input[type="submit"] {
            width: 100%;
            padding: 10px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: #0056b3;
        }
        .home-button {
            text-align: center;
            margin-top: 20px;
        }
        .home-button a {
            text-decoration: none;
            padding: 10px 20px;
            background-color: #007bff;
            color: #fff;
            border-radius: 5px;
        }
        .home-button a:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>

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

// التحقق من إرسال معرف العضو للتحديث
if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['id'])) {
    $member_id = $_GET['id'];

    // استعلام SQL لاسترداد بيانات العضو المحدد
    $sql = "SELECT * FROM members WHERE MemberID = $member_id";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        ?>

        <div class="container">
            <h2>تحديث بيانات العضو</h2>
            <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" enctype="multipart/form-data">
                الاسم: <input type="text" name="name" value="<?php echo $row['Name']; ?>"><br>
                تاريخ الميلاد: <input type="date" name="dateOfBirth" value="<?php echo $row['DateOfBirth']; ?>"><br>
                الرقم القومي: <input type="text" name="nationalID" value="<?php echo $row['NationalID']; ?>"><br>
                العمر: <input type="number" name="age" value="<?php echo $row['Age']; ?>"><br>
                الجنس: <input type="text" name="gender" value="<?php echo $row['Gender']; ?>"><br>
                النشاط: <input type="text" name="activity" value="<?php echo $row['Activity']; ?>"><br>
                العنوان: <input type="text" name="address" value="<?php echo $row['Address']; ?>"><br>
                رقم الهاتف: <input type="text" name="phoneNumber" value="<?php echo $row['PhoneNumber']; ?>"><br>
                تاريخ بداية القيد: <input type="date" name="membership_start_date" value="<?php echo $row['MembershipStartDate']; ?>"><br>
                صورة شخصية: <input type="file" name="profilePicture"><br>
                <input type="hidden" name="member_id" value="<?php echo $member_id; ?>">
                <input type="submit" value="تحديث بيانات العضو">
            </form>
        </div>

        <?php
    } else {
        echo "لم يتم العثور على بيانات العضو.";
    }
}

// تحديث بيانات العضو في قاعدة البيانات
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $member_id = $_POST['member_id'];
    $name = $_POST['name'];
    $dateOfBirth = $_POST['dateOfBirth'];
    $nationalID = $_POST['nationalID'];
    $age = $_POST['age'];
    $gender = $_POST['gender'];
    $activity = $_POST['activity'];
    $address = $_POST['address'];
    $phoneNumber = $_POST['phoneNumber'];
    $membershipStartDate = $_POST['membership_start_date'];

    // التحقق من تحميل الصورة الجديدة
    if ($_FILES['profilePicture']['error'] == UPLOAD_ERR_OK) {
        $target_dir = "uploads/";
        $target_file = $target_dir . basename($_FILES['profilePicture']['name']);
        move_uploaded_file($_FILES['profilePicture']['tmp_name'], $target_file);

        // استعلام SQL لتحديث بيانات الصورة الشخصية
        $sql_update_picture = "UPDATE members SET ProfilePicture='$target_file' WHERE MemberID=$member_id";
        if ($conn->query($sql_update_picture) !== TRUE) {
            echo "خطأ في تحديث الصورة الشخصية: " . $conn->error;
        }
    }

    // استعلام SQL لتحديث بيانات العضو
    $sql_update_member = "UPDATE members SET Name='$name', DateOfBirth='$dateOfBirth', NationalID='$nationalID', 
            Age='$age', Gender='$gender', Activity='$activity', Address='$address', PhoneNumber='$phoneNumber',
            MembershipStartDate='$membershipStartDate'
            WHERE MemberID=$member_id";

    if ($conn->query($sql_update_member) === TRUE) {
        echo "تم تحديث بيانات العضو بنجاح";
    } else {
        echo "خطأ في تحديث بيانات العضو: " . $conn->error;
    }
}

$conn->close();
?>

<!-- زر الصفحة الرئيسية -->
<div class="home-button">
    <a href="indexe.html">الصفحة الرئيسية</a>
</div>

</body>
</html>
