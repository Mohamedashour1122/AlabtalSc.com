<?php
// إعداد الاتصال بقاعدة البيانات
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
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>عرض الاشتراكات</title>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: center;
        }
        th {
            background-color: #f2f2f2;
        }
        .edit-link, .delete-link {
            text-decoration: none;
            color: blue;
        }
    </style>
</head>
<body>

<h2>عرض الاشتراكات</h2>

<table>
    <tr>
        <th>رقم الاشتراك</th>
        <th>اسم النشاط</th>
        <th>سعر الاشتراك</th>
        <th>مدة الاشتراك</th>
        <th>حالة التجديد</th>
        <th>تاريخ انتهاء الاشتراك</th>
        <th>العمليات</th>
    </tr>
    <?php
    // الاستعلام عن الاشتراكات
    $sql = "SELECT * FROM subscriptions";
    $result = $conn->query($sql);

    // التحقق من وجود نتائج
    if ($result && $result->num_rows > 0) {
        // عرض البيانات في جدول HTML
        while($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row["SubscriptionID"] . "</td>";
            echo "<td>" . $row["ActivityName"] . "</td>";
            echo "<td>" . $row["SubscriptionPrice"] . "</td>";
            echo "<td>" . $row["SubscriptionDuration"] . "</td>";
            echo "<td>" . $row["RenewalStatus"] . "</td>";
            echo "<td>" . $row["SubscriptionEndDate"] . "</td>";
            // رابط لعملية التعديل
            echo "<td><a href='edit_subscription.php?id=" . $row["SubscriptionID"] . "' class='edit-link'>تعديل</a>";
            // رابط لعملية الحذف
            echo " | <a href='delete_subscription.php?id=" . $row["SubscriptionID"] . "' class='delete-link'>حذف</a></td>";
            echo "</tr>";
        }
    } else {
        echo "<tr><td colspan='7'>لا توجد بيانات لعرضها</td></tr>";
    }
    ?>
</table>
</div>

<!-- زر الصفحة الرئيسية -->
<div class="home-button">
    <a href="indexe.html.">الصفحة الرئيسية</a>
</div>


</body>
</html>

<?php
// إغلاق الاتصال
$conn->close();
?>
