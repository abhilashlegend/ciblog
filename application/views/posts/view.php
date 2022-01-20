<h1><?php echo $post['title']; ?></h1>
<div class="row">
	<div class="col-sm-12">
		<img src="<?php echo site_url() . 'assets/uploads/images/posts/' . $post['image']; ?>" alt="<?php echo $post['image']; ?>" class="img-fluid w-50" height="500" />
	</div>
</div>
<div class="row">
	<div class="col-sm-6">
		<p>
			<small><strong>Created On:</strong> <?php echo $post['created_at']; ?></small>
		</p>
	</div>
	<div class="col-sm-6">
		<p>
			<small><strong>Category: </strong> <?php echo $category['name']; ?></p></small> 
		</p>
	</div>
</div>
<div class="post-body">
	<?php echo $post['body']; ?>
</div>
<div class="row my-3">
	<div class="col-sm-12 text-end">
		<a href="<?php echo site_url() . 'posts/edit/' . $post['id']; ?>" class="btn btn-success">Edit</a>
		<a href="<?php echo site_url() . 'posts/delete/' . $post['id']; ?>" class="btn btn-danger">Delete</a>
	</div>
</div>
<div class="row">
	<div class="col-sm-12">
		<h2>Comments</h2>
		<?php echo validation_errors('<div class="alert alert-danger" role="alert">','</div>'); ?>
		<?php if($this->session->flashdata('success')) {?>
                            	<div class="alert alert-success alert-dismissible fade show">
                                    
                                    <strong>Success!</strong> <?php echo $this->session->flashdata('success');?>
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                                <?php } 
                                 if($this->session->flashdata('fail')) {?>
                                	<div class="alert alert-danger alert-dismissible fade show">
                                    
                                    <strong>Error!</strong> <?php echo $this->session->flashdata('fail');?>
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                                <?php } ?>
	</div>
</div>

<?php echo form_open('comments/create') ?>
<div class="row">
	
	<div class="col-sm-6">
			<div class="mb-3">
			   <label for="name" class="form-label"><span>*</span> Name</label>
			   			
			   <?php
			   	$attributes = array(
			   		'name' 	=>	'name',
			   		'id'	=>	'name',
			   		'class' =>	'form-control',
			   		'value' => $this->session->flashdata('name'),
			   		'required' => ''
			   	);

			   	echo form_input($attributes);
			   ?>    
			</div>

			<div class="mb-3">
			   <label for="email" class="form-label"><span>*</span> Email</label>
			   <input type="email" class="form-control" id="email" value="<?php echo $this->session->flashdata('email'); ?>" name="email" required />			    
			</div>

			<div class="mb-3">
	            <label for="security"><span>*</span> Security code</label> <br />
	            <input type="text" class="form-control security-field" id="security" name="security" placeholder="Enter code" required />
	            <p id="captImg" class="captcha-img" style=""><?php echo $captchaImg; ?></p>
	          
	        </div>			
	</div>
	<div class="col-sm-6">
		<div class="mb-3">
			   <label for="comment" class="form-label"><span>*</span> Comment</label>
			   <textarea rows="5" class="form-control" id="comment" name="comment"><?php echo $this->session->flashdata('comment'); ?></textarea>	

			   <input type="hidden" name="postId" value="<?php echo $post['id']; ?>" />
			   <input type="hidden" name="code" id="code" value="<?php echo $code; ?>" />
			   <input type="hidden" name="slug" value="<?php echo $post['slug']; ?>" />
			   <button type="submit" class="btn btn-primary mt-3">Submit</button>    
		</div>
	</div>
	
</div>

</form>