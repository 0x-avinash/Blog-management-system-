<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title><?= htmlspecialchars($post['title'] ?? 'Blog Post') ?></title>
    <link rel="stylesheet" href="/avinash/blog/view/static/blog.css">
</head>

<body>

    <header>
        <nav class="nav">
            <a href="/avinash/blog/index.php/home">Home</a>
            <a href="/avinash/blog/index.php/view">Blog List</a>
        </nav>
    </header>
    <main class="blog-container">
        <?php if (!empty($post)): ?>
            <div class="blog-post-view">
                <center>
                    <h1 class="blog-title"><?= $post['title']?></h1>
                </center>
                <div class="blog-image">
                    <?php if (!empty($post['image_path'])): ?>
                        <img src="/avinash/blog/<?= $post['image_path'] ?>" alt="Blog Image" width="900px"
                            height="400px">
                    <?php else: ?>
                        <p>No image available</p>
                    <?php endif; ?>
                </div>

                <div class="blog-description">
                    <p><?= $post['description']?></p>
                </div>
            </div>
        <?php else: ?>
            <p style="text-align:center;">Blog post not found.</p>
        <?php endif; ?>
    </main>

</body>

</html>