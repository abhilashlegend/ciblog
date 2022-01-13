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