<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>عرض الأنشطة</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="activities-container">
        <h2>الأنشطة</h2>
        <div id="activities-list"></div>
    </div>

    <script>
        // عند تحميل الصفحة، سنستدعي الوظيفة loadActivities() لجلب البيانات
        window.onload = function() {
            loadActivities();
        };

        function loadActivities() {
            // جلب بيانات الأنشطة باستخدام XMLHttpRequest
            var xhr = new XMLHttpRequest();
            xhr.onreadystatechange = function() {
                if (xhr.readyState === XMLHttpRequest.DONE) {
                    if (xhr.status === 200) {
                        // بعد تلقي البيانات، عرضها على الصفحة
                        displayActivities(xhr.responseText);
                    } else {
                        console.error('حدث خطأ أثناء جلب البيانات:', xhr.status);
                    }
                }
            };

            xhr.open('GET', 'fetch_activities.php', true);
            xhr.send();
        }

        function displayActivities(data) {
            var activitiesList = document.getElementById("activities-list");
            var activitiesData = JSON.parse(data);

            activitiesData.forEach(function(activity) {
                var activityInfo = document.createElement("div");
                activityInfo.classList.add("activity-info");
                activityInfo.innerHTML = "<h3>" + activity.ActivityName + "</h3>" +
                                         "<p>اسم المدرب: " + activity.TrainerName + "</p>" +
                                         "<p>تاريخ البدء: " + activity.StartDate + "</p>";
                activitiesList.appendChild(activityInfo);
            });
        }
    </script>
</body>
</html>
