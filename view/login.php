
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login Form</title>
  <link rel="stylesheet" href="/avinash/blog/view/static/style.css">
</head>

<body>

  <div class="container">
    <div class="content">
        <center><h1 style="color:red"><?php  echo $message ?></h1></center> 
      <div class="form-content">
        <h3>Login User</h3>
        <form method="POST"  action ="http://localhost/avinash/blog/index.php/session" >
          <input type="email" name="email" placeholder="email" required>
          <input type="password" name="password" placeholder="Enter password" required>
          <input type="submit" name="submit" class="submitbtn" value="Submit">
        </form>
        <h3><span>if not registered...</span>  <a href="register">register</a></h3>
      </div>
    </div>
  </div>

</body>
</html>
