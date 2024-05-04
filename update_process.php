<?php
include 'db_connection.php'; // تضمين ملف الاتصال بقاعدة البيانات

// التأكد من وجود بيانات مرسلة عبر النموذج
if(isset($_POST['AcademyID']) && !empty($_POST['AcademyID'])) {
    // استقبال البيانات من النموذج
    $AcademyID = $_POST['AcademyID'];
    $PlayerName = $_POST['PlayerName'];
    $DateOfBirth = $_POST['DateOfBirth'];
    $NationalID = $_POST['NationalID'];
    $Age = $_POST['Age'];
    $Activity = $_POST['Activity'];
    $Address = $_POST['Address'];
    $PhoneNumber1 = $_POST['PhoneNumber1'];
    $PhoneNumber2 = $_POST['PhoneNumber2'];
    $RegistrationStartDate = $_POST['RegistrationStartDate'];
    $Notes = $_POST['Notes'];

    // التأكد من أن ملف الصورة تم تحميله بنجاح
    if(isset($_FILES['ProfilePicture']) && $_FILES['ProfilePicture']['error'] === UPLOAD_ERR_OK) {
        // اسم الملف المؤقت على الخادم
        $tmpFilePath = $_FILES['ProfilePicture']['tmp_name'];

        // اسم الملف النهائي لحفظه في قاعدة البيانات أو المسار المحدد
        $fileName = $_FILES['ProfilePicture']['name'];

        // التأكد من وجود مسار لحفظ الملف
        $uploadPath = "uploads/" . basename($fileName);

        // نقل الملف المؤقت إلى المسار المحدد
        if(move_uploaded_file($tmpFilePath, $uploadPath)) {
            // تحديث بيانات اللاعب في قاعدة البيانات بما في ذلك اسم الملف
            $sql = "UPDATE external_academies SET 
                    PlayerName='$PlayerName', 
                    DateOfBirth='$DateOfBirth', 
                    NationalID='$NationalID', 
                    Age='$Age', 
                    Activity='$Activity', 
                    Address='$Address', 
                    PhoneNumber1='$PhoneNumber1', 
                    PhoneNumber2='$PhoneNumber2', 
                    ProfilePicture='$uploadPath', 
                    RegistrationStartDate='$RegistrationStartDate', 
                    Notes='$Notes'
                    WHERE AcademyID='$AcademyID'";

            if ($conn->query($sql) === TRUE) {
                echo "تم تحديث بيانات اللاعب بنجاح";
            } else {
                echo "حدث خطأ أثناء تحديث بيانات اللاعب: " . $conn->error;
            }
        } else {
            echo "حدث خطأ أثناء رفع الملف";
        }
    } else {
        echo "لم يتم تحميل صورة";
    }
} else {
    echo "لا توجد بيانات مرسلة";
}

// إغلاق الاتصال بقاعدة البيانات
$conn->close();
?>
