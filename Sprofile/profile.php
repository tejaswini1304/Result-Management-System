<?php
session_start();

include("db.php"); // Assuming db.php contains your database connection

if($_SERVER['REQUEST_METHOD'] == "POST")
{
  $studentName = $_POST['Name'];
  $dob = $_POST['DOB'];
  $address = $_POST['Address'];
  $contactNo = $_POST['ContactNo'];
  $emailid = $_POST['email'];
  $registerNo = $_POST['RegNo'];
  $standard = $_POST['Std'];
  $division = $_POST['Division'];
  $rollNo = $_POST['rollNo'];
  $category = $_POST['Category'];

  if(!empty($studentName) && !empty($dob) && !empty($address) && !empty($contactNo) && !empty($registerNo) && !empty($standard) && !empty($division) && !empty($rollNo) && !empty($emailid) && !empty($category))
  {
    $query = "INSERT INTO student_profile (Name, DOB, Address, ContactNo, RegNo, Std, Division, rollNo, Email, Category) VALUES ('$studentName', '$dob', '$address', '$contactNo', '$registerNo', '$standard', '$division', '$rollNo', '$emailid', '$category')";

    mysqli_query($con, $query);

    echo "<script type='text/javascript'> alert('Profile information added successfully')</script>";
    echo "<script>window.location.href = 'Home/home.php';</script>";
  }
  else
  {
    echo "<script type='text/javascript'> alert('Please enter valid information for all fields')</script>";
  }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Student Profile</title>
  <link rel="stylesheet" href="profile.css">
</head>
<body>
  <nav class="navbar">
  <ul>
      <li><a href="home.html" id="homeLink">Home</a></li>
      <li><a href="result.html" id="resultLink">Result</a></li>
      <li><a href="noticeboard.html" id="noticeLink">Noticeboard</a></li>
      <li><a href="profile.html" id="profileLink">Profile</a></li>
  </ul>
  </nav>
  <div class="container">
    <h1>Student Profile</h1>
    <form method="post" action="">
      <div class="personal-details">
        <h2>Personal Details</h2>
        
          <label for="studentName">Student Name:</label>
          <input type="text" id="studentName" name="Name" required>

          <label for="emailid">Email:</label>
          <input type="email" id="emailid" name="email" required>

          <label for="dob">Date of Birth:</label>
          <input type="date" id="dob" name="DOB" required>

          <label for="contactNo">Contact No:</label>
          <input type="tel" id="contactNo" name="ContactNo" pattern="[0-9]{10}" required>

          <label for="address">Address:</label>
          <input type="text" id="address" name="Address" required>

      </div>

      <div class="school-details">
        <h2>Educational Details</h2>

        <label for="registerNo">Register No:</label>
          <input type="text" id="registerNo" name="RegNo" required>
        
          <label for="standard">Standard:</label>
          <input type="text" id="standard" name="Std" required>

          <label for="division">Division:</label>
          <input type="text" id="division" name="Division" required>

          <label for="rollNo">Roll No:</label>
          <input type="number" id="rollNo" name="rollNo" required>

          <label for="category">Category:</label>
          <select id="category" name="Category" required>
            <option value="">Select category</option>
            <option value="General">General</option>
            <option value="OBC">OBC</option>
            <option value="SC">SC</option>
            <option value="ST">ST</option>
            <option value="NT">NT</option>
          </select>

        </div>

        <input type="submit" value="Save" class="save-btn">
    </form>
  </div>
  <script>
    <src="profile.js">
  </script>
</body>
</html>