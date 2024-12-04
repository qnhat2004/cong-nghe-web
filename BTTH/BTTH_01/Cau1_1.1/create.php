<?php 
include 'data.php';
$success = false;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $title = $_POST['title'];
    $description = $_POST['description'];

    if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
        $image = $_FILES['image'];
        $imagePath = './images/' .basename($image['name']);

        // move the uploaded file to the images folder
        if (move_uploaded_file($image['tmp_name'], $imagePath)) {
            // add the new flower to the $flowers array in data.php
            $flowers[] = [
                'id' => count($flowers) + 1,
                'title' => $title,
                'image' => $imagePath,
                'description' => $description,
                'deleted_at' => '',
            ];

            // save the updated $flowers array back to data.php
            file_put_contents('data.php', '<?php $flowers = ' . var_export($flowers, true) . '?>;');
            $success = true;
            // echo '<script>
            //     alert("Flower added successfully!");
            //     window.location.href = "admin.php";
            // </script>';
            echo '<script>
                window.location.href = "admin.php?success=true";
            </script>';
            exit;
        } else {
            echo 'Failed to upload image';
        }
    } else {
        echo 'No image uploaded';
    }
}
?>
<!-- Add Modal HTML -->
<div id="addEmployeeModal" class="modal fade">
	<div class="modal-dialog">
		<div class="modal-content">
			<form method="POST" enctype="multipart/form-data">
				<div class="modal-header">						
					<h4 class="modal-title">Add Flower</h4>
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				</div>
				<div class="modal-body">					
					<div class="form-group">
						<label>Title</label>
						<input type="text" class="form-control" name="title" required>
					</div>
					<div class="form-group">
						<label>Image</label>
						<input type="file" class="form-control" name="image" required>
                        <div id="image-preview">
                            <img id="image-preview-img" src="#" style="display: none; max-width: 100%; height: auto;"/>
                        </div>
					</div>
					<div class="form-group">
						<label>Description</label>
						<textarea class="form-control" name="description" required></textarea>
					</div>
				</div>
				<div class="modal-footer">
					<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
					<input type="submit" class="btn btn-success" value="Add">
				</div>
			</form>
		</div>
	</div>
</div>

<script>
    document.querySelector('input[name="image"]').addEventListener('change', function(event) {
        const file = event.target.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                const img = document.getElementById('image-preview-img');
                img.src = e.target.result;
                img.style.display = 'block';
            }
            reader.readAsDataURL(file);
        }
    });
</script>