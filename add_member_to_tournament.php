<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>إضافة عضو إلى البطولة</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f9f9f9;
            margin: 0;
            padding: 0;
            text-align: center;
        }
        h2 {
            color: #333;
        }
        form {
            max-width: 400px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        label {
            display: block;
            margin-bottom: 10px;
            color: #333;
        }
        select, input[type="number"], input[type="submit"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
            font-size: 16px;
        }
        input[type="submit"] {
            background-color: #007bff;
            color: #fff;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
        input[type="submit"]:hover {
            background-color: #0056b3;
        }
        .back-button {
            display: inline-block;
            padding: 10px 20px;
            background-color: #6c757d;
            color: #fff;
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }
        .back-button:hover {
            background-color: #5a6268;
        }
    </style>
</head>
<body>

<?php
require_once 'db_connection.php';

$sql_members = "SELECT * FROM members";
$result_members = mysqli_query($conn, $sql_members);

$sql_tournaments = "SELECT * FROM tournaments";
$result_tournaments = mysqli_query($conn, $sql_tournaments);
?>

<h2>إضافة عضو إلى البطولة</h2>
<form method='post' action='process_add_member_to_tournament.php'>
    <label for='memberID'>اختر اسم العضو:</label><br>
    <select name='memberID' id='memberID'>
        <?php
        while($row_member = mysqli_fetch_assoc($result_members)) {
            echo "<option value='" . $row_member["MemberID"] . "'>" . $row_member["Name"] . "</option>";
        }
        ?>
    </select><br><br>

    <label for='tournamentID'>اختر اسم البطولة:</label><br>
    <select name='tournamentID' id='tournamentID'>
        <?php
        while($row_tournament = mysqli_fetch_assoc($result_tournaments)) {
            echo "<option value='" . $row_tournament["TournamentID"] . "'>" . $row_tournament["TournamentName"] . "</option>";
        }
        ?>
    </select><br><br>

    <label for='position'>المركز:</label><br>
    <input type='number' id='position' name='position' required><br><br>

    <input type='submit' value='إضافة عضو'>
</form>

<?php
$conn->close();
?>
<a href="indexe.html" class="back-button">العودة للصفحة الرئيسية</a>
</body>
</html>
