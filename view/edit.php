<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Blog</title>
    <link rel="stylesheet" href="/avinash/blog/view/static/style.css">
</head>

<body>

    <div class="container">
        <div class="top-buttons">
            <button class="btn"><a href="/avinash/blog/index.php/home"
                    style="text-decoration:none; color: black;">Home</a></button>
            <button class="btn"><a href="/avinash/blog/index.php/view"
                    style="text-decoration:none; color: black;">List</a></button>
        </div>

        <div class="content ">
            <div class="form-content">
                <h3>EDIT BLOG</h3>

                <form method="POST" action="http://localhost/avinash/blog/index.php/save" enctype="multipart/form-data">
                    <input type="hidden" name="id" value="<?php echo $result['id']; ?>">

                    <input type="text" name="title" placeholder="Title" value="<?php echo $result['title']; ?>"
                        required>

                    <input type="text" name="description" placeholder="Description"
                        value="<?php echo $result['description']; ?>" required>

                    <?php if (!empty($result['image_path'])): ?>
                        <div style="margin-bottom: 10px;">
                            <img src="/avinash/blog/<?php echo $result['image_path']; ?>" alt="Blog Image" width="100"
                                height="100">
                        </div>
                    <?php endif; ?>

                    <!-- File input for new image -->
                    <input type="file" name="image_path" accept="image/*">

                    <!-- Hidden field to carry old image if no new image is selected -->
                    <input type="hidden" name="old_image" value="<?php echo $result['image_path']; ?>">

                    <input type="submit" name="submit" class="submitbtn" value="Submit">
                </form>
            </div>
        </div>
    </div>

</body>

</html>