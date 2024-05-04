<?php
// تحقق من وجود البيانات المطلوبة بطريقة POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // التحقق من وجود البيانات المطلوبة
    if (isset($_POST["memberID"]) && isset($_POST["tournamentID"]) && isset($_POST["position"])) {
        // الحصول على قيم البيانات المرسلة
        $memberID = $_POST["memberID"];
        $tournamentID = $_POST["tournamentID"];
        $position = $_POST["position"];

        // تضمين ملف الاتصال بقاعدة البيانات
        require_once 'db_connection.php';

        // إعداد استعلام SQL لإضافة العضو إلى البطولة
        $sql = "INSERT INTO memberstournaments (MemberID, TournamentID, Position) VALUES ('$memberID', '$tournamentID', '$position')";

        // تنفيذ الاستعلام
        try {
            if ($conn->query($sql) === TRUE) {
                echo "تمت إضافة العضو إلى البطولة بنجاح";
            } else {
                echo "حدث خطأ أثناء إضافة العضو إلى البطولة: " . $conn->error;
            }
        } catch (mysqli_sql_exception $e) {
            // التحقق من أن الخطأ هو بسبب وجود مفتاح أساسي مكرر
            if ($e->getCode() == 1062) {
                echo "تمت الإضافة من قبل، برجاء تغيير المدخلات.";
            } else {
                echo "حدث خطأ: " . $e->getMessage();
            }
        }

        // إغلاق الاتصال بقاعدة البيانات
        $conn->close();
    } else {
        echo "خطأ: يجب تحديد العضو والبطولة والمركز";
    }
} else {
    echo "خطأ: طريقة الطلب غير صحيحة";
}
?>
