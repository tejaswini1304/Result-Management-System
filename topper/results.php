<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="results.css">
    <title>Student Marks</title>

</head>
<body>
    <div id="container">
    <h2>Student Results</h2>
    <table>
        <tr>
            <th>Roll No</th>
            <th>Name</th>
            <th>Percentage</th>
        </tr>
        <?php
        // Database connection
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "school";

        $conn = new mysqli($servername, $username, $password, $dbname);
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Fetching data from database
        $sql = "SELECT student_profile.rollNo, student_profile.Name, marks.Percentage FROM student_profile JOIN marks ON student_profile.rollNo = marks.rollNo ORDER BY marks.Percentage DESC";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            // Output data of each row
            while($row = $result->fetch_assoc()) {
                echo "<tr><td>".$row["rollNo"]."</td><td>".$row["Name"]."</td><td>".$row["Percentage"]."</td></tr>";
            }
        } else {
            echo "0 results";
        }
        $conn->close();
        ?>
    </table>
    </div>
</body>
</html>
