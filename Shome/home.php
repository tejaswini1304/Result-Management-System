<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Home</title>
  <link rel="stylesheet" href="home.css">
</head>
<body>
  <nav class="navbar">
    <ul>
      <li><a href="home.php" id="homeLink">Home</a></li>
      <li><a href="Result/result.php" id="resultLink">Result</a></li>
      <li><a href="Notice/notice.php" id="noticeLink">Noticeboard</a></li>
      <li><a href="profile.html" id="profileLink">Profile</a></li>
    </ul>
  </nav>

  <div class="content">
    <div class="left-square">
      <img src="result.jpg" alt="Your Image">
    </div>
    <div class="right-square">
      <div class="caption">
        <p>See Your Hard Work Pay Off! Check Your Grades Now!</p>
      </div>
      <button id="proceedButton" onclick="redirectToPage()">Proceed</button>
    </div>
  </div>

  <script src="home.js"></script>
</body>
</html>