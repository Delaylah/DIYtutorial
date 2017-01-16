<?php
include "config.php";
session_start();

if ($_POST) 
{
  // Create connection
  $conn = mysqli_connect($mysql_host, $mysql_user, $mysql_pass, $mysql_db);
  if (!$conn)
    die("Connection failed: " . mysqli_connect_error());

  try
  {
    // Selektuje korisnika
    $username = $conn->real_escape_string($_POST['username']);
    $result = $conn->query("SELECT * FROM users WHERE username='$username'");

    if (mysqli_num_rows($result) > 0) {
      $userDb = $result->fetch_assoc();
      if ($userDb['password'] == md5($_POST['password'])) {
        // Korisnik uspjesno logovan, postavi session
        $_SESSION['valid'] = true;
        $_SESSION['username'] = $userDb['username'];
        $_SESSION['user_id'] = $userDb['id'];
        header('Location: index.php');
        exit();
      } else {
        die("Wrong username or password");
      }
    }
    else {
      die("Wrong username or password");
    }
  }
  finally {
    $conn->close();
  }  
}
else
{
?>

<div class="row group">
  <div class="col-4" style="min-height:1px">
        
  </div>

  <div class="col-4">
    <div class="index-content-box">
      <div class="containerform">
        <form id="contact" action="login.php" method="post">
          <h3>Login!</h3>
          <fieldset>
            <input placeholder="Username" id="username" name="username" type="text" onkeyup="doLoginValidation()">
            <span class="validation-error" id="usernameMsg">Username is required</span>
          </fieldset>
          <fieldset>
            <input type="password" id="password" name="password" onkeyup="doLoginValidation()">
            <span class="validation-error" id="passwordMsg">Password is required</span>
          </fieldset>
          <fieldset>
            <button type="submit" id="loginSubmit" disabled>Login</button>
          </fieldset>
        </form>
      </div>
    </div>
  </div>  
</div>
<?php
}
?>