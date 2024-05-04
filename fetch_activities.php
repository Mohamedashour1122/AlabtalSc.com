<?php
// اتصال بقاعدة البيانات
$servername = "localhost";
$username = "root";
$password = "01033744372@";
$dbname = "systemalabtal";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("فشل الاتصال بقاعدة البيانات: " . $conn->connect_error);
}

// استعلام لجلب بيانات الأنشطة
$sql = "SELECT * FROM activities";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $activities = array();
    while($row = $result->fetch_assoc()) {
        $activities[] = $row;
    }
    echo json_encode($activities); // إرجاع البيانات بتنسيق JSON
} else {
    echo "0 نتائج";
}

$conn->close();
?>
