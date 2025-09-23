<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Registration Form</title>
  <link rel="stylesheet" href="/avinash/blog/view/static/style.css">
</head>

<body>

  <div class="container">
    <div class="content">
      <div class="form-content">
        <h3>Registration</h3>
        <form method="POST" action="http://localhost/avinash/blog/index.php/savecredientials">
          <input type="text" name="username" placeholder="Username" required>
           <input type="email" name="email" placeholder="Email" required>
          <input type="password" name="password" placeholder="Enter password" required>
          <input type="submit" name="submit" class="submitbtn" value="Submit">
        </form>
        <h3><span>if registered...</span>  <a href="login">login</a></h3>
      </div>
    </div>
  </div>

</body>
</html>
