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

// استخراج البيانات من النموذج
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $eventName = $_POST['eventName'];
    $eventType = $_POST['eventType'];
    $eventDate = $_POST['eventDate'];
    $location = $_POST['location'];
    $organizer = $_POST['organizer'];

    // استعداد الاستعلام SQL
    $sql = "INSERT INTO events (EventName, EventType, EventDate, Location, Organizer)
    VALUES ('$eventName', '$eventType', '$eventDate', '$location', '$organizer')";

    if ($conn->query($sql) === TRUE) {
        echo "تمت إضافة الفعالية بنجاح";
    } else {
        echo "خطأ: " . $sql . "<br>" . $conn->error;
    }
}

// إغلاق الاتصال
$conn->close();
?>
