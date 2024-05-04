<!DOCTYPE html>
<html>
<head>
    <title>عرض بيانات الأعضاء</title>
    <style>
        body {
            text-align: right; /* جعل النصوص إلى اليمين */
        }
        table {
            border-collapse: collapse;
            width: 100%;
            direction: rtl; /* تحديد الاتجاه من اليمين إلى اليسار */
        }
        th, td {
            border: 1px solid #ddd;
            padding: 12px;
            text-align: right;
            white-space: nowrap; /* منع النص من الانتقال إلى سطر جديد */
            overflow: hidden; /* منع ظهور شريط التمرير */
        }
        th {
            background-color: #f2f2f2;
            font-weight: bold;
        }
        tr:nth-child(even) {
            background-color: #f9f9f9;
        }
        tr:hover {
            background-color: #f2f2f2;
        }
        .home-link {
            position: absolute;
            top: 20px;
            left: 20px;
        }
        /* تحديد حجم الصورة والخلية */
        td img {
            max-width: 100%; /* جعل الصورة تمتد على عرض الخلية */
            height: auto; /* تجنب التشويه عند تغيير النسبة */
            display: block; /* تجنب الفراغات السفلية */
            margin: auto; /* توسيط الصورة داخل الخلية */
            max-height: 150px; /* تحديد ارتفاع أقصى للصورة */
        }
        /* تحديد عرض الخلية */
        td {
            width: auto; /* تحديد عرض الخلية تلقائيًا بحسب حجم النص */
            max-width: 300px; /* تحديد عرض أقصى للخلية */
        }
    </style>
</head>
<body>

<a href="indexe.html" class="home-link">الصفحة الرئيسية</a>

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

// استعلام SQL لاسترداد البيانات من جدول الأعضاء
$sql = "SELECT *, DATE_FORMAT(MembershipStartDate, '%Y-%m-%d') AS MembershipStartDate FROM members";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // عرض البيانات في جدول HTML
    echo "<h2>بيانات الأعضاء</h2>";
    echo "<table>";
    echo "<tr><th>رقم العضو</th><th>الاسم</th><th>الرقم القومي</th><th>تاريخ الميلاد</th><th>العمر</th><th>الجنس</th><th>النشاط</th><th>العنوان</th><th>رقم الهاتف</th><th>تاريخ بداية القيد</th><th>صورة شخصية</th></tr>";
    while($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>".$row["MemberID"]."</td>";
        echo "<td>".$row["Name"]."</td>";
        echo "<td>".$row["NationalID"]."</td>";
        echo "<td>".$row["DateOfBirth"]."</td>";
        echo "<td>".$row["Age"]."</td>";
        echo "<td>".$row["Gender"]."</td>";
        echo "<td>".$row["Activity"]."</td>";
        echo "<td>".$row["Address"]."</td>";
        echo "<td>".$row["PhoneNumber"]."</td>";
        echo "<td>".$row["MembershipStartDate"]."</td>";
        echo "<td><img src='".$row['ProfilePicture']."' alt='".$row['Name']."'></td>";
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "لا توجد بيانات لعرضها";
}

$conn->close();
?>

</body>
</html>
