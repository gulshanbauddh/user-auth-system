<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Login</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="components/style.css">
</head>

<body>
  <?php //Nav bar Start
  session_start();
  if ($_SESSION['islogin'] == true) {
    header("location:index.php");
  }
  require 'components/_connaction.php';
  require 'components/_nav.php';
  global $conn;
  session_start();
  if (isset($_POST['login']) && !$_SESSION['islogin']) {
    echo "<div class='alert alert-danger alert-dismissible fade show m-0' role='alert'>
      <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
      <strong>Alert!</strong> Wrong user id or password try again.</div>";
  }
  $_SESSION['islogin'] = false;
  ?>

  <div class="container2">
    <div class="welcome-card mt-5">
      <h1 class="display-5 fw-bold text-dark">Welcome , Login!</h1>
      <div class="container mt-3">
        <form method="post" action="">
          <div class="mb-3 text-start text-sm-start">
            <label for="usernameLogin" class="form-label fs-4">User name</label>
            <input type="text" class="form-control" id="usernameLogin" aria-describedby="emailHelp" name="usernameLogin" required>
          </div>
          <div class="mb-3 text-start text-sm-start">
            <label for="passwordLogin" class="form-label fs-4">Password</label>
            <input type="password" class="form-control" id="passwordLogin" name="passwordLogin" required>
          </div>
          <input type="submit" class="btn btn-primary col-8" value="Login" name="login">
          <input type="clear" class="btn btn-success col-8 mt-2" value="Create new account" name="new account" id="newAccoungBtn">
        </form>
      </div>
      <p class="mt-4 text-secondary small">
      <p class="d-inline">Current Time : </p>
      <p class="fw-bold d-inline" id="live-clock">00:00:00 </p>
      <p class="d-inline"> from Mumbai, India</p>
    </div>
  </div>

  <?php
  if (isset($_POST['login']) && $_SERVER["REQUEST_METHOD"] == "POST") {
    $usernameLogin = $_POST['usernameLogin'];
    $passwordLogin = $_POST['passwordLogin'];
    $sql = "SELECT `username`,`password`,`fullname` FROM `user`;";
    $result = mysqli_query($conn, $sql);
    $num = mysqli_num_rows($result);
    while ($num > 0) {
      $row = mysqli_fetch_assoc($result);
      if ($usernameLogin == $row['username'] && $passwordLogin == $row['password']) {
        $_SESSION['islogin'] = true;
        $_SESSION['fullname'] = $row['fullname'];
        $fullname = $_SESSION['fullname'];
        $words = explode(" ", $fullname);
        $initial = "";
        foreach ($words as $word) {
          $initial .= strtoupper(($word[0]));
        }
        $_SESSION['shortname'] = $initial;

        header("location:index.php");
      }
      $num--;
    }
  }
  ?>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  <script>
    const newAccoungBtn = document.querySelector("#newAccoungBtn");
    newAccoungBtn.addEventListener('click', () => {
      window.location.href = "signup.php";
    });
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