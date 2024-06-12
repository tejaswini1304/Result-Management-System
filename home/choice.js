// Function to redirect to the selected registration page
function redirectToRegistration(role) {
  if (role === 'student') {
    window.location.href = 'student_register.php';
  } else if (role === 'teacher') {
    window.location.href = 'teacher_register.php';
  }
}

document.addEventListener('DOMContentLoaded', function () {
  // Get the buttons for role selection
  const studentBtn = document.getElementById('student-btn');
  const teacherBtn = document.getElementById('teacher-btn');

  // Add click event listeners to the buttons
  studentBtn.addEventListener('click', function () {
    redirectToRegistration('student');
  });

  teacherBtn.addEventListener('click', function () {
    redirectToRegistration('teacher');
  });
});