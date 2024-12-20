<!-- Delete Modal HTML -->
<div id="deleteEmployeeModal" class="modal fade">
	<div class="modal-dialog">
		<div class="modal-content">
			<form>
				<div class="modal-header">						
					<h4 class="modal-title">Delete Employee</h4>
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				</div>
				<div class="modal-body">					
					<p>Are you sure you want to delete these Records?</p>
					<p class="text-warning"><small>This action cannot be undone.</small></p>
				</div>
				<div class="modal-footer">
					<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
					<input type="submit" class="btn btn-danger" value="Delete">
				</div>
			</form>
		</div>
	</div>
</div>
<script>
    $(document).ready(function(){
        $('form').on('submit', function(e){
            e.preventDefault();
            var employeeId = $(this).data('id');
            $.ajax({
                url: 'delete_employee.php',
                type: 'POST',
                data: { id: employeeId },
                success: function(response){
                    if(response == 'success'){
                        $('#deleteEmployeeModal').modal('hide');
                        // Optionally, refresh the page or update the UI to reflect the deletion
                    } else {
                        alert('Error deleting record.');
                    }
                }
            });
        });
    });
</script>