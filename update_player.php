<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>تحديث بيانات اللاعب</title>
    <style>
        /* تنسيق النموذج */
        form {
            margin-top: 20px;
        }
        input[type="text"], input[type="date"], input[type="file"] {
            margin-bottom: 10px;
        }
        input[type="submit"] {
            background-color: #007bff;
            color: white;
            padding: 12px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
            transition: background-color 0.3s ease;
        }
        input[type="submit"]:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body dir="rtl">
    <?php
    include 'db_connection.php'; // تضمين ملف الاتصال بقاعدة البيانات

    // استعلام لاسترداد بيانات اللاعب المحدد للتحديث
    $AcademyID = $_GET['AcademyID'];
    $sql = "SELECT * FROM external_academies WHERE AcademyID='$AcademyID'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc(); // استرداد بيانات اللاعب

        // عرض نموذج التحديث مع الحقول المملوءة ببيانات اللاعب المحدد
        ?>
        <h2>تحديث بيانات اللاعب</h2>
        <form action="update_process.php" method="post" enctype="multipart/form-data">
            <input type="hidden" name="AcademyID" value="<?php echo $row['AcademyID']; ?>">
            رقم الأكاديمية: <?php echo $row['AcademyID']; ?><br><br>
            اسم الأكاديمية: <input type="text" name="AcademyName" value="<?php echo $row['AcademyName']; ?>"><br><br>
            اسم اللاعب الجديد: <input type="text" name="PlayerName" value="<?php echo $row['PlayerName']; ?>"><br><br>
            تاريخ الميلاد: <input type="date" name="DateOfBirth" value="<?php echo $row['DateOfBirth']; ?>"><br><br>
            الرقم القومي: <input type="text" name="NationalID" value="<?php echo $row['NationalID']; ?>"><br><br>
            العمر: <input type="text" name="Age" value="<?php echo $row['Age']; ?>"><br><br>
            النشاط: <input type="text" name="Activity" value="<?php echo $row['Activity']; ?>"><br><br>
            العنوان: <input type="text" name="Address" value="<?php echo $row['Address']; ?>"><br><br>
            رقم الهاتف الأول: <input type="text" name="PhoneNumber1" value="<?php echo $row['PhoneNumber1']; ?>"><br><br>
            رقم الهاتف الثاني: <input type="text" name="PhoneNumber2" value="<?php echo $row['PhoneNumber2']; ?>"><br><br>
            صورة البروفايل: <input type="file" name="ProfilePicture" accept="image/*"><br><br>
            تاريخ التسجيل: <input type="date" name="RegistrationStartDate" value="<?php echo $row['RegistrationStartDate']; ?>"><br><br>
            ملاحظات: <input type="text" name="Notes" value="<?php echo $row['Notes']; ?>"><br><br>
            <input type="submit" value="تحديث البيانات">
        </form>
        <?php
    } else {
        echo "لا يوجد لاعب بهذا الرقم";
    }

    // إغلاق الاتصال بقاعدة البيانات
    $conn->close();
    ?>

    <script>
        // تأكيد التحديث
        document.querySelector("form").addEventListener("submit", function(event) {
            if (!confirm("هل أنت متأكد من تحديث بيانات اللاعب؟")) {
                event.preventDefault();
            }
        });
    </script>
</body>
</html>
