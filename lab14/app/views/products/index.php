<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
</head>
<body class="container mt-4">

<h3>Danh sách sản phẩm</h3>

<?php if($msg = get_flash('success')): ?>
<div class="alert alert-success"><?= $msg ?></div>
<?php endif; ?>

<form action="?action=create&page=<?= $page ?>" method="post" enctype="multipart/form-data">
  <input name="name" placeholder="Tên" required class="form-control mb-2">
  <input name="price" placeholder="Giá" required class="form-control mb-2">
  <input type="file" name="image" class="form-control mb-2">
  <button class="btn btn-primary">Thêm</button>
</form>

<table class="table mt-3">
<tr><th>ID</th><th>Tên</th><th>Giá</th><th>Ảnh</th><th></th></tr>
<?php foreach($products as $p): ?>
<tr>
  <td><?= $p['id'] ?></td>
  <td><?= $p['name'] ?></td>
  <td><?= $p['price'] ?></td>
  <td>
    <?php if($p['image']): ?>
     <img src="uploads/<?= $p['image'] ?>" width="60">



    <?php endif; ?>
  </td>
  <td>
    <a href="?action=delete&id=<?= $p['id'] ?>&page=<?= $page ?>" class="btn btn-danger btn-sm">Xóa</a>
  </td>
</tr>
<?php endforeach; ?>
</table>

<!-- Pagination -->
<nav>
<?php for($i=1;$i<=$totalPages;$i++): ?>
  <a class="btn btn-sm <?= $i==$page?'btn-primary':'btn-outline-primary' ?>"
     href="?page=<?= $i ?>"><?= $i ?></a>
<?php endfor; ?>
</nav>

</body>
</html>
