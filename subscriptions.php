<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Subscriptions</title>
</head>
<body>
    <h2>Add Subscription</h2>
    <form action="process_subscription.php" method="POST">
        <label for="activityName">Activity Name:</label><br>
        <input type="text" id="activityName" name="activityName"><br><br>
        <label for="subscriptionPrice">Subscription Price:</label><br>
        <input type="text" id="subscriptionPrice" name="subscriptionPrice"><br><br>
        <label for="subscriptionDuration">Subscription Duration:</label><br>
        <input type="text" id="subscriptionDuration" name="subscriptionDuration"><br><br>
        <label for="renewalStatus">Renewal Status:</label><br>
        <select id="renewalStatus" name="renewalStatus">
            <option value="Yes">Yes</option>
            <option value="No">No</option>
        </select><br><br>
        <label for="subscriptionEndDate">Subscription End Date:</label><br>
        <input type="date" id="subscriptionEndDate" name="subscriptionEndDate"><br><br>
        <input type="submit" value="Add Subscription">
    </form>

    <h2>Subscriptions List</h2>
    <table border="1">
        <tr>
            <th>Subscription ID</th>
            <th>Activity Name</th>
            <th>Subscription Price</th>
            <th>Subscription Duration</th>
            <th>Renewal Status</th>
            <th>Subscription End Date</th>
            <th>Actions</th>
        </tr>
        <!-- Here we will display subscriptions from the database -->
        <?php
        // إعداد الاتصال بقاعدة البيانات
        $servername = "localhost";
        $username = "root";
        $password = "01033744372@";
        $dbname = "systemalabtal";

        $conn = new mysqli($servername, $username, $password, $dbname);

        if ($conn->connect_error) {
            die("فشل الاتصال: " . $conn->connect_error);
        }

        // استعلام SQL لاسترداد البيانات من جدول الاشتراكات
        $sql = "SELECT * FROM subscriptions";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            // عرض البيانات في الجدول
            while($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row["SubscriptionID"] . "</td>";
                echo "<td>" . $row["ActivityName"] . "</td>";
                echo "<td>" . $row["SubscriptionPrice"] . "</td>";
                echo "<td>" . $row["SubscriptionDuration"] . "</td>";
                echo "<td>" . $row["RenewalStatus"] . "</td>";
                echo "<td>" . $row["SubscriptionEndDate"] . "</td>";
                echo "<td><a href='edit_subscription.php?id=" . $row["SubscriptionID"] . "'>Edit</a> | <a href='delete_subscription.php?id=" . $row["SubscriptionID"] . "'>Delete</a></td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='7'>0 results</td></tr>";
        }
        $conn->close();
        ?>
    </table>
</body>
</html>
