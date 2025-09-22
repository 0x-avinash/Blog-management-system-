<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>ADD</title>
  <link rel="stylesheet" href="/avinash/blog/view/static/style.css">


</head>

<body>

  <div class="container">
    <div class="top-buttons">
      <button class="btn">  <a href="home" style="text-decoration:none; color: black;">Home</a> </button>
      <button class="btn"><a href="view" style="text-decoration:none; color: black;">List</a></button>
    </div>
    <div class="content">
      <div class="form-content">
        <h3>ADD BLOG</h3>
        <form method="POST" action="http://localhost/avinash/blog/index.php/save" enctype="multipart/form-data">
          <input type="text" name="title" placeholder="Title" required>
          <input type="text" name="description" placeholder="Description" required>
          <input type="file" name="image_path" placeholder="Upload Image" accept="image/*" required>
          <input type="submit" name="submit" class="submitbtn" value="Submit">
        </form>
      </div>
    </div>
  </div>

</body>

</html>