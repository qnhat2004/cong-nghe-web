<?php
require_once '../config.php';

$id = isset($_GET['id']) ? $_GET['id'] : null;
$product = null;

if ($id) {
    $stmt = $conn->prepare("SELECT * FROM products WHERE id = ?");
    $stmt->execute([$id]);
    $product = $stmt->fetch(PDO::FETCH_ASSOC);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $title = $_POST['title'];
    $price = $_POST['price'];
    $description = $_POST['description'];
    $category = $_POST['category'];
    $rating_rate = $_POST['rating_rate'];
    $rating_count = $_POST['rating_count'];

    // Handle image upload or URL
    if ($_POST['image_option'] == 'url') {
        $image = $_POST['image_url'];
    } else {
        $image = '';
        if (isset($_FILES['image_file']) && $_FILES['image_file']['error'] == 0) {
            $image = 'uploads/' . basename($_FILES['image_file']['name']);
            move_uploaded_file($_FILES['image_file']['tmp_name'], $image);
        }
    }

    if ($id) {
        $sql = "UPDATE products SET title = ?, price = ?, description = ?, category = ?, image = ?, rating_rate = ?, rating_count = ? WHERE id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$title, $price, $description, $category, $image, $rating_rate, $rating_count, $id]);
    } else {
        $sql = "INSERT INTO products (title, price, description, category, image, rating_rate, rating_count) VALUES (?, ?, ?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$title, $price, $description, $category, $image, $rating_rate, $rating_count]);
    }

    header("Location: crud.php");
    exit();
}
?>
<!DOCTYPE html>
<html>
<head>
    <title><?php echo $id ? 'Edit' : 'Add'; ?> Product</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <!-- Add/Edit Modal HTML -->
    <div id="addEmployeeModal" class="modal fade" style="display: <?php echo $id || $_SERVER['REQUEST_METHOD'] == 'POST' ? 'block' : 'none'; ?>;">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="create.php<?php echo $id ? '?id=' . $id : ''; ?>" method="POST" enctype="multipart/form-data">
                    <div class="modal-header">
                        <h4 class="modal-title"><?php echo $id ? 'Edit' : 'Add'; ?> Product</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Title</label>
                            <input type="text" name="title" class="form-control" value="<?php echo $product ? $product['title'] : ''; ?>" required>
                        </div>
                        <div class="form-group">
                            <label>Price</label>
                            <input type="number" name="price" class="form-control" value="<?php echo $product ? $product['price'] : ''; ?>" required>
                        </div>
                        <div class="form-group">
                            <label>Description</label>
                            <textarea name="description" class="form-control" required><?php echo $product ? $product['description'] : ''; ?></textarea>
                        </div>
                        <div class="form-group">
                            <label>Category</label>
                            <textarea name="category" class="form-control" required><?php echo $product ? $product['category'] : ''; ?></textarea>
                        </div>
                        <div class="form-group">
                            <label>Image Source</label><br>
                            <input type="radio" name="image_option" value="url" onclick="showImageInput('url')" <?php echo !$product || $product['image'] ? 'checked' : ''; ?>> URL Image
                            <input type="radio" name="image_option" value="upload" onclick="showImageInput('upload')" <?php echo $product && !$product['image'] ? 'checked' : ''; ?>> Upload Image
                        </div>
                        <div class="form-group">
                            <label>Image URL</label>
                            <input type="url" name="image_url" id="image_url_input" class="form-control" value="<?php echo $product ? $product['image'] : ''; ?>" <?php echo $product && !$product['image'] ? 'style="display:none;"' : ''; ?>>
                        </div>
                        <div class="form-group">
                            <label>Upload Image</label>
                            <input type="file" name="image_file" id="image_file_input" class="form-control" <?php echo !$product || $product['image'] ? 'style="display:none;"' : ''; ?>>
                        </div>
                        <div class="form-group">
                            <label>Rating rate</label>
                            <input name="rating_rate" type="number" step="0.1" class="form-control" value="<?php echo $product ? $product['rating_rate'] : ''; ?>" required></input>
                        </div>
                        <div class="form-group">
                            <label>Rating count</label>
                            <input name="rating_count" type="number" step="0.1" class="form-control" value="<?php echo $product ? $product['rating_count'] : ''; ?>" required></input>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                        <input type="submit" class="btn btn-success" value="<?php echo $id ? 'Update' : 'Add'; ?>">
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script>
        function showImageInput(option) {
            if (option === 'url') {
                document.getElementById('image_url_input').style.display = 'block';
                document.getElementById('image_file_input').style.display = 'none';
            } else {
                document.getElementById('image_url_input').style.display = 'none';
                document.getElementById('image_file_input').style.display = 'block';
            }
        }
    </script>
</body>
</html>