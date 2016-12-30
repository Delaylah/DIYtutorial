<?php
session_start();
$msg = '';

if ($_POST) 
{
      $xml=simplexml_load_file("baza.xml");

      foreach ($xml->user as $user)
      {
            if($user->password == $_POST['password'] && $user->username == $_POST['username'])
            {
                  $_SESSION['valid'] = true;
                  $_SESSION['timeout'] = time();
                  $_SESSION['username'] = (string)$user->username;
                  header('Location: index.php');
                  exit();
            }
      }
      $msg = 'Wrong username or password';
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