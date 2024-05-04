<?php
// تضمين ملف الاتصال بقاعدة البيانات
include 'db_connection.php';

// فحص ما إذا تم تقديم النموذج
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // استخراج البيانات من النموذج
    $name = $_POST['name'];
    $dateOfBirth = $_POST['dateOfBirth'];
    $nationalID = $_POST['nationalID'];
    $age = $_POST['age'];
    $gender = $_POST['gender'];
    $activity = $_POST['activity'];
    $address = $_POST['address'];
    $phoneNumber = $_POST['phoneNumber'];
    $profilePicture = $_POST['profilePicture'];
    $tournamentID = $_POST['tournamentID'];
    $eventID = $_POST['eventID'];
    $subscriptionID = $_POST['subscriptionID'];

    // إدراج البيانات في قاعدة البيانات
    $sql = "INSERT INTO members (Name, DateOfBirth, NationalID, Age, Gender, Activity, Address, PhoneNumber, ProfilePicture, TournamentID, EventID, SubscriptionID) 
    VALUES ('$name', '$dateOfBirth', '$nationalID', '$age', '$gender', '$activity', '$address', '$phoneNumber', '$profilePicture', '$tournamentID', '$eventID', '$subscriptionID')";

    if ($conn->query($sql) === TRUE) {
        echo "New member added successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
// إغلاق الاتصال بقاعدة البيانات
$conn->close();
?>
