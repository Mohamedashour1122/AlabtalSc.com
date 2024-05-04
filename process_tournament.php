<?php
// تأكد من أن الطلب قادم بواسطة الطريقة المناسبة
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // قم بتعيين القيم المرسلة من النموذج إلى المتغيرات
    $tournamentName = $_POST["tournamentName"];
    $tournamentType = $_POST["tournamentType"];
    $tournamentDate = $_POST["tournamentDate"];
    $location = $_POST["location"];
    $organizer = $_POST["organizer"];
    $position = $_POST["position"];

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

    // استعداد الاستعلام لإدراج البطولة في قاعدة البيانات
    $sql = "INSERT INTO tournaments (TournamentName, TournamentType, TournamentDate, Location, Organizer, Position)
    VALUES ('$tournamentName', '$tournamentType', '$tournamentDate', '$location', '$organizer', '$position')";

    // تنفيذ الاستعلام والتحقق من نجاحه
    if ($conn->query($sql) === TRUE) {
        echo "تمت إضافة البطولة بنجاح";
    } else {
        echo "خطأ: " . $sql . "<br>" . $conn->error;
    }

    // إغلاق الاتصال بقاعدة البيانات
    $conn->close();
} else {
    echo "طريقة الطلب غير صحيحة";
}
?>
