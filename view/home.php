<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to Blog Website</title>
    <link rel="stylesheet" href="/avinash/blog/view/static/home.css" />
</head>

<body>

    <header>
        <span style="color: white; font-weight: bold;">Home</span>
        <ul>
            <li><a href="add">Add Blog</a></li>
            <li><a href="view">List</a></li>
        </ul>
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
