<!DOCTYPE html>
<html>
<head>
    <title>إضافة عضو جديد</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 600px;
            margin: 50px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0px 0px 10px 0px rgba(0, 0, 0, 0.1);
            direction: rtl; /* توجيه النصوص إلى اليمين */
        }

        h2 {
            text-align: center;
            color: #333;
        }

        form {
            margin-top: 20px;
        }

        input[type="text"],
        input[type="date"],
        input[type="number"],
        input[type="file"],
        select {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        input[type="submit"] {
            width: 100%;
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

        .error-message {
            color: red;
            margin-top: 10px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            font-weight: bold;
            display: block;
            margin-bottom: 5px;
            text-align: right; /* توجيه النص إلى اليمين */
        }

        .form-group input[type="file"] {
            display: none;
        }

        .form-group .custom-file-upload {
            border: 1px solid #ccc;
            border-radius: 4px;
            display: inline-block;
            padding: 6px 12px;
            cursor: pointer;
            background-color: #f8f9fa;
            color: #343a40;
        }

        .form-group .custom-file-upload:hover {
            background-color: #e2e6ea;
        }

        .form-group img {
            max-width: 100%;
            height: auto;
            display: block;
            margin-top: 10px;
        }

        .home-button {
            text-align: center;
            margin-top: 20px;
        }

        .home-button a {
            text-decoration: none;
            padding: 10px 20px;
            background-color: #6c757d;
            color: #fff;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }

        .home-button a:hover {
            background-color: #5a6268;
        }

        .success-message {
            text-align: center;
            background-color: #28a745;
            color: white;
            padding: 10px;
            border-radius: 5px;
            margin-top: 20px;
        }
    </style>
</head>
<body>

<div class="container">
    <h2>إضافة عضو جديد</h2>
    <?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // اتصال بقاعدة البيانات
        $servername = "localhost";
        $username = "root";
        $password = "01033744372@";
        $dbname = "systemalabtal";

        // إنشاء الاتصال
        $conn = new mysqli($servername, $username, $password, $dbname);

        // التحقق من الاتصال
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // استخراج البيانات من النموذج
        $name = isset($_POST['name']) ? $_POST['name'] : '';
        $dateOfBirth = isset($_POST['dateOfBirth']) ? $_POST['dateOfBirth'] : '';
        $nationalID = isset($_POST['nationalID']) ? $_POST['nationalID'] : '';
        $age = isset($_POST['age']) ? $_POST['age'] : '';
        $gender = isset($_POST['gender']) ? $_POST['gender'] : '';
        $activity = isset($_POST['activity']) ? $_POST['activity'] : '';
        $address = isset($_POST['address']) ? $_POST['address'] : '';
        $phoneNumber = isset($_POST['phoneNumber']) ? $_POST['phoneNumber'] : '';
        $membershipStartDate = isset($_POST['membershipStartDate']) ? $_POST['membershipStartDate'] : '';

        // استعلام SQL لإدراج البيانات
        $sql = "INSERT INTO members (Name, DateOfBirth, NationalID, Age, Gender, Activity, Address, PhoneNumber, ProfilePicture, MembershipStartDate)
        VALUES ('$name', '$dateOfBirth', '$nationalID', '$age', '$gender', '$activity', '$address', '$phoneNumber', 'profilePicture', '$membershipStartDate')";

        if ($conn->query($sql) === TRUE) {
            echo '<div class="success-message">تمت إضافة العضو بنجاح</div>';
            echo '<script>window.location.href = window.location.href;</script>'; // إعادة تحميل الصفحة بعد 3 ثواني
        } else {
            echo "خطأ في إضافة العضو: " . $conn->error;
        }

        // إغلاق الاتصال بقاعدة البيانات
        $conn->close();
    }
    ?>
    <form id="memberForm" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" enctype="multipart/form-data">
        <div class="form-group">
            <label for="name">الاسم:</label>
            <input type="text" id="name" name="name" required>
        </div>
        <div class="form-group">
            <label for="dateOfBirth">تاريخ الميلاد:</label>
            <input type="date" id="dateOfBirth" name="dateOfBirth" required>
        </div>
        <div class="form-group">
            <label for="nationalID">الرقم القومي:</label>
            <input type="text" id="nationalID" name="nationalID" required>
        </div>
        <div class="form-group">
            <label for="age">العمر:</label>
            <input type="number" id="age" name="age" required>
        </div>
        <div class="form-group">
            <label for="gender">الجنس:</label>
            <select id="gender" name="gender" required>
                <option value="ذكر">ذكر</option>
                <option value="أنثى">أنثى</option>
            </select>
        </div>
        <div class="form-group">
            <label for="activity">النشاط:</label>
            <select id="activity" name="activity" required>
                <?php
                // اتصال بقاعدة البيانات
                $servername = "localhost";
                $username = "root";
                $password = "01033744372@";
                $dbname = "systemalabtal";

                // إنشاء الاتصال
                $conn = new mysqli($servername, $username, $password, $dbname);

                // التحقق من الاتصال
                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }

                // استعلام لاختيار أسماء الأنشطة
                $sql = "SELECT ActivityName FROM activities";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        echo "<option value='".$row["ActivityName"]."'>".$row["ActivityName"]."</option>";
                    }
                } else {
                    echo "<option value=''>لا يوجد أنشطة متاحة</option>";
                }
                // إغلاق الاتصال بقاعدة البيانات
                $conn->close();
                ?>
            </select>
        </div>
        <div class="form-group">
            <label for="address">العنوان:</label>
            <input type="text" id="address" name="address" required>
        </div>
        <div class="form-group">
            <label for="phoneNumber">رقم الهاتف:</label>
            <input type="text" id="phoneNumber" name="phoneNumber" required>
        </div>
        <div class="form-group">
            <label for="profilePicture">صورة شخصية:</label>
            <label class="custom-file-upload">
                <input type="file" id="profilePicture" name="profilePicture" accept="image/*" onchange="previewImage(event)">
                تحميل الصورة
            </label>
            <img id="imagePreview" src="#" alt="صورة الملف" style="display: none;">
        </div>
        <!-- تم إضافة الحقل الجديد هنا -->
        <div class="form-group">
            <label for="membershipStartDate">تاريخ بداية القيد:</label>
            <input type="date" id="membershipStartDate" name="membershipStartDate" required>
        </div>
        <input type="submit" value="إضافة عضو">
    </form>
</div>

<script>
    function previewImage(event) {
        var reader = new FileReader();
        reader.onload = function () {
            var output = document.getElementById('imagePreview');
            output.src = reader.result;
            output.style.display = 'block';
        }
        reader.readAsDataURL(event.target.files[0]);
    }
</script>

<!-- زر الصفحة الرئيسية -->
<div class="home-button">
    <a href="indexe.html">الصفحة الرئيسية</a>
</div>

</body>
</html>
