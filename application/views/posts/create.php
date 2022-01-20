<h1>Create Post</h1>

<?php echo validation_errors('<div class="alert alert-danger" role="alert">','</div>'); ?>

<?php echo form_open_multipart('posts/create'); ?>
	<div class="row mb-3">
	    <label for="title" class="col-sm-2 col-form-label">Title</label>
	    <div class="col-sm-10">
	     
	      <?php               
                $data = array(
                    'class' => 'form-control',
                    'name'  => 'title',
                    'placeholder' => '',
                    'aria-label' => 'Enter title',
                    'id' => 'title',
                    'value' => set_value('title')
                );
                echo form_input($data);
                
                ?>
	    </div>
	 </div>
	 <div class="row mb-3">
	 	<label for="post-image" class="col-sm-2 col-form-label">Post Image</label>
	 	<div class="col-sm-10">
	 		 
	 		 <?php 
	 		 	$data = array(
	 		 		'class' => 'form-control',
	 		 		'name'  => 'postImage',
	 		 		'id'	=> 'post-image',
	 		 		'value' => set_value('postImage')
	 		 	);
	 		 	echo form_upload($data);
	 		 ?>
	 	</div>
	 </div>
	 <div class="row mb-3">
	 	<label for="category" class="col-sm-2 col-form-label">Category</label>
	 	 <div class="col-sm-10">
	 	 	
	 	 	<?php 
	 	 		$data = array(
	 	 			'name'	=> 'category',
	 	 			'id'	=> 'category',
	 	 			'class' => 'form-select'
	 	 		);
		 	 	$options = array();
		 	 	foreach($categories as $category) {
		 	 		$options[$category['id']] = $category['name'];
		 	 	}

		 	 	$selected = set_value('category');

		 	 	echo form_dropdown($data, $options, $selected);
	 	 	?>
	 	 </div>
	 </div>
	 <div class="row mb-3">
	    <label for="content" class="col-sm-2 col-form-label">Content</label>
	    <div class="col-sm-10">
	      <?php 
                $data = array(
                    'class' => 'form-control',
                    'name'  => 'content',
                    'placeholder' => '',
                    'aria-label' => 'Enter post content',
                    'id' => 'content',
                    'value' => set_value('content')
                );
                echo form_textarea($data);      
           ?>
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