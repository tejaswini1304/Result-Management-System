<?php
session_start(); // Start the session

// Include database connection
include("db.php");

// Function to get student details (name, std, div) for a specific roll number
function getStudentDetails($conn, $rollNo) {
    // SQL query to retrieve student details based on roll number
    $sql = "SELECT Name, Std, Division FROM student_profile WHERE rollNo = '$rollNo'";
    $result = $conn->query($sql);

    // Check if there are results
    if ($result && $result->num_rows > 0) {
        return $result->fetch_assoc(); // Return student details
    } else {
        return false; // Return false if no details found for the roll number
    }
}

// Function to get marks for a specific subject and roll number
function getSubjectMarks($conn, $rollNo, $subject) {
    // SQL query to retrieve marks for the specified subject and roll number
    $sql = "SELECT {$subject}Total AS marks FROM marks WHERE RollNo = '$rollNo'";
    $result = $conn->query($sql);

    // Check if there are results
    if ($result && $result->num_rows > 0) {
        $row = $result->fetch_assoc();
        return $row["marks"]; // Return marks for the subject
    } else {
        return "NA"; // Return "NA" if no marks found for the subject and roll number
    }
}

// Function to get total percentage
function getTotalPercentage($conn, $rollNo) {
    // SQL query to retrieve total marks for the student
    $sql = "SELECT SUM(Total) AS total FROM marks WHERE RollNo = '$rollNo'";
    $result = $conn->query($sql);

    if ($result && $result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $totalMarks = $row['total'];
        $totalPercentage = ($totalMarks / 600) * 100; // Assuming max marks are 600 for all subjects combined
        return number_format($totalPercentage, 2) . "%"; // Return percentage with two decimal places
    } else {
        return "NA";
    }
}

// Function to calculate and get total grade
function getTotalGrade($conn, $rollNo) {
    // SQL query to retrieve total marks for the student
    $sql = "SELECT SUM(Total) AS total FROM marks WHERE RollNo = '$rollNo'";
    $result = $conn->query($sql);

    if ($result && $result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $totalMarks = $row['total'];
        $totalPercentage = ($totalMarks / 600) * 100; // Assuming max marks are 600 for all subjects combined

        // Determine grade based on percentage
        if ($totalPercentage >= 90) {
            return "A+";
        } elseif ($totalPercentage >= 80) {
            return "A";
        } elseif ($totalPercentage >= 70) {
            return "B";
        } elseif ($totalPercentage >= 60) {
            return "C";
        } elseif ($totalPercentage >= 50) {
            return "D";
        } else {
            return "F";
        }
    } else {
        return "NA";
    }
}

// Check if a roll number is searched
if(isset($_POST['rollNumber'])) {
    $rollNoToCheck = $_POST['rollNumber'];

    // Get student details
    $studentDetails = getStudentDetails($conn, $rollNoToCheck);

    if($studentDetails) {
        // Output student details
        $name = $studentDetails['Name'];
        $std = $studentDetails['Std'];
        $div = $studentDetails['Division'];

        // Output marks for each subject
        $englishMarks = getSubjectMarks($conn, $rollNoToCheck, 'English');
        $hindiMarks = getSubjectMarks($conn, $rollNoToCheck, 'Hindi');
        $marathiMarks = getSubjectMarks($conn, $rollNoToCheck, 'Marathi');
        $sciMarks = getSubjectMarks($conn, $rollNoToCheck, 'Sci');
        $mathMarks = getSubjectMarks($conn, $rollNoToCheck, 'Math');
        $soSciMarks = getSubjectMarks($conn, $rollNoToCheck, 'SoSci');

        // Output total percentage and grade
        $totalPercentage = getTotalPercentage($conn, $rollNoToCheck);
        $totalGrade = getTotalGrade($conn, $rollNoToCheck);
    } else {
        echo "No student found with the provided roll number.";
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Report Card</title>
    <link rel="stylesheet" href="result.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body>
    <div class="container">
        <div class="box">
            <h1>Student Report Card</h1>
            <div class="personal-details">
            <div class="roll-number-search">
                <form method="post">
                    <div class="input-wrapper">
                        <input type="text" name="rollNumber" id="rollNumber" placeholder="Enter Roll No">
                        <button type="submit"><i class="fa fa-magnifying-glass"></i></button>
                    </div>
                </form>
            </div>
                <table>
                    <tr>
                        <th>Name</th>
                        <th>Standard</th>
                        <th>Division</th>
                        <th>Roll No</th>
                    </tr>
                    <!-- Display student details -->
                    <tr>
                        <td><?php echo isset($name) ? $name : ''; ?></td>
                        <td><?php echo isset($std) ? $std : ''; ?></td>
                        <td><?php echo isset($div) ? $div : ''; ?></td>
                        <td><?php echo isset($rollNoToCheck) ? $rollNoToCheck : ''; ?></td>
                    </tr>
                </table>
            </div>
        </div>
        
        <div class="box">
            <div class="subject-performance">
                <h2>Subject-wise Performance</h2>
                <table>
                    <tr>
                        <th>Subject</th>
                        <th>Marks</th>
                        <th>Max Marks</th>
                    </tr>
                    <!-- Display marks for each subject -->
                    <tr>
                        <td>English</td>
                        <td><?php echo isset($englishMarks) ? $englishMarks : ''; ?></td>
                        <td>100</td>
                    </tr>
                    <tr>
                        <td>Hindi</td>
                        <td><?php echo isset($hindiMarks) ? $hindiMarks : ''; ?></td>
                        <td>100</td>
                    </tr>
                    <tr>
                        <td>Marathi</td>
                        <td><?php echo isset($marathiMarks) ? $marathiMarks : ''; ?></td>
                        <td>100</td>
                    </tr>
                    <tr>
                        <td>Science</td>
                        <td><?php echo isset($sciMarks) ? $sciMarks : ''; ?></td>
                        <td>100</td>
                    </tr>
                    <tr>
                        <td>Mathematics</td>
                        <td><?php echo isset($mathMarks) ? $mathMarks : ''; ?></td>
                        <td>100</td>
                    </tr>
                    <tr>
                        <td>Social Science</td>
                        <td><?php echo isset($soSciMarks) ? $soSciMarks : ''; ?></td>
                        <td>100</td>
                    </tr>
                    <tr>
                        <td>Total</td>
                        <td><?php echo isset($totalPercentage) ? $totalPercentage : ''; ?></td>
                        <td>600</td>
                    </tr>
                </table>
                <div class="total-percentage">
                    <p>Total Percentage: <?php echo isset($totalPercentage) ? $totalPercentage : ''; ?></p>
                </div>
                <div class="total-grade">
                    <p>Grade: <?php echo isset($totalGrade) ? $totalGrade : ''; ?></p>
                </div>
            </div>
        </div>
    </div>
</body>
</html>