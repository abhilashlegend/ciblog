<h1>Latest Posts</h1>

<?php foreach($posts as $post) : ?>
	<article class="bg-default border-bottom mb-2 py-3">
		<h2><?php echo $post['title']; ?></h2>
		
		<p><?php echo $post['body']; ?></p>
		<p class="m-0 d-flex align-items-center">
			<small class="align-middle"><strong>Created at :</strong> <?php echo $post['created_at']; ?></small>
			<a class="btn btn-secondary ms-auto" href="<?php echo site_url('/posts/' . $post['slug']); ?>">Read more</a>
		</p>
	</article>
<?php endforeach; ?>