<div class="d-flex justify-content-between">
	<h1 class="w-100"> Categories </h1>
	<button type="button" class="btn btn-primary m-auto" data-bs-toggle="modal" data-bs-target="#addCategoryModal">Add</button>
</div>

<div class="row">
	<div class="col-sm-12">
		<svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
  <symbol id="check-circle-fill" fill="currentColor" viewBox="0 0 16 16">
    <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
  </symbol>
  <symbol id="info-fill" fill="currentColor" viewBox="0 0 16 16">
    <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z"/>
  </symbol>
  <symbol id="exclamation-triangle-fill" fill="currentColor" viewBox="0 0 16 16">
    <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
  </symbol>
</svg>

<?php if(isset($message)): ?>
		<div class="alert alert-primary d-flex align-items-center" role="alert">
		  <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Info:"><use xlink:href="#info-fill"/></svg>
		  <div>
		    <?php echo $message; ?>
		  </div>
		</div> <!-- End of alert -->
	<?php endif; ?>
	</div>
</div>

<div class="row">
	<div class="col-sm-12">
		<table class="table table-striped">
			<thead>
				<tr>
					<th>#</th>
					<th>Name</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody>
			<?php if(count($categories) == 0): ?>
			<tr>			
				<td colspan="3">
					No Record Found
				</td>
			</tr>

		<?php else: ?>
			<?php 
				$count = 0;
				foreach($categories as $category):
				$count++; 
			?>
				<tr>
					<td>
						<?php echo $count; ?>
					</td>
					<td>
						<?php echo $category['name']; ?>
					</td>
					<td>
						<button data-bs-toggle="modal" data-bs-target="#editCategoryModal" data-cat-id="<?php echo $category['id']; ?>" data-cat-name="<?php echo $category['name']; ?>" class="btn btn-success">Edit</button>
						<a href="<?php echo site_url() . 'categories/delete/' . $category['id']; ?>" class="btn btn-danger">Delete</a>
					</td>
				</tr>
			<?php
				endforeach;
				endif;
			?>	
			</tbody>
		</table>
	</div>
</div>


<!-- Add Category Modal -->
<div class="modal fade" id="addCategoryModal" tabindex="-1" aria-labelledby="addCategoryModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="addCategoryModalLabel">Add Category</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        	<?php echo form_open('categories/create'); ?>
				<div class="row mb-3">
				    <label for="name" class="col-sm-2 col-form-label">Name</label>
				    <div class="col-sm-10">
				      <input type="text" class="form-control" id="name" name="name" required />
				    </div>
				 </div>
				 <div class="row">
				 	<div class="col-sm-2 col-form-label"></div>
				 	<div class="col-sm-10">	
				 
				  		<button type="submit" class="btn btn-primary me-2">Submit</button>
				  		<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
				  	</div>
				 </div>
			</form>
      </div>
      
    </div>
  </div>
</div>


<!-- Edit Category Modal -->
<div class="modal fade" id="editCategoryModal" tabindex="-1" aria-labelledby="editCategoryModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="editCategoryModalLabel">Edit Category</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        	<?php echo form_open('categories/update'); ?>
        		<input type="hidden" id="catId" name="catId" />
				<div class="row mb-3">
				    <label for="name" class="col-sm-2 col-form-label">Name</label>
				    <div class="col-sm-10">
				      <input type="text" class="form-control" id="catName" name="catName" required />
				    </div>
				 </div>
				 <div class="row">
				 	<div class="col-sm-2 col-form-label"></div>
				 	<div class="col-sm-10">	
				 
				  		<button type="submit" class="btn btn-primary me-2">Submit</button>
				  		<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
				  	</div>
				 </div>
			</form>
      </div>
      
    </div>
  </div>
</div>