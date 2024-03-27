<?php
if (isset($_POST['operation'])) {

  // Define username and password
  $username = "Dorothy";
  $password = "Dorothy123"; 
  // Extract username and password
  $x = filter_var($_POST['username'], FILTER_SANITIZE_STRING);
  $y = filter_var($_POST['password'], FILTER_SANITIZE_STRING);

  $op = $_POST['operation'];

  // Validate credentials 
  if ($x === $username && $y === $password) {
    $login_success = true;
  } else {
    $login_failure = "Invalid username or password.";
  }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Calculator Login</title>
</head>
<body>

<?php if (isset($login_failure)): ?>
  <p style="color: red;"><?php echo $login_failure; ?></p>
<?php endif; ?>

<?php if (!isset($login_success) || !$login_success): ?>  <form action="<?= $_SERVER['PHP_SELF'] ?>" method="post">
    <label for="username">Username:</label>
    <input type="text" name="username" id="username" required>
    <br><br>
    <label for="password">Password:</label>
    <input type="password" name="password" id="password" required>
    <br><br>
    <input type="submit" value="Login" name="operation">
  </form>
<?php else: ?>
  <p>Login Successful!</p>
<?php endif; ?>

</body>
</html>
