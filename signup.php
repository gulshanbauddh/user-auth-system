<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Signup</title>
  <link rel="stylesheet" href=" components/style.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>
  <?php //Nav bar Start
  require 'components/_connaction.php';
  require 'components/_nav.php';
  global $conn;
  session_start();
  if (isset($_SESSION['ualert'])) {
    if (!$_SESSION['ualert']) {
      echo "<div class='alert alert-danger alert-dismissible fade show m-0' role='alert'>
    <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
    <strong>Alert!</strong> You are enterd username <strong>";
      echo $_SESSION['usernameSign'] . " </strong>is already exist.</div>";
      $_SESSION['ualert'] = true;
      unset($_SESSION['usernameSign']);
    }
  }
  if (isset($_SESSION['signStatus'])) {
    if ($_SESSION['signStatus'] == true) {
      echo "<div class='alert alert-success alert-dismissible fade show m-0' role='alert'>
        <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
        <strong>Success!</strong> Account Created please login- <a href='login.php'>Login Heare</a> and your user name is : <strong>";
      echo $_SESSION['usernameSign'] . "</strong></div>";
      unset($_SESSION['usernameSign']);
    } else {
      echo "<div class='alert alert-danger alert-dismissible fade show m-0' role='alert'>
      <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
      <strong>Alert!</strong> Empty filed is not allows.</div>";
    }
    unset($_SESSION['signStatus']);
  }
  if ($_SERVER["REQUEST_METHOD"] == 'POST') {
    $usernameSign = $_POST['usernameSign'];
    $fullname = $_POST['fullname'];
    $fathername = $_POST['fathername'];
    $dob = $_POST['dob'];
    $mothername = $_POST['mothername'];
    $passwordSign = $_POST['passwordSign'];
    $cpasswordSign = $_POST['cpasswordSign'];
    $address = $_POST['address'];
    // user name exist check
    $usql = "SELECT `username` FROM `user`where `username`='$usernameSign';";
    $uresult = mysqli_query($conn, $usql);
    $urow = mysqli_num_rows($uresult);
    if ($urow > 0) {
      $_SESSION['ualert'] = false;
      $_SESSION['usernameSign'] = $usernameSign;
      header("location:signup.php");
      exit;
    }
    if (empty($usernameSign) || empty($passwordSign) || empty($fullname) || empty($fathername) || empty($dob) || empty($mothername) || empty($address) || empty($cpasswordSign)) {
      $_SESSION['signStatus'] = false;
    } else {
      $sql = "INSERT INTO `user` (`username`, `fullname`, `fathername`, `mothername`, `dob`, `password`, `address`) VALUES ('$usernameSign', '$fullname', '$fathername', '$mothername', '$dob', '$passwordSign', '$address');";
      $_SESSION['signStatus'] = true;
      $result = mysqli_query($conn, $sql);
      $_SESSION['usernameSign'] = $usernameSign;
      if (!$result) {
        die("SQL Error: " . mysqli_error($conn));
      }
    }
    header("location:signup.php");
    exit;
  }
  ?>

  <div class="container2">
    <div class="welcome-card welcome-cardSign">
      <h1 class="display-6 fw-bold text-dark">Welcome , Create new account</h1>
      <div class="container mt-3">
        <form method="post" action="">
          <div class="mb-3 text-start text-sm-start">
            <label for="usernameSign" class="form-label fs-5">User name</label>
            <input type="text" class="form-control" id="usernameSign" name="usernameSign" required>
          </div>
          <div class="mb-3 text-start text-sm-start">
            <label for="fullname" class="form-label fs-5">Full Name</label>
            <input type="text" class="form-control" id="fullname" name="fullname" required>
          </div>

          <div class="mb-3 text-start text-sm-start">
            <label for="fathername" class="form-label fs-5">Father name</label>
            <input type="text" class="form-control" id="fathername" name="fathername" required>
          </div>
          <div class="mb-3 text-start text-sm-start">
            <label for="mothername" class="form-label fs-5">Mother name</label>
            <input type="text" class="form-control" id="mothername" name="mothername" required>
          </div>
          <div class="mb-3 text-start text-sm-start">
            <label for="dob" class="form-label fs-5">DOB</label>
            <input type="date" class="form-control" style="width: auto;" id="dob" name="dob" required>
          </div>

          <div class="mb-3 text-start text-sm-start">
            <label for="address" class="form-label fs-5">Address</label>
            <textarea rows="4" class="form-control" id="address" name="address"></textarea>
          </div>
          <div class="mb-3 text-start text-sm-start">
            <label for="passwordSign" class="form-label fs-5">Password</label>
            <input type="password" class="form-control" id="passwordSign" name="passwordSign" required>
          </div>
          <div class="mb-0 text-start text-sm-start">
            <label for="cpasswordSign" class="form-label fs-5">Confirm Password</label>
            <input type="password" class="form-control" id="cpasswordSign" name="cpasswordSign" required>
          </div>
          <div class="mb-4 text-start text-sm-start">
            <p class="d-inline"><br> <sup>*</sup>Password must be at least 6 characters and contain at least one numeric and one special symbol <br>Ex. Admin@1</p>
          </div>
          <input type="submit" class="btn btn-primary col-8" id="submit" value="Signup" name="signup">
          <input type="button" class="btn btn-success col-8 mt-2" value="I already have account" name="login" id="logAccoungBtn">
        </form>
      </div>
      <p class="mt-4 text-secondary small">
      <p class="d-inline">Current Time : </p>
      <p class="fw-bold d-inline" id="live-clock">00:00:00 </p>
      <p class="d-inline"> from Mumbai, India</p>
    </div>
  </div>
  </div>
  <script src="/gulshan/node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <script>
    const submit = document.getElementById("submit");
    const passwordInput = document.getElementById("passwordSign");
    const cpasswordInput = document.getElementById("cpasswordSign");
    const regixPassword = /^(?=.*[A-Z])(?=.*[a-z])(?=.*\d)(?=.*[@#$!%*?&])[A-Za-z\d@#$!%*?&]{6,}$/;

    submit.addEventListener('click', validate);

    function validate(event) {
      const password = passwordInput.value;
      const cpassword = cpasswordInput.value;

      // 1. Password Matching
      if (password !== cpassword) {
        alert("Passwords Don't Match");
        event.preventDefault();
        return;
      }
      // 1. Regex Validation
      if (!regixPassword.test(password)) {
        alert("Password must be at least 8 characters with uppercase, lowercase, number and special character.")
        event.preventDefault();
        return;
      }
    };

    const logAccoungBtn = document.getElementById('logAccoungBtn');
    logAccoungBtn.addEventListener('click', login);

    function login(event) {
      window.location.href = "login.php";
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