
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to Blog Website</title>
    <link rel="stylesheet" href="/avinash/blog/view/static/home.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css" integrity="sha512-2SwdPD6INVrV/lHTZbO2nodKhrnDdJK9/kg2XD1r9uGqPo1cUbujc+IYdlYdEErWNu69gVcYgdxlmVmzTWnetw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
    <!--header-->
<header style="display: flex; justify-content: space-between; align-items: center;">
    <div style="color: white; font-weight: bold;">Home</div>

    <ul style="list-style: none; display: flex; gap: 20px; margin: 0; padding: 0;">
        <?php if ($isLoggedIn): ?>
            <li><a href="add" style="color: white; text-decoration: none;">Add Blog</a></li>
            <li><a href="view" style="color: white; text-decoration: none;">List</a></li>
        <?php endif; ?>
    </ul>

    <div style="color: white; font-weight: bold;">
        <?php if ($isLoggedIn): ?>
            Hello, <?php echo htmlspecialchars($_SESSION['username']); ?> |
            <a href="logout" style="color: white; text-decoration: none;">Logout</a>
        <?php else: ?>
            <a href="register" style="color: white; text-decoration: none;">Register</a> |
            <a href="login" style="color: white; text-decoration: none;">Login</a>
        <?php endif; ?>
    </div>
</header>

<!--main content-->
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


    <!--pagination-->
    <div class="pagination" style="text-align: center; margin: 30px 0; display: flex; justify-content: center; align-items: center; gap: 10px;">
    <?php if ($page > 1): ?>
        <a href="?page=<?= $page - 1 ?>" style="padding: 10px 20px; border: 1px solid #d1d5db; border-radius: 6px; text-decoration: none; color: #111827; font-weight: 500;"> PREV</a>
    <?php endif; ?>
    <?php
    $range = 2; // how many pages to show before and after current
    $start = max(1, $page - $range);
    $end = min($totalPages, $page + $range);
    if ($start > 1) {
        echo '<a href="?page=1" style="padding: 8px 12px; text-decoration: none; color: #111827;">1</a>';
        if ($start > 2) echo '<span style="padding: 8px 12px;">...</span>';
    }
    for ($i = $start; $i <= $end; $i++):
        if ($i == $page): ?>
            <span style="padding: 10px 15px; background-color: #2563eb; color: white; border-radius: 6px; font-weight: bold;"><?= $i ?></span>
        <?php else: ?>
            <a href="?page=<?= $i ?>" style="padding: 10px 15px; text-decoration: none; color: #111827; border-radius: 6px;"><?= $i ?></a>
        <?php endif;
    endfor;
    if ($end < $totalPages) {
        if ($end < $totalPages - 1) echo '<span style="padding: 8px 12px;">...</span>';
        echo '<a href="?page=' . $totalPages . '" style="padding: 8px 12px; text-decoration: none; color: #111827;">' . $totalPages . '</a>';
    }
    ?>
    <?php if ($page < $totalPages): ?>
        <a href="?page=<?= $page + 1 ?>" style="padding: 10px 20px; border: 1px solid #d1d5db; border-radius: 6px; text-decoration: none; color: #111827; font-weight: 500;">NEXT </a>
    <?php endif; ?>
</div>


</body>

</html>