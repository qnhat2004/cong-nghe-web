<!-- Edit Modal HTML -->
<div id="editEmployeeModal" class="modal fade">
	<div class="modal-dialog">
		<div class="modal-content">
			<form method="POST" enctype="multipart/form-data">
				<div class="modal-header">						
					<h4 class="modal-title">Edit Flower</h4>
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

<script>
    function populateForm(title, description, imageUrl) {
        document.getElementById('title').value = title;
        document.getElementById('description').value = description;
        const img = document.getElementById('image-preview-img');
        img.src = imageUrl;
        img.style.display = 'block';
    }

    // Example of how to open the modal and populate the form
    document.querySelectorAll('.openModalButton').forEach(button => {
        button.addEventListener('click', function() {
            const title = this.getAttribute('data-title');
            const description = this.getAttribute('data-description');
            const imageUrl = this.getAttribute('data-image-url');
            populateForm(title, description, imageUrl);
            $('#editEmployeeModal').modal('show');
        });
    });
</script>