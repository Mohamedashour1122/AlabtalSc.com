<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>بيان حالة لاعب</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/jsbarcode@3.11.0/dist/JsBarcode.all.min.css">
    <style>
        /* تنسيق الشاشة */
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f8f8f8;
            padding: 20px;
            direction: rtl; /* تحديد اتجاه الكتابة إلى اليمين */
            position: relative; /* تحديد موقع الباركود بالنسبة للعنصر الرئيسي */
        }
        .container {
            max-width: 794px; /* حجم الصفحة A4 */
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .header {
            text-align: right;
            margin-bottom: 20px;
            overflow: hidden; /* لتجنب التداخل مع العناصر الأخرى */
        }
        .header h1 {
            color: #333;
            margin: 0;
            font-size: 24px; /* تحديد حجم الخط */
        }
        .logo {
            float: left;
            margin-right: 20px;
            margin-bottom: 20px; /* تباعد بين اللوجو والصورة */
        }
        .logo img {
            width: 100px; /* تحديد عرض اللوجو */
            height: auto; /* تحديد ارتفاع اللوجو */
            border-radius: 10px; /* زوايا مستديرة */
        }
        .license {
            float: right;
            margin-top: 20px;
        }
        .license p {
            margin: 0;
            font-size: 14px; /* تحديد حجم الخط */
            color: #555;
        }
        h1 {
            text-align: center;
            margin-bottom: 20px;
            color: #333;
        }
        .profile-picture {
            max-width: 200px; /* تحديد عرض الصورة */
            max-height: 200px; /* تحديد ارتفاع الصورة */
            border-radius: 10px; /* زوايا مستديرة */
            float: left; /* تحديد موقع الصورة على اليسار */
            margin-right: 20px; /* تحديد المسافة بين الصورة والنص */
        }
        .barcode-container {
            text-align: center;
            position: absolute; /* تحديد موقع الباركود بالنسبة للعنصر الرئيسي */
            top: 15%; /* وضع الباركود في الوسط بشكل عمودي */
            left: 45%; /* وضع الباركود في الوسط بشكل أفقي */
            transform: translate(-40%, -40%); /* تصحيح موقع الباركود */
        }
        #barcode {
            width: 200px; /* تحديد عرض الباركود */
            height: auto; /* يتم تعيين الارتفاع تلقائيًا بناءً على النسبة */
        }
        .back-button,
        .print-button {
            display: block;
            margin: 20px auto;
            padding: 10px 20px;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 5px;
            text-align: center;
            cursor: pointer;
            text-decoration: none;
        }
        .back-button:hover,
        .print-button:hover {
            background-color: #0056b3;
        }
        .details {
            margin-bottom: 20px;
            text-align: right;
        }
        .details span {
            display: block;
            margin-bottom: 10px;
            font-weight: bold;
            font-size: 18px; /* تحديد حجم الخط */
        }
        .sub-table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        .sub-table th,
        .sub-table td {
            border: 1px solid #ddd;
            padding: 12px;
            text-align: center;
        }
        .sub-table th {
            background-color: #f2f2f2;
            color: #333;
            font-weight: bold;
            font-size: 18px; /* تحديد حجم الخط */
        }
        @media print {
            body {
                background-color: #fff; /* تغيير لون الخلفية للطباعة */
            }
            .container {
                border: none; /* إزالة الحدود عند الطباعة */
                box-shadow: none; /* إزالة الظل عند الطباعة */
            }
            .back-button,
            .print-button {
                display: none; /* إخفاء الأزرار عند الطباعة */
            }
        }
    </style>
</head>
<body>
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

    // استعلام SQL لجلب البيانات المطلوبة
    $sql = "SELECT members.Name, members.NationalID, members.DateOfBirth, members.ProfilePicture, members.Activity, 
            GROUP_CONCAT(tournaments.TournamentName) AS Tournaments, GROUP_CONCAT(events.EventName) AS Events
            FROM members 
            LEFT JOIN memberstournaments ON members.MemberID = memberstournaments.MemberID 
            LEFT JOIN tournaments ON memberstournaments.TournamentID = tournaments.TournamentID 
            LEFT JOIN membersevents ON members.MemberID = membersevents.MemberID
            LEFT JOIN events ON membersevents.EventID = events.EventID
            WHERE members.NationalID = ?
            GROUP BY members.MemberID";
    
    // تحضير الاستعلام
    $stmt = $conn->prepare($sql);

    // ربط المتغيرات
    $stmt->bind_param("s", $memberID);

    // تنفيذ الاستعلام
    $stmt->execute();

    // الحصول على النتائج
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<div class='container'>";
            echo "<div class='header'>";
            echo "<div class='logo'><img src='logo_club.jpg' alt='لوجو النادي'></div>";
            echo "<h1>ابطال مغاغة الرياضية</h1>";
            echo "<div class='license'><p>                                     مرخصة من وزارة الشباب والرياضة برقم  389/1                                                         ب                               </p></div>";                                                        echo "<div class='license'><p>بيان حـــــــالة لاعــــــب             </p></div>";

            
          
            echo "</div>";
            echo "<div class='details'>";
            echo "<img class='profile-picture' src='" . $row['ProfilePicture'] . "' alt='صورة شخصية'>";
            echo "<span>الاســــــــــــــــم: " . $row['Name'] . "</span>";
            echo "<span>تاريخ الميلاد: " . $row['DateOfBirth'] . "</span>";
            echo "<span>الرقم القومي: " . $row['NationalID'] . "</span>";
            echo "<span>النشـــــــــــــــاط: " . $row['Activity'] . "</span>";
            echo "</div>";
            
            // عرض الفعاليات
            echo "<h2>الفعاليات المشارك بها</h2>";
            echo "<table class='sub-table'>";
            echo "<tr><th>الفعاليات</th></tr>";
            foreach (explode(',', $row['Events']) as $event) {
                echo "<tr><td>$event</td></tr>";
            }
            echo "</table>";

            // عرض البطولات
            echo "<h2>البطولات المشارك بها</h2>";
            echo "<table class='sub-table'>";
            echo "<tr><th>البطولات</th></tr>";
            foreach (explode(',', $row['Tournaments']) as $tournament) {
                echo "<tr><td>$tournament</td></tr>";
            }
            echo "</table>";

            // عرض الباركود
            echo "<div class='barcode-container'>";
            echo "<svg id='barcode'></svg>";
            echo "</div>";

            // زر العودة للصفحة الرئيسية
            echo "<a href='index.html' class='back-button'>العودة للصفحة الرئيسية</a>";
            // زر الطباعة
            echo "<button class='print-button' onclick='printTable()'>طباعة</button>";
            echo "</div>"; // إغلاق div الـ container

            // إنشاء الباركود باستخدام JsBarcode
            echo "<script src='https://cdn.jsdelivr.net/npm/jsbarcode@3.11.0/dist/JsBarcode.all.min.js'></script>";
            echo "<script>";
            echo "JsBarcode('#barcode', '" . $memberID . "', {width: 2, height: 60});";
            echo "</script>";
        }
    } else {
        echo "لم يتم العثور على أي نتائج";
    }

    $stmt->close();
} else {
    echo "لا يوجد رقم عضو محدد";
}

$conn->close();
?>

<script>
    function printTable() {
        window.print();
    }
</script>

</body>
</html>
