<h1>Create Post</h1>

<?php echo validation_errors('<div class="alert alert-danger" role="alert">','</div>'); ?>

<?php echo form_open_multipart('posts/create'); ?>
	<div class="row mb-3">
	    <label for="title" class="col-sm-2 col-form-label">Title</label>
	    <div class="col-sm-10">
	      <input type="text" class="form-control" id="title" name="title">
	    </div>
	 </div>
	 <div class="row mb-3">
	 	<label for="post-image" class="col-sm-2 col-form-label">Post Image</label>
	 	<div class="col-sm-10">
	 		 <input class="form-control" type="file" id="post-image" name="postImage" />
	 	</div>
	 </div>
	 <div class="row mb-3">
	 	<label for="category" class="col-sm-2 col-form-label">Category</label>
	 	 <div class="col-sm-10">
	 	 	<select name="category" id="category" class="form-select">
	 	 	<?php foreach($categories as $category): ?>
	 	 			<option value="<?php echo $category['id']; ?>"><?php echo $category['name']; ?></option>
			<?php endforeach; ?>			 	 			
	 	 	</select>
	 	 </div>
	 </div>
	 <div class="row mb-3">
	    <label for="content" class="col-sm-2 col-form-label">Content</label>
	    <div class="col-sm-10">
	      <textarea rows="10" id="content" name="content" class="form-control"></textarea>
	    </div>
	 </div>
	 <div class="row">
	 	<div class="col-sm-2 col-form-label"></div>
	 	<div class="col-sm-10">	
	  		<button type="submit" class="btn btn-primary me-2">Submit</button>
	  		<a href="<?php echo site_url(); ?>posts " class="btn btn-secondary">Cancel</a>
	  	</div>
	 </div>
</form>