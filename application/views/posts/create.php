<h1>Create Post</h1>

<?php echo validation_errors('<div class="alert alert-danger" role="alert">','</div>'); ?>

<?php echo form_open('posts/create'); ?>
	<div class="row mb-3">
	    <label for="title" class="col-sm-2 col-form-label">Title</label>
	    <div class="col-sm-10">
	      <input type="text" class="form-control" id="title" name="title">
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
	  		<button type="submit" class="btn btn-primary me-2">Sign in</button>
	  		<a href="<?php echo site_url(); ?>posts " class="btn btn-secondary">Cancel</a>
	  	</div>
	 </div>
</form>