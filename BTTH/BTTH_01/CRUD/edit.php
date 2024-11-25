<?php
require_once '../config.php';

if (!isset($_GET['id'])) {
    // header("Location: index.php");
    exit();
}
$id = $_GET['id'];
$stmt = $conn->prepare("SELECT * FROM products WHERE id = ?");
$stmt->execute([$id]);
$product = $stmt->fetch();

if (!$product) {    // If the product doesn't exist
    // header("Location: index.php");
    exit();
}

$title = $product['title'];
$price = $product['price'];
$description = $product['description'];
$category = $product['category'];
$rating_rate = $product['rating_rate'];
$rating_count = $product['rating_count'];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $title = $_POST['title'];
    $price = $_POST['price'];
    $description = $_POST['description'];
    $category = $_POST['category'];
    $rating_rate = $_POST['rating_rate'];
    $rating_count = $_POST['rating_count'];
    $sql = "UPDATE products SET title = ?, price = ?, description = ?, category = ?, rating_rate = ?, rating_count = ? WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$title, $price, $description, $category, $rating_rate, $rating_count, $id]);
    
    header("Location: index.php");
    exit();
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Edit product</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
    <!-- Trigger the modal with a button -->
    <button type="button" class="btn btn-info btn-lg" data-bs-toggle="modal" data-bs-target="#editProductModal">Edit Product</button>

    <!-- Modal -->
    <div id="editProductModal" class="modal fade" tabindex="-1" aria-labelledby="editProductModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="edit.php?id=<?php echo $id; ?>" method="POST">
                    <div class="modal-header">
                        <h4 class="modal-title" id="editProductModalLabel">Edit Product</h4>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Title</label>
                            <input type="text" name="title" class="form-control" value="<?php echo htmlspecialchars($title); ?>" required>
                        </div>
                        <div class="form-group">
                            <label>Price</label>
                            <input type="number" name="price" class="form-control" value="<?php echo htmlspecialchars($price); ?>" required>
                        </div>
                        <div class="form-group">
                            <label>Description</label>
                            <textarea name="description" class="form-control" required><?php echo htmlspecialchars($description); ?></textarea>
                        </div>
                        <div class="form-group">
                            <label>Category</label>
                            <textarea name="category" class="form-control" required><?php echo htmlspecialchars($category); ?></textarea>
                        </div>
                        <div class="form-group">
                            <label>Image Source</label><br>
                            <input type="radio" name="image_option" value="url" onclick="showImageInput('url')" checked> URL Image
                            <input type="radio" name="image_option" value="upload" onclick="showImageInput('upload')"> Upload Image
                        </div>
                        <div class="form-group">
                            <label>Image URL</label>
                            <input type="url" name="image_url" id="image_url_input" class="form-control" value="<?php echo htmlspecialchars($image); ?>">
                        </div>
                        <div class="form-group">
                            <label>Upload Image</label>
                            <input type="file" name="image_file" id="image_file_input" class="form-control" style="display:none;">
                        </div>
                        <div class="form-group">
                            <label>Rating rate</label>
                            <input name="rating_rate" type="number" step="0.1" class="form-control" value="<?php echo htmlspecialchars($rating_rate); ?>" required></input>
                        </div>
                        <div class="form-group">
                            <label>Rating count</label>
                            <input name="rating_count" type="number" step="0.1" class="form-control" value="<?php echo htmlspecialchars($rating_count); ?>" required></input>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <input type="button" class="btn btn-default" data-bs-dismiss="modal" value="Cancel">
                        <input type="submit" class="btn btn-success" value="Save">
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