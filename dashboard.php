<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>نظام الإدارة الإلكتروني لنادي الأبطال الرياضي الرسمي</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }
        header {
            background-color: #333;
            color: #fff;
            padding: 20px;
            text-align: center;
        }
        nav {
            background-color: #444;
            padding: 10px;
        }
        nav ul {
            list-style-type: none;
            margin: 0;
            padding: 0;
            text-align: center;
        }
        nav ul li {
            display: inline;
            margin-right: 20px;
        }
        nav ul li a {
            text-decoration: none;
            color: #fff;
            padding: 10px;
            border-radius: 5px;
            background-color: #666;
        }
        .container {
            margin: 20px;
        }
        .content {
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            margin-top: 20px;
        }
        .tab-content {
            display: none;
        }
        .tab-content.active {
            display: block;
        }
    </style>
</head>
<body>
    <header>
        <h1>نظام الإدارة الإلكتروني لنادي الأبطال الرياضي الرسمي</h1>
    </header>
    <nav>
        <ul>
            <li><a href="#activities">إدارة الأنشطة</a></li>
            <li><a href="#members">إدارة الأعضاء</a></li>
            <li><a href="#tournaments">إدارة البطولات</a></li>
            <li><a href="#subscriptions">إدارة الاشتراكات</a></li>
            <li><a href="#events">إدارة الفعاليات</a></li>
            <li><a href="#external-academies">إدارة الأكاديميات الخارجية</a></li>
        </ul>
    </nav>
    <div class="container">
        <div id="activities" class="tab-content">
            <div class="content">
                <!-- صفحة إدارة الأنشطة -->
                <h2>إدارة الأنشطة</h2>
                <!-- هنا يمكنك وضع قائمة الأنشطة وأي عمليات إضافة أو تعديل أو حذف -->
            </div>
        </div>
        <div id="members" class="tab-content">
            <div class="content">
                <!-- صفحة إدارة الأعضاء -->
                <h2>إدارة الأعضاء</h2>
                <!-- هنا يمكنك وضع قائمة الأعضاء وأي عمليات إضافة أو تعديل أو حذف -->
            </div>
        </div>
        <div id="tournaments" class="tab-content">
            <div class="content">
                <!-- صفحة إدارة البطولات -->
                <h2>إدارة البطولات</h2>
                <!-- هنا يمكنك وضع قائمة البطولات وأي عمليات إضافة أو تعديل أو حذف -->
            </div>
        </div>
        <div id="subscriptions" class="tab-content">
            <div class="content">
                <!-- صفحة إدارة الاشتراكات -->
                <h2>إدارة الاشتراكات</h2>
                <!-- هنا يمكنك وضع قائمة الاشتراكات وأي عمليات إضافة أو تعديل أو حذف -->
            </div>
        </div>
        <div id="events" class="tab-content">
            <div class="content">
                <!-- صفحة إدارة الفعاليات -->
                <h2>إدارة الفعاليات</h2>
                <!-- هنا يمكنك وضع قائمة الفعاليات وأي عمليات إضافة أو تعديل أو حذف -->
            </div>
        </div>
        <div id="external-academies" class="tab-content">
            <div class="content">
                <!-- صفحة إدارة الأكاديميات الخارجية -->
                <h2>إدارة الأكاديميات الخارجية</h2>
                <!-- هنا يمكنك وضع قائمة الأكاديميات الخارجية وأي عمليات إضافة أو تعديل أو حذف -->
            </div>
        </div>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const tabs = document.querySelectorAll("nav ul li a");
            const tabContents = document.querySelectorAll(".tab-content");

            tabs.forEach(tab => {
                tab.addEventListener("click", function(e) {
                    e.preventDefault();
                    const targetId = this.getAttribute("href").substring(1);
                    tabContents.forEach(content => {
                        content.classList.remove("active");
                    });
                    document.getElementById(targetId).classList.add("active");
                });
            });
        });
    </script>
</body>
</html>
