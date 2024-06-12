
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Role Selection</title>
  <link rel="stylesheet" href="choice.css">
</head>
<body>
  <div class="container">
    <div class="register-header">
      <h2>Register as</h2>
    </div>
    <div class="role-selection">
      <div class="square" id="teacher-square">
        <img src="teacher.png" alt="Teacher Image">
        <form method="POST" action="/DBMS/form/Tlogin/login.php">
          <button type="submit" id="teacher-btn" name="role" value="teacher">Teacher</button>
        </form>
      </div>
      <div class="space"></div>
      <div class="square" id="student-square">
        <img src="student.jpg" alt="Student Image">
        <form method="POST" action="/DBMS/form/Slogin/login.php">
          <button type="submit" id="student-btn" name="role" value="student">Student</button>
        </form>
      </div>
    </div>
  </div>

  <script src="chioce.js"></script>
</body>
</html>