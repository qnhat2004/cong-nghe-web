<!DOCTYPE html>
<html>
<head>
    <title>Add new product</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <!-- Add Modal HTML -->
    <div id="addProductModal" class="modal fade"></div>
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-header">
                    <h4 class="modal-title">Add Product</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label>Title</label>
                        <input type="text" name="title" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Price</label>
                        <input type="number" name="price" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Description</label>
                        <textarea name="description" class="form-control" required></textarea>
                    </div>
                    <div class="form-group">
                        <label>Category</label>
                        <input name="category" class="form-control" required></i>
                    </div>
                    <div class="form-group">
                        <label>Image Source</label><br>
                        <input type="radio" name="image_option" value="url" onclick="showImageInput('url')" checked> URL
                        Image
                        <input type="radio" name="image_option" value="upload" onclick="showImageInput('upload')">
                        Upload Image
                    </div>
                    <div class="form-group" id="image_url_input">
                        <label>Image URL</label>
                        <input type="url" name="image_url" class="form-control">
                    </div>
                    <div class="form-group" id="image_file_input" style="display:none;">
                        <label>Upload Image</label>
                        <input type="file" name="image_file" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Rating rate</label>
                        <input name="rating_rate" type="number" step="0.1" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Rating count</label>
                        <input name="rating_count" type="number" step="0.1" class="form-control" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                    <input type="submit" class="btn btn-success" value="Add" >
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