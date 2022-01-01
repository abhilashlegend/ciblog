<h1><?php echo $post['title']; ?></h1>
<p>
	<small><strong>Created On:</strong> <?php echo $post['created_at']; ?></small>
</p>
<div class="post-body">
	<?php echo $post['body']; ?>
</div>
<div class="row mt-3">
	<div class="col-sm-12 text-end">
		<a href="<?php echo site_url() . 'posts/delete/' . $post['id']; ?>" class="btn btn-danger">Delete</a>
	</div>
</div>