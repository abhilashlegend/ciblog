<h1><?php echo $post['title']; ?></h1>
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
<section id="comment-form" class="comment-form-section">
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
</section>

<?php if(count($comments) > 0): ?>
<section class="comments-section pt-2">
    <div class="row">
        <div class="col-md-12">
        	<?php $counter = 0; ?>
            <?php foreach($comments as $comment): ?>
            <div class="comment-bottom p-2 <?php echo $class = $counter % 2 == 0 ? 'com-alt' : null; ?>">
               
                <div class="commented-section mt-2">
                    <div class="d-flex flex-row align-items-center commented-user">
                        <h5 class="me-2"><?php echo $comment['name']; ?></h5>
                        <span class="dot mb-1"></span>
                        <span class="mb-1 ms-2"><?php echo $comment['created_at']; ?></span>
                        <button type="button" class="ms-auto align-self-start red-cross btn-close" aria-label="Delete"></button>
                    </div>
                    <div class="comment-text-sm"><span><?php echo $comment['body']; ?></span></div>
                    <div class="reply-section">
                        <div class="d-flex flex-row align-items-center voting-icons">

                            <strong class="ml-2 mt-1"><a href="#comment-form">Reply</a></strong>
                        </div>
                    </div>
                </div>
                
                
            </div>
        <?php 
         $counter++;
         endforeach; 
         ?>
        </div>
    </div>
</section>

<?php endif; ?>