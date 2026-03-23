<?php
session_start();
if ($_SESSION['islogin'] == false) {
  header("location:login.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Home</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="components/style.css">
</head>

<body>
  <?php //Nav bar Start
  include 'components/_connaction.php';
  require 'components/_nav.php';
  ?>
  <!-- Signup -->
  <!-- <div class="container "> -->
  <div class="container2">
    <div class="main-container">
      <div class="welcome-card">
        <div class="user-avatar"><?php echo $_SESSION['shortname'] ?></div>

        <h1 class="display-5 fw-bold text-dark">Welcome Back, <?php echo $_SESSION['fullname'] ?>!</h1>
        <p class="text-muted fs-5">We are glad to see you again. Here is what's happening with your account today.</p>

        <div class="row g-3">
          <div class="col-md-4">
            <div class="stat-box">
              <h3 class="fw-bold mb-0">12</h3>
              <small class="text-muted">Active Projects</small>
            </div>
          </div>
          <div class="col-md-4">
            <div class="stat-box">
              <h3 class="fw-bold mb-0">85%</h3>
              <small class="text-muted">Task Completion</small>
            </div>
          </div>
          <div class="col-md-4">
            <div class="stat-box">
              <h3 class="fw-bold mb-0">4</h3>
              <small class="text-muted">New Messages</small>
            </div>
          </div>
        </div>

        <div class="mt-5 d-flex flex-column flex-sm-row justify-content-center gap-3">
          <button class="btn btn-primary btn-action shadow-sm">Go to Dashboard</button>
          <button class="btn btn-light btn-action shadow-sm">Account Settings</button>
          <button id="logout-btn2" class="btn btn-logout-alt btn-action">Sign Out</button>
        </div>
        <p class="mt-5 text-secondary small">
        <p class="d-inline">Current Time : </p>
        <p class="fw-bold d-inline" id="live-clock">00:00:00 </p>
        <p class="d-inline"> from Mumbai, India</p>
      </div>
    </div>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>  <script>
    const logoutBtn = document.getElementById('logout-btn');
    const logoutBtn2 = document.getElementById('logout-btn2');
    logoutBtn.addEventListener('click', logout);
    logoutBtn2.addEventListener('click', logout);

    function logout(event) {
      const response = confirm("Are you sure you want to logout?");
      if (!response) {
        event.preventDefault();
      } else {
        window.location.href = "logout.php";
      }
    };

    // For Current live time
    function updateClock() {
      const now = new Date();

      let options = {
        hour: '2-digit',
        minute: '2-digit',
        second: '2-digit',
        hour12: true
      };

      const timeString = now.toLocaleTimeString('en-IN', options);
      document.getElementById('live-clock').innerText = timeString;
    }
    setInterval(updateClock, 1000);
    updateClock();
  </script>
</body>

</html>