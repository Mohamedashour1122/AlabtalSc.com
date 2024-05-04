<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Subscription</title>
</head>
<body>
    <h2>Update Subscription</h2>
    <form action="update_subscription.php" method="POST">
        <input type="hidden" name="subscriptionID" value="123"> <!-- استبدل 123 برقم الاشتراك الذي تريد تحديثه -->
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

        <input type="submit" value="Update Subscription">
    </form>
</body>
</html>
