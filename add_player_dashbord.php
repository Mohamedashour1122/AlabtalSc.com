<!DOCTYPE html>
<html>
<head>
    <title>إضافة لاعب جديد</title>
    <style>
        /* الستايلات هنا */
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
        textarea {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

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

        .success-message {
            text-align: center;
            background-color: #28a745;
            color: white;
            padding: 10px;
            border-radius: 5px;
            margin-top: 20px;
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
    </style>
</head>
<body>

<div class="container">
    <h2>إضافة لاعب جديد</h2>
    <?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // معلومات الاتصال بقاعدة البيانات
        $servername = "localhost";
        $username = "root";
        $password = "01033744372@";
        $dbname = "systemalabtal"; // استبدال "اسم_قاعدة_البيانات" بـ "systemalabtal"

        // إنشاء الاتصال
        $conn = new mysqli($servername, $username, $password, $dbname);

        // التحقق من الاتصال
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // استخراج البيانات من النموذج
        $PlayerName = isset($_POST['PlayerName']) ? $_POST['PlayerName'] : '';
        $DateOfBirth = isset($_POST['DateOfBirth']) ? $_POST['DateOfBirth'] : '';
        $NationalID = isset($_POST['NationalID']) ? $_POST['NationalID'] : '';
        $Age = isset($_POST['Age']) ? $_POST['Age'] : '';
        $Activity = isset($_POST['Activity']) ? $_POST['Activity'] : '';
        $Address = isset($_POST['Address']) ? $_POST['Address'] : '';
        $PhoneNumber1 = isset($_POST['PhoneNumber1']) ? $_POST['PhoneNumber1'] : '';
        $PhoneNumber2 = isset($_POST['PhoneNumber2']) ? $_POST['PhoneNumber2'] : '';
        $ProfilePicture = 'uploads/' . basename($_FILES["ProfilePicture"]["name"]);
        $RegistrationStartDate = isset($_POST['RegistrationStartDate']) ? $_POST['RegistrationStartDate'] : '';
        $Notes = isset($_POST['Notes']) ? $_POST['Notes'] : ''; // تم تعديل الحقل هنا من "Note" إلى "Notes"
        $AcademyName = isset($_POST['AcademyName']) ? $_POST['AcademyName'] : ''; // الحقل الجديد

        // استعلام SQL لإدراج البيانات
        $sql = "INSERT INTO academies (PlayerName, DateOfBirth, NationalID, Age, Activity, Address, PhoneNumber1, PhoneNumber2, ProfilePicture, RegistrationStartDate, Notes, AcademyName) VALUES ('$PlayerName', '$DateOfBirth', '$NationalID', '$Age', '$Activity', '$Address', '$PhoneNumber1', '$PhoneNumber2', '$ProfilePicture', '$RegistrationStartDate', '$Notes', '$AcademyName')"; // تمت إضافة الحقل الجديد

        if ($conn->query($sql) === TRUE) {
            echo '<div class="success-message">تمت إضافة اللاعب بنجاح</div>';
        } else {
            echo "خطأ في إضافة اللاعب: " . $conn->error;
        }

        // إغلاق الاتصال بقاعدة البيانات
        $conn->close();
    }
    ?>
    <form id="playerForm" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" enctype="multipart/form-data">
        <div class="form-group">
            <label for="PlayerName">اسم اللاعب:</label>
            <input type="text" id="PlayerName" name="PlayerName" required>
        </div>
        <div class="form-group">
            <label for="DateOfBirth">تاريخ الميلاد:</label>
            <input type="date" id="DateOfBirth" name="DateOfBirth" required>
        </div>
        <div class="form-group">
            <label for="NationalID">الرقم القومي:</label>
            <input type="text" id="NationalID" name="NationalID" required>
        </div>
        <div class="form-group">
            <label for="Age">العمر:</label>
            <input type="number" id="Age" name="Age" required>
        </div>
        <div class="form-group">
            <label for="Activity">النشاط:</label>
            <input type="text" id="Activity" name="Activity" required>
        </div>
        <div class="form-group">
            <label for="Address">العنوان:</label>
            <input type="text" id="Address" name="Address" required>
        </div>
        <div class="form-group">
            <label for="PhoneNumber1">رقم الهاتف الأول:</label>
            <input type="text" id="PhoneNumber1" name="PhoneNumber1" required>
        </div>
        <div class="form-group">
            <label for="PhoneNumber2">رقم الهاتف الثاني:</label>
            <input type="text" id="PhoneNumber2" name="PhoneNumber2">
        </div>
        <div class="form-group">
            <label for="ProfilePicture">صورة اللاعب:</label>
            <input type="file" id="ProfilePicture" name="ProfilePicture" accept="image/*" required>
        </div>
        <div class="form-group">
            <label for="RegistrationStartDate">تاريخ بداية التسجيل:</label>
            <input type="date" id="RegistrationStartDate" name="RegistrationStartDate" required>
        </div>
        <div class="form-group">
            <label for="Notes">ملاحظات:</label> <!-- تم تعديل اسم الحقل هنا من "Note" إلى "Notes" -->
            <textarea id="Notes" name="Notes"></textarea> <!-- تم تعديل اسم الحقل هنا -->
        </div>
        <div class="form-group">
    <label for="AcademyName">اسم الأكاديمية:</label>
    <select id="AcademyName" name="AcademyName" required>
        <?php
        $servername = "localhost";
        $username = "root";
        $password = "01033744372@";
        $dbname = "systemalabtal";

        $conn = new mysqli($servername, $username, $password, $dbname);
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
$sql = "SELECT AcademyName FROM academies";


        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo '<option value="'.$row['AcademyName'].'">'.$row['AcademyName'].'</option>';
            }
        } else {
            echo '<option value="">لا توجد بيانات</option>';
        }

        $conn->close();
        ?>
    </select>
</div>

        <input type="submit" value="إضافة لاعب">
    </form>
</div>

<!-- زر الصفحة الرئيسية -->
<div class="home-button">
    <a href="ACADEMY.html">الصفحة الرئيسية</a>
</div>

<script>
    if (window.history.replaceState) {
        window.history.replaceState(null, null, window.location.href);
    }
</script>

</body>
</html>
