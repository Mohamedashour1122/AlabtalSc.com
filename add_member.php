<?php
// الاتصال بقاعدة البيانات
$servername = "localhost";
$username = "root";
$password = "01033744372@";
$dbname = "systemalabtal"; // استبدال "اسم_قاعدة_البيانات" بـ "systemalabtal"

// إنشاء الاتصال
$conn = new mysqli($servername, $username, $password, $dbname);

// التحقق من الاتصال
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// استخراج البيانات من النموذج
$name = $_POST['name'] ?? '';
$dateOfBirth = $_POST['dateOfBirth'] ?? '';
$nationalID = $_POST['nationalID'] ?? '';
$age = $_POST['age'] ?? '';
$gender = $_POST['gender'] ?? '';
$activity = $_POST['activity'] ?? '';
$address = $_POST['address'] ?? '';
$phoneNumber = $_POST['phoneNumber'] ?? '';
$membershipStartDate = $_POST['membershipStartDate'] ?? '';

// استعلام SQL لإدراج البيانات
$sql = "INSERT INTO members (Name, DateOfBirth, NationalID, Age, Gender, Activity, Address, PhoneNumber, MembershipStartDate)
VALUES ('$name', '$dateOfBirth', '$nationalID', '$age', '$gender', '$activity', '$address', '$phoneNumber', '$membershipStartDate')";

if ($conn->query($sql) === TRUE) {
    echo "تمت إضافة العضو بنجاح";
} else {
    echo "خطأ في إضافة العضو: " . $conn->error;
}

// إغلاق الاتصال بقاعدة البيانات
$conn->close();
?>
