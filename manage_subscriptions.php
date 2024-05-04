<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>إدارة العلاقات بين الأعضاء والاشتراكات</title>
</head>
<body>

<?php
// تحقق من وجود العضو المحدد
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["memberID"])) {
    // تحقق من صحة البيانات المدخلة
    $memberID = $_POST["memberID"];
    if (!is_numeric($memberID)) {
        echo "خطأ: رقم العضو يجب أن يكون قيمة رقمية.";
        exit();
    }
    
    // تضمين ملف الاتصال بقاعدة البيانات
    require_once 'db_connection.php';

    // استعلام SQL لجلب الاشتراكات المرتبطة بالعضو
    $sql = "SELECT ms.MemberID, ms.SubscriptionID, ms.PaymentDate, s.ActivityName, s.SubscriptionPrice, s.SubscriptionDuration, s.RenewalStatus, s.SubscriptionEndDate 
            FROM memberssubscriptions ms
            INNER JOIN subscriptions s ON ms.SubscriptionID = s.SubscriptionID
            WHERE ms.MemberID = $memberID";
    $result = $conn->query($sql);

    if ($result) {
        if ($result->num_rows > 0) {
            // عرض تفاصيل الاشتراكات المرتبطة بالعضو
            echo "<h2>تفاصيل الاشتراكات المرتبطة بالعضو</h2>";
            echo "<table border='1'>";
            echo "<tr><th>رقم العضو</th><th>رقم الاشتراك</th><th>تاريخ الدفع</th><th>اسم النشاط</th><th>سعر الاشتراك</th><th>مدة الاشتراك</th><th>حالة التجديد</th><th>تاريخ انتهاء الاشتراك</th></tr>";
            while($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row["MemberID"] . "</td>";
                echo "<td>" . $row["SubscriptionID"] . "</td>";
                echo "<td>" . $row["PaymentDate"] . "</td>";
                echo "<td>" . $row["ActivityName"] . "</td>";
                echo "<td>" . $row["SubscriptionPrice"] . "</td>";
                echo "<td>" . $row["SubscriptionDuration"] . "</td>";
                echo "<td>" . $row["RenewalStatus"] . "</td>";
                echo "<td>" . $row["SubscriptionEndDate"] . "</td>";
                echo "</tr>";
            }
            echo "</table>";
        } else {
            echo "لا توجد اشتراكات مرتبطة بهذا العضو";
        }
    } else {
        echo "حدث خطأ أثناء استعلام قاعدة البيانات: " . $conn->error;
    }

    // إغلاق الاتصال بقاعدة البيانات
    $conn->close();
}
?>

<h2>اختر العضو لعرض تفاصيل اشتراكاته</h2>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
    <label for="memberID">اختر العضو:</label>
    <select name="memberID" id="memberID">
        <?php
        // جلب أسماء الأعضاء من قاعدة البيانات
        require_once 'db_connection.php';
        $sql_members = "SELECT * FROM members";
        $result_members = $conn->query($sql_members);
        if ($result_members) {
            if ($result_members->num_rows > 0) {
                while($row_member = $result_members->fetch_assoc()) {
                    echo "<option value='" . $row_member["MemberID"] . "'>" . $row_member["Name"] . "</option>";
                }
            } else {
                echo "<option value=''>لا يوجد أعضاء متاحون</option>";
            }
        } else {
            echo "حدث خطأ أثناء استعلام قاعدة البيانات: " . $conn->error;
        }
        ?>
    </select>
    <br><br>
    <input type="submit" value="عرض تفاصيل الاشتراكات">
</form>
</div>
<a href="indexe.html" class="back-button">العودة للصفحة الرئيسية</a>
</body>
</html>
