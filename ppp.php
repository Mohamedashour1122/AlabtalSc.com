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
