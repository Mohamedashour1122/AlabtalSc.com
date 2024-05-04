<?php
// التأكد من أن الطلب قادم بواسطة الطريقة المناسبة
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // تعيين القيم المرسلة من النموذج إلى المتغيرات
    $memberID = $_POST["memberID"];
    $eventID = $_POST["eventName"];
    $attendance = $_POST["attendance"];

    // الاتصال بقاعدة البيانات
    $servername = "localhost";
    $username = "root";
    $password = "01033744372@";
    $dbname = "systemalabtal";

    $conn = new mysqli($servername, $username, $password, $dbname);

    // التأكد من نجاح الاتصال
    if ($conn->connect_error) {
        die("فشل الاتصال: " . $conn->connect_error);
    }

    // استعداد الاستعلام لإدراج العضو في الفعالية
    $sql = "INSERT INTO membersevents (MemberID, EventID, Attendance) VALUES ('$memberID', '$eventID', '$attendance')";

    // تنفيذ الاستعلام والتحقق من نجاحه
    if ($conn->query($sql) === TRUE) {
        echo "تمت إضافة العضو إلى الفعالية بنجاح";
    } else {
        echo "خطأ: " . $sql . "<br>" . $conn->error;
    }

    // إغلاق الاتصال بقاعدة البيانات
    $conn->close();
} else {
    echo "طريقة الطلب غير صحيحة";
}
?>
