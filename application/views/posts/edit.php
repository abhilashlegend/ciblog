<h1>Edit Post</h1>

<?php echo validation_errors('<div class="alert alert-danger" role="alert">','</div>'); ?>

<?php echo form_open_multipart('posts/update'); ?>
	<input type="hidden" name="id" value="<?php echo $post['id'] ?>" />
	<input type="hidden" name="oldImage" value="<?php echo $post['image']; ?>">
	<div class="row mb-3">
	    <label for="title" class="col-sm-2 col-form-label">Title</label>
	    <div class="col-sm-10">
	      
	      <?php
	      	$attributes = array(
	      		'name'  => 'title',
	      		'class' => 'form-control',
	      		'id'	=> 'title',
	      		'value' => $post['title']
	      	);

	      	echo form_input($attributes);

	      ?>
	    </div>
	 </div>
	 <div class="row mb-3">
	 	<label for="post-image" class="col-sm-2 col-form-label">Post Image</label>
	 	<div class="col-sm-10">
	 			<img src="<?php echo site_url() . 'assets/uploads/images/posts/' . $post['image']; ?>" alt="<?php echo $post['image']; ?>" class="img-fluid" width="200" />
	 		 

	 		 <?php
	 		 	$attributes = array(
	 		 		'name' 	=> 'postImage',
	 		 		'id' 	=> 'post-image',
	 		 		'class' => 'form-control'
	 		 	);
	 		 	echo form_upload($attributes);
	 		 ?>
	 	</div>
	 </div>
	 <div class="row mb-3">
	 	<label for="category" class="col-sm-2 col-form-label">Category</label>
	 	 <div class="col-sm-10">
	 	 	
	 	 	<?php
	 	 		$attributes = array(
	 	 			'name' 	=> 'category',
	 	 			'id'	=> 'category',
	 	 			'class'	=> 'form-select'
	 	 		);

	 	 		$options = array();

	 	 		foreach($categories as $category) {
	 	 			$options[$category['id']] = $category['name'];
	 	 		}

	 	 		$selected = $post['category_id'];

	 	 		echo form_dropdown($attributes, $options, $selected);
	 	 	?>
	 	 </div>
	 </div>
	 <div class="row mb-3">
	    <label for="content" class="col-sm-2 col-form-label">Content</label>
	    <div class="col-sm-10">
	      <textarea rows="10" id="content" name="content" class="form-control"><?php echo $post['body']; ?></textarea>
	    </div>
	 </div>
	 <div class="row">
	 	<div class="col-sm-2 col-form-label"></div>
	 	<div class="col-sm-10">	
	  		<button type="submit" class="btn btn-primary me-2">Update</button>
	  		<a href="<?php echo site_url(); ?>posts " class="btn btn-secondary">Cancel</a>
	  	</div>
	 </div>
</form>