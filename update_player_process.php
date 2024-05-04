<?php
// استدعاء ملف الاتصال بقاعدة البيانات
require_once "db_connection.php";

// التحقق مما إذا كانت الطلبية ناتجة عن زر الإرسال
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // استقبال البيانات المرسلة من النموذج
    $AcademyID = $_POST["AcademyID"];
    $PlayerName = $_POST["PlayerName"];
    $DateOfBirth = $_POST["DateOfBirth"];
    $NationalID = $_POST["NationalID"];
    $Age = $_POST["Age"];
    $Activity = $_POST["Activity"];
    $Address = $_POST["Address"];
    $PhoneNumber1 = $_POST["PhoneNumber1"];
    $PhoneNumber2 = $_POST["PhoneNumber2"];
    $ProfilePicture = $_POST["ProfilePicture"];
    $RegistrationStartDate = $_POST["RegistrationStartDate"];
    $Notes = $_POST["Notes"];

    // استعداء الاستعلام SQL لتحديث بيانات اللاعب
    $sql = "UPDATE external_academies SET 
            PlayerName = '$PlayerName', 
            DateOfBirth = '$DateOfBirth', 
            NationalID = '$NationalID', 
            Age = '$Age', 
            Activity = '$Activity', 
            Address = '$Address', 
            PhoneNumber1 = '$PhoneNumber1', 
            PhoneNumber2 = '$PhoneNumber2', 
            ProfilePicture = '$ProfilePicture', 
            RegistrationStartDate = '$RegistrationStartDate', 
            Notes = '$Notes' 
            WHERE AcademyID = '$AcademyID'";

    // تنفيذ الاستعلام
    if ($conn->query($sql) === TRUE) {
        echo "تم تحديث بيانات اللاعب بنجاح.";
    } else {
        echo "حدث خطأ أثناء تحديث بيانات اللاعب: " . $conn->error;
    }

    // إغلاق الاتصال بقاعدة البيانات
    $conn->close();
}
?>
