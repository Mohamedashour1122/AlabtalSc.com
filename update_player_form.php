<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>تحديث بيانات اللاعب</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            direction: rtl;
        }
        .container {
            width: 50%;
            margin: auto;
        }
        .form-group {
            margin-bottom: 20px;
        }
        label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }
        input[type="text"], input[type="date"] {
            width: calc(100% - 12px);
            padding: 5px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            float: right;
        }
        input[type="submit"]:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>

<div class="container">
    <h2>تحديث بيانات اللاعب</h2>
    <form action="update_player_process.php" method="POST">
        <div class="form-group">
            <label for="AcademyID">رقم الأكاديمية:</label>
            <input type="text" id="AcademyID" name="AcademyID" readonly>
        </div>
        <div class="form-group">
            <label for="PlayerName">اسم اللاعب الجديد:</label>
            <input type="text" id="PlayerName" name="PlayerName">
        </div>
        <div class="form-group">
            <label for="DateOfBirth">تاريخ الميلاد:</label>
            <input type="date" id="DateOfBirth" name="DateOfBirth">
        </div>
        <div class="form-group">
            <label for="NationalID">الرقم القومي:</label>
            <input type="text" id="NationalID" name="NationalID">
        </div>
        <div class="form-group">
            <label for="Age">العمر:</label>
            <input type="text" id="Age" name="Age">
        </div>
        <div class="form-group">
            <label for="Activity">النشاط:</label>
            <input type="text" id="Activity" name="Activity">
        </div>
        <div class="form-group">
            <label for="Address">العنوان:</label>
            <input type="text" id="Address" name="Address">
        </div>
        <div class="form-group">
            <label for="PhoneNumber1">رقم الهاتف الأول:</label>
            <input type="text" id="PhoneNumber1" name="PhoneNumber1">
        </div>
        <div class="form-group">
            <label for="PhoneNumber2">رقم الهاتف الثاني:</label>
            <input type="text" id="PhoneNumber2" name="PhoneNumber2">
        </div>
        <div class="form-group">
            <label for="ProfilePicture">صورة الملف الشخصي:</label>
            <input type="text" id="ProfilePicture" name="ProfilePicture">
        </div>
        <div class="form-group">
            <label for="RegistrationStartDate">تاريخ التسجيل:</label>
            <input type="date" id="RegistrationStartDate" name="RegistrationStartDate">
        </div>
        <div class="form-group">
            <label for="Notes">ملاحظات:</label>
            <input type="text" id="Notes" name="Notes">
        </div>
        <div class="form-group">
            <input type="submit" value="تحديث">
        </div>
    </form>
</div>

</body>
</html>
