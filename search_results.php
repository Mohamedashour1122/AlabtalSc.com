<?php
// الاتصال بقاعدة البيانات
$servername = "localhost";
$username = "root";
$password = "01033744372@";
$dbname = "systemalabtal";

$conn = new mysqli($servername, $username, $password, $dbname);

// التحقق من الاتصال
if ($conn->connect_error) {
    die("فشل الاتصال: " . $conn->connect_error);
}

// استلام رقم العضو من النموذج
if(isset($_GET['memberID'])) {
    $memberID = $_GET['memberID'];

    // استعلام SQL لجلب كافة العلاقات الخاصة بالعضو المحدد
    $sql = "SELECT * FROM members WHERE NationalID = ?";
    
    // تحضير الاستعلام
    $stmt = $conn->prepare($sql);

    // ربط المتغيرات
    $stmt->bind_param("s", $memberID);

    // تنفيذ الاستعلام
    $stmt->execute();

    // الحصول على النتائج
    $result = $stmt->get_result();

    echo "<!DOCTYPE html>
    <html lang='ar'>
    <head>
        <meta charset='UTF-8'>
        <meta name='viewport' content='width=device-width, initial-scale=1.0'>
        <title>نتائج البحث</title>
    </head>
    <body>
        <h1>نتائج البحث</h1>";

    if ($result->num_rows > 0) {
        echo "<ul>";
        while ($row = $result->fetch_assoc()) {
            echo "<li>الاسم: " . $row['Name'] . "</li>";
            echo "<li>تاريخ الميلاد: " . $row['DateOfBirth'] . "</li>";
            echo "<li>الرقم القومي: " . $row['NationalID'] . "</li>";
            // استمر في عرض باقي البيانات حسب الحاجة
        }
        echo "</ul>";
    } else {
        echo "لم يتم العثور على أي نتائج";
    }

    echo "</body>
    </html>";

    $stmt->close();
} else {
    echo "لا يوجد رقم عضو محدد";
}

$conn->close();
?>
