<div class="d-flex justify-content-between">
	<h1 class="w-100">Latest Posts</h1> 
	<a href="<?php echo site_url() . 'posts/create' ?>" class="btn btn-primary m-auto">Create</a>
	<a href="<?php echo site_url() . 'categories' ?>" class="btn btn-primary m-auto ms-2">Categories</a>
</div>

<?php foreach($posts as $post) : ?>
	<article class="bg-default border-bottom mb-2 py-3">
		<h2><?php echo $post['title']; ?></h2>
		
		<p><?php echo word_limiter($post['body'], 50); ?></p>
		<p class="m-0 d-flex align-items-center">
			<small class="align-middle"><strong>Created at :</strong> <?php echo $post['created_at']; ?></small>
			<a class="btn btn-secondary ms-auto" href="<?php echo site_url('/posts/' . $post['slug']); ?>">Read more</a>
		</p>
	</article>
<?php endforeach; ?>