
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

     
<div class="pagination" style="text-align:center; margin-top: 30px; color:#B197FC; margin-bottom: 30px;">
    <?php if ($page > 1): ?>
        <a href="?page=<?= $page - 1 ?>" style="margin-right: 10px; text-decoration: none"><i class="fa-sharp fa-solid fa-angles-left"></i> Prev</a>
    <?php endif; ?>

    <?php for ($i = 1; $i <= $totalPages; $i++): ?>
        <?php if ($i == $page): ?>
            <strong style="margin: 0 5px; color: blue; padding: 5px;"><?= $i ?></strong>
        <?php else: ?>
            <a href="?page=<?= $i ?>" style="margin: 0 5px;  padding:10px  ;border: 1px solid black; "><?= $i ?></a>
        <?php endif; ?>
    <?php endfor; ?>

    <?php if ($page < $totalPages): ?>
        <a href="?page=<?= $page + 1 ?>" style="margin-left: 10px; text-decoration: none;">Next  <i class="fas fa-angle-double-right"></i> </a>
    <?php endif; ?>
</div>



</body>

</html>