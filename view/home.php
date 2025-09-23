<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to Blog Website</title>
    <link rel="stylesheet" href="/avinash/blog/view/static/home.css" />
</head>

<body>
<header style="display: flex; justify-content: space-between; align-items: center;">
    <div style="color: white; font-weight: bold;">Home</div>
    
    <ul style="list-style: none; display: flex; gap: 20px; margin: 0; padding: 0;">
        <li><a href="add" style="color: white; text-decoration: none;">Add Blog</a></li>
        <li><a href="view" style="color: white; text-decoration: none;">List</a></li>
    </ul>

    <div>
        <a href="register" style="color: white; text-decoration: none; font-weight: bold;">Register</a>
    </div>
</header>


    <div class="blog-container">
        <?php if (!empty($data)): ?>
            <?php foreach ($data as $item): ?>
                <div class="blog-post">
                    <div class="blog-image">
                        <img src="/avinash/blog/<?= htmlspecialchars($item['image_path']) ?>" alt="Blog Image">
                    </div>
                    <div class="blog-content">
                        <h3><?= htmlspecialchars($item['title']) ?></h3>
                        <p class="blog-description">
                            <?= htmlspecialchars(substr($item['description'], 0, 300)) ?>...
                        </p>
                        <a href="page?id=<?= htmlspecialchars($item['id']) ?>" class="read-more">READ MORE →</a>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <p>No blog posts found.</p>
        <?php endif; ?>
    </div>

</body>

</html>