<?php
// معلومات الاتصال بقاعدة البيانات
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

// استعلام لاسترداد عدد الأعضاء
$sqlMembers = "SELECT COUNT(*) AS totalMembers FROM members";
$resultMembers = $conn->query($sqlMembers);

// استعلام لاسترداد عدد الفعاليات
$sqlEvents = "SELECT COUNT(*) AS totalEvents FROM events";
$resultEvents = $conn->query($sqlEvents);

// تحويل النتائج إلى تنسيق JSON
$data = array();

if ($resultMembers->num_rows > 0) {
    $row = $resultMembers->fetch_assoc();
    $data["totalMembers"] = $row["totalMembers"];
}

if ($resultEvents->num_rows > 0) {
    $row = $resultEvents->fetch_assoc();
    $data["totalEvents"] = $row["totalEvents"];
}

// إغلاق الاتصال بقاعدة البيانات
$conn->close();

// إرجاع البيانات بتنسيق JSON
header('Content-Type: application/json');
echo json_encode($data);
?>
