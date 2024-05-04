<?php
// تضمين ملف الاتصال بقاعدة البيانات
include 'db_connection.php';

// استعلام SQL لاسترداد بيانات الأعضاء
$sql = "SELECT * FROM members";
$result = $conn->query($sql);

// التحقق من وجود بيانات
if ($result->num_rows > 0) {
    // إخراج البيانات في جدول HTML
    echo "<table border='1'>
    <tr>
    <th>Member ID</th>
    <th>Name</th>
    <th>Date of Birth</th>
    <th>National ID</th>
    <th>Age</th>
    <th>Gender</th>
    <th>Activity</th>
    <th>Address</th>
    <th>Phone Number</th>
    <th>Profile Picture</th>
    <th>Tournament ID</th>
    <th>Event ID</th>
    <th>Subscription ID</th>
    </tr>";
    // إخراج البيانات لكل صف في الجدول
    while($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row["MemberID"]. "</td>";
        echo "<td>" . $row["Name"]. "</td>";
        echo "<td>" . $row["DateOfBirth"]. "</td>";
        echo "<td>" . $row["NationalID"]. "</td>";
        echo "<td>" . $row["Age"]. "</td>";
        echo "<td>" . $row["Gender"]. "</td>";
        echo "<td>" . $row["Activity"]. "</td>";
        echo "<td>" . $row["Address"]. "</td>";
        echo "<td>" . $row["PhoneNumber"]. "</td>";
        echo "<td>" . $row["ProfilePicture"]. "</td>";
        echo "<td>" . $row["TournamentID"]. "</td>";
        echo "<td>" . $row["EventID"]. "</td>";
        echo "<td>" . $row["SubscriptionID"]. "</td>";
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "0 results";
}
// إغلاق الاتصال بقاعدة البيانات
$conn->close();
?>
