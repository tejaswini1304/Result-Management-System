 <?php
session_start();

include("db.php"); // Assuming db.php contains your database connection

if($_SERVER['REQUEST_METHOD'] == "POST")
{
  $Name = $_POST['Name'];
  $contactNo = $_POST['ContactNo'];
  $email = $_POST['Email'];
  $registerNo = $_POST['RegNo'];
  $standard = $_POST['Std'];
  $division = $_POST['Division'];

  if(!empty($Name) && !empty($contactNo) && !empty($registerNo) && !empty($standard) && !empty($division))
  {
    $query = "INSERT INTO teacher_profile (Name, ContactNo, RegNo, Std, Division, Email) VALUES ('$Name', '$contactNo', '$registerNo', '$standard', '$division', '$email')";

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
    <h1>Teacher Details</h1>
    <form method="post" action="profile.php">
      <div class="personal-details">
          <label for="Name">Name:</label>
          <input type="text" id="Name" name="Name" required>

          <label for="email">Email:</label>
          <input type="email" id="email" name="Email" required>

          <label for="contactNo">Contact No:</label>
          <input type="tel" id="contactNo" name="ContactNo" pattern="[0-9]{10}" required>

          <label for="registerNo">Register No:</label>
          <input type="text" id="registerNo" name="RegNo" required>
        
          <label for="standard">Standard:</label>
          <input type="text" id="standard" name="Std" required>

          <label for="division">Division:</label>
          <input type="text" id="division" name="Division" required>

      </div>

        <input type="submit" value="Save" class="save-btn">
    </form>
  </div>

  <script src="profile.js"></script>
</body>
</html>
