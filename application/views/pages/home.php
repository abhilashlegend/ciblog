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
<div class="row">
	<div class="col-sm-12">

		<?php if(isset($message)): ?>
		<div class="alert alert-success d-flex align-items-center" role="alert">
		  <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Info:"><use xlink:href="#info-fill"/></svg>
		  <div>
		    <?php echo $message; ?>
		  </div>
		</div> <!-- End of alert -->
		<?php endif; ?>


		<?php if(isset($error)): ?>
		<div class="alert alert-danger d-flex align-items-center" role="alert">
		  <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Error:"><use xlink:href="#info-fill"/></svg>
		  <div>
		    <?php echo $error; ?>
		  </div>
		</div> <!-- End of alert -->
		<?php endif; ?>

	</div>
</div> <!-- End of row -->

<section class="hero d-flex align-items-center">
	<div class="row">
		<div class="col-lg-6 d-flex flex-column justify-content-center px-5">
			<h1>We offer modern solutions for growing your business</h1>
			<h2>We are team of talented designers making websites with Bootstrap
Get Started</h2>
				<div class="text-center text-lg-start">
          <a href="<?php echo site_url('/about'); ?>" class="btn-get-started scrollto d-inline-flex align-items-center justify-content-center align-self-center btn btn-primary">
            <span>Get Started</span>
            <i class="bi bi-arrow-right"></i>
          </a>
        </div>
		</div>

		<div class="col-lg-6">
			<img class="img-fluid" src="<?php echo site_url() . 'assets/images/hero-img.png'; ?>" alt="" />
		</div>
	</div>
</section>

<section class="counts">
		<div class="row">
				<div class="col-lg-3 col-md-6">
					<div class="count-box">
						<i class="ri-user-smile-line"></i>
						<div>
								<span data-purecounter-start="0" data-purecounter-end="232" data-purecounter-duration="10" class="purecounter">232</span>
								<p>Happy Clients</p>
						</div>
					</div>	
				</div>	

				<div class="col-lg-3 col-md-6">
					<div class="count-box">
						<i class="ri-macbook-line"></i>
						<div>
								<span data-purecounter-start="0" data-purecounter-end="521" data-purecounter-duration="10" class="purecounter">521</span>
								<p>Projects</p>
						</div>
					</div>	
				</div>	

				<div class="col-lg-3 col-md-6">
					<div class="count-box">
						<i class="ri-headphone-line"></i>
						<div>
								<span data-purecounter-start="0" data-purecounter-end="1463" data-purecounter-duration="10" class="purecounter">1463</span>
								<p>Hours of Support</p>
						</div>
					</div>	
				</div>	

				<div class="col-lg-3 col-md-6">
					<div class="count-box">
						<i class="ri-team-line"></i>
						<div>
								<span data-purecounter-start="0" data-purecounter-end="15" data-purecounter-duration="10" class="purecounter">15</span>
								<p>Hard Workers</p>
						</div>
					</div>	
				</div>			
		</div>	
</section>


<section id="features" class="features">
	<div class="row">
		<div class="col-lg-12 text-center">
			<h2>Laboriosam et omnis fuga quis dolor direda fara</h2>
		</div>
	</div>	

	<div class="row mt-3">
		<div class="col-lg-6">
			<img class="img-fluid" src="<?php echo site_url() . 'assets/images/features.png'; ?>" alt="" />
		</div>

		<div class="col-lg-6">
			<div class="row align-self-center gy-4">
					<div class="col-md-6">
						<div class="feature-box d-flex">
							<i class="ri-check-line"></i>
							<h3>Eos aspernatur rem</h3>
						</div>
					</div>
					<div class="col-md-6">
						<div class="feature-box d-flex">
							<i class="ri-check-line"></i>
							<h3>Volup amet voluptas</h3>
						</div>
					</div>

					<div class="col-md-6">
						<div class="feature-box d-flex">
							<i class="ri-check-line"></i>
							<h3>Alias possimus</h3>
						</div>	
					</div>

					<div class="col-md-6">
						<div class="feature-box d-flex">
							<i class="ri-check-line"></i>
							<h3>Facilis neque ipsa</h3>
						</div>	
					</div>

					<div class="col-md-6">
						<div class="feature-box d-flex">
							<i class="ri-check-line"></i>
							<h3>Rerum omnis sint</h3>
						</div>	
					</div>

					<div class="col-md-6">
						<div class="feature-box d-flex">
							<i class="ri-check-line"></i>
							<h3>Repellendus mollitia</h3>
						</div>	
					</div>
			</div>
		</div>
	</div>
</section>

<section id="blog" class="recent-blog">
	<div class="row">
		<div class="col-lg-12 text-center">
			<h2>Recent posts form our Blog</h2>
		</div>
	</div>	
<?php 
	if($recent_posts):
?>
	<div class="row mt-3">

		 <?php foreach($recent_posts as $post) : ?>
		<div class="col-lg-4">
			<div class="post-box">
				<div class="post-img">
					<img src="<?php echo site_url() . 'assets/uploads/images/posts/' . $post['image']; ?>" class="img-fluid" />
				</div>
				<span class="post-date"><?php echo date("F d, h:i:s A", strtotime($post['created_at'])); ?></span>
				<h3 class="post-title"><?php echo $post['title']; ?></h3>
				<?php if($this->session->userdata('logged_in')): ?>
					<a class="readmore stretched-link mt-auto" href="<?php echo site_url('/posts/' . $post['slug']); ?>">Read more <i class="ri-arrow-right-line"></i></a>
					<?php else: ?>
						<a type="button" class="readmore stretched-link mt-auto" data-bs-toggle="modal" href="#" data-bs-target="#loginAlert">
						  Read more
						  <i class="ri-arrow-right-line"></i>
						</a>
					<?php endif; ?>
			</div>
		</div>
	<?php endforeach; ?>
	</div>
<?php
	endif;
?>
</section>


<!-- Modal -->
<div class="modal fade" id="loginAlert" tabindex="-1" aria-labelledby="loginAlertLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="loginAlertLabel">Alert!</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        Please login to view post
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Ok</button>
      </div>
    </div>
  </div>
</div>	
