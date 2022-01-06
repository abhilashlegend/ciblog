<div class="d-flex justify-content-between">
	<h1 class="w-100"> Categories </h1>
	<button type="button" class="btn btn-primary m-auto" data-bs-toggle="modal" data-bs-target="#addCategoryModal">Add</button>
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
        	<?php echo form_open('categories/create'); ?>
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