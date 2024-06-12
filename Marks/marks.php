<?php
session_start();

include("db.php"); // Assuming db.php contains your database connection

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $rollNo = $_POST['rollNo'];
    $marathiOral = $_POST['MarathiOral'];
    $marathiWritten = $_POST['MarathiWritten'];
    $marathiTotal = $marathiOral + $marathiWritten; // Calculate MarathiTotal

    $hindiOral = $_POST['HindiOral'];
    $hindiWritten = $_POST['HindiWritten'];
    $hindiTotal = $hindiOral + $hindiWritten; // Calculate HindiTotal

    $englishOral = $_POST['EnglishOral'];
    $englishWritten = $_POST['EnglishWritten'];
    $englishTotal = $englishOral + $englishWritten; // Calculate EnglishTotal

    $mathOral = $_POST['MathOral'];
    $mathWritten = $_POST['MathWritten'];
    $mathTotal = $mathOral + $mathWritten; // Calculate MathTotal

    $sciOral = $_POST['SciOral'];
    $sciWritten = $_POST['SciWritten'];
    $sciTotal = $sciOral + $sciWritten; // Calculate SciTotal

    $soSciOral = $_POST['SoSciOral'];
    $soSciWritten = $_POST['SoSciWritten'];
    $soSciTotal = $soSciOral + $soSciWritten; // Calculate SoSciTotal

    $total = $marathiTotal + $hindiTotal + $englishTotal + $mathTotal + $sciTotal + $soSciTotal;
    $percentage = ($total / (6 * 100)) * 100; 

    $query = "INSERT INTO Marks (rollNo, MarathiOral, MarathiWritten, MarathiTotal, HindiOral, HindiWritten, HindiTotal, EnglishOral, EnglishWritten, EnglishTotal, MathOral, MathWritten, MathTotal, SciOral, SciWritten, SciTotal, SoSciOral, SoSciWritten, SoSciTotal, Total, Percentage) 
              VALUES ('$rollNo', '$marathiOral', '$marathiWritten', '$marathiTotal', '$hindiOral', '$hindiWritten', '$hindiTotal', '$englishOral', '$englishWritten', '$englishTotal', '$mathOral', '$mathWritten', '$mathTotal', '$sciOral', '$sciWritten', '$sciTotal', '$soSciOral', '$soSciWritten', '$soSciTotal', '$total', '$percentage')
              ON DUPLICATE KEY UPDATE
              MarathiOral = '$marathiOral',
              MarathiWritten = '$marathiWritten',
              MarathiTotal = '$marathiTotal',
              HindiOral = '$hindiOral',
              HindiWritten = '$hindiWritten',
              HindiTotal = '$hindiTotal',
              EnglishOral = '$englishOral',
              EnglishWritten = '$englishWritten',
              EnglishTotal = '$englishTotal',
              MathOral = '$mathOral',
              MathWritten = '$mathWritten',
              MathTotal = '$mathTotal',
              SciOral = '$sciOral',
              SciWritten = '$sciWritten',
              SciTotal = '$sciTotal',
              SoSciOral = '$soSciOral',
              SoSciWritten = '$soSciWritten',
              SoSciTotal = '$soSciTotal',
              Total = '$total',
              Percentage = '$percentage'";

    if (mysqli_query($con, $query)) {
        echo "<script type='text/javascript'> alert('Marks added successfully')</script>";
    } else {
        echo "<script type='text/javascript'> alert('Error: " . mysqli_error($con) . "')</script>";
    }
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Teacher's Grade Sheet</title>
<link rel="stylesheet" href="marks.css">
</head>
<body>

<div id="container">
    <h1>Mark-Sheet</h1>
    <form method="POST" action="marks.php">
        <fieldset>
            <legend>Student Information</legend>
            <label for="rollNo">Roll No.:</label>
            <input type="text" id="rollNo" name="rollNo" required>
        </fieldset>

        <fieldset>
            <legend>Subject Marks</legend>
            <table>
                <thead>
                    <tr>
                        <th>Subject</th>
                        <th>Oral (Max 20)</th>
                        <th>Written (Max 80)</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Marathi</td>
                        <td><input type="number" min="0" max="20" name="MarathiOral" required></td>
                        <td><input type="number" min="0" max="80" name="MarathiWritten" required></td>
                    </tr>

                    <tr>
                        <td>Hindi</td>
                        <td><input type="number" min="0" max="20" name="HindiOral" required></td>
                        <td><input type="number" min="0" max="80" name="HindiWritten" required></td>
                    </tr>

                    <tr>
                        <td>English</td>
                        <td><input type="number" min="0" max="20" name="EnglishOral" required></td>
                        <td><input type="number" min="0" max="80" name="EnglishWritten" required></td>
                    </tr>

                    <tr>
                        <td>Mathematics</td>
                        <td><input type="number" min="0" max="20" name="MathOral" required></td>
                        <td><input type="number" min="0" max="80" name="MathWritten" required></td>
                    </tr>

                    <tr>
                        <td>Science</td>
                        <td><input type="number" min="0" max="20" name="SciOral" required></td>
                        <td><input type="number" min="0" max="80" name="SciWritten" required></td>
                    </tr>

                    <tr>
                        <td>Social Science</td>
                        <td><input type="number" min="0" max="20" name="SoSciOral" required></td>
                        <td><input type="number" min="0" max="80" name="SoSciWritten" required></td>
                    </tr>

                </tbody>
            </table>
        </fieldset>

        <button type="submit">Update</button>

    </form>
</div>

<script src="scripts.js"></script>

</body>
</html>