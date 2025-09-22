<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>List View</title>
  <link rel="stylesheet" href="/avinash/blog/view/static/list.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>

<body>
  <div class="container">
    <Button style="height: 40px; width:100px'; float:right;"> <a href="home"
        style="text-decoration:none;color: black;">Home</a></Button>
    <Button style="height: 40px; width:100px'; float:right;"> <a href="add"
        style="text-decoration:none;color: black;">Add Blog<i class="fa-sharp fa-solid fa-plus fa-2xl"
          style="color: #B197FC;"></i></a></Button>
    <h1>Blog List</h1>
    <div class="content">
      <table>
        <thead>
          <tr>
            <th>ID</th>
            <th>Title</th>
            <th>Description</th>
            <th>Image</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($post as $item): ?>
            <tr>
              <td><?= htmlspecialchars($item['id']) ?></td>
              <td><?= htmlspecialchars($item['title']) ?></td>
              <td><?= htmlspecialchars($item['description']) ?></td>
              <td>
                <?php if (!empty($item['image_path'])): ?>
                  <img src="/avinash/blog/<?= htmlspecialchars($item['image_path']) ?>" alt="Blog Image" width="30"
                    height="30px">
                <?php else: ?>
                  No image
                <?php endif; ?>
              </td>
              <td>

                <a href="edit?id=<?= $item['id'] ?>" class="action-btn edit">
                  <i class="fa-solid fa-pen-to-square "></i>
                </a>
                <button onclick="alert('Are you Sure you want to delete  the items')">
                  <a href="delete?id=<?= $item['id'] ?>" class="action-btn delete">
                    <i class="fa-solid fa-trash"></i>
                  </a>
                </button>

              </td>
            </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>
  </div>
</body>

</html>