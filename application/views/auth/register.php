

<div class="row">
	<div class="col-sm-5">
		<h1 class="mb-4"><?php echo $title; ?></h1>
		<?php echo form_open('auth/register'); ?>
			<div class="row">
				<div class="col-sm-6">
					<div class="mb-3">
					    <label for="firstname" class="form-label"><span>*</span> First Name</label>
					    <?php
					    	$attributes = array(
					    		'class' => 'form-control',
					    		'name'  => 'firstname',
					    		'id'	=> 'firstname',
					    		'aria-describedby' => 'firstnameError',
					    		'value' => set_value('firstname')
					    	);

					    	$attributes = classChecker('firstname',$attributes);
					    	
					    	echo form_input($attributes);

					     echo form_error('firstname', '<div class="invalid-feedback" id="firstnameError">', '</div>'); 
					     ?>
					</div>
					
				</div>
				<div class="col-sm-6">
					<div class="mb-3">
					    <label for="lastname" class="form-label"><span>*</span> Last Name</label>
					    <?php
					    	$attributes = array(
					    		'name' 	=> 'lastname',
					    		'id'	=> 'lastname',
					    		'class' => 'form-control',
					    		'aria-describedby'	=> 'lastnameError',
					    		'value' => set_value('lastname')
					    	);

					    	$attributes = classChecker('lastname', $attributes);

					    	echo form_input($attributes);

					    	echo form_error('lastname','<div class="invalid-feedback" id="lastnameError">', '</div>');

					    ?>
					    
					</div>
				</div>
			</div>

			<div class="row">
				<div class="col-sm-6">
					<div class="mb-3">
					    <label for="email" class="form-label"><span>*</span> Email</label>
					    <?php
					    	$attributes = array(
					    		'name' 	=> 'email',
					    		'id'	=> 'email',
					    		'class' => 'form-control',
					    		'aria-describedby'	=> 'emailError',
					    		'value' => set_value('email')
					    	);

					    	$attributes = classChecker('email', $attributes);

					    	//echo form_input($attributes); 

					    	$emailField = '<input type="email"';
					    	foreach($attributes as $attribute => $value) {
					    		$emailField .= $attribute . "='" .   $value . "'"; 

					    	}

					    	$emailField .= ">";

					    	echo $emailField;

					    	echo form_error('email','<div class="invalid-feedback" id="emailError">', '</div>');

					    ?>

					   
					</div>
				</div>
				<div class="col-sm-6">
					<div class="mb-3">
					    <label for="username" class="form-label"><span>*</span> Username</label>
					    <?php
					    	$attributes = array(
					    		'name' 	=> 'username',
					    		'id'	=> 'username',
					    		'class' => 'form-control',
					    		'aria-describedby'	=> 'usernameError',
					    		'value' => set_value('username')
					    	);

					    	$attributes = classChecker('username', $attributes);

					    	echo form_input($attributes);

					    	echo form_error('username','<div class="invalid-feedback" id="usernameError">', '</div>');

					    ?>
					    
					</div>
				</div>
			</div>

			<div class="row">
				<div class="col-sm-6">
					<div class="mb-3">
					    <label for="password" class="form-label"><span>*</span> Password</label>
					    <?php
					    	$attributes = array(
					    		'name' 	=> 'password',
					    		'id'	=> 'password',
					    		'class' => 'form-control',
					    		'aria-describedby'	=> 'passwordError',
					    		'value' => set_value('password')
					    	);

					    	$attributes = classChecker('password', $attributes);

					    	echo form_password($attributes);

					    	echo form_error('password','<div class="invalid-feedback" id="passwordError">', '</div>');

					    ?>
					    
					</div>
				</div>

				<div class="col-sm-6">
					<div class="mb-3">
					    <label for="confirm-password" class="form-label"><span>*</span> Confirm Password</label>
					    <?php
					    	$attributes = array(
					    		'name' 	=> 'cpassword',
					    		'id'	=> 'confirm-password',
					    		'class' => 'form-control',
					    		'aria-describedby'	=> 'confirm-passwordError',
					    		'value' => set_value('cpassword')
					    	);

					    	$attributes = classChecker('cpassword', $attributes);

					    	echo form_password($attributes);

					    	echo form_error('cpassword','<div class="invalid-feedback" id="confirm-passwordError">', '</div>');

					    ?>
					    
					</div>
				</div>
			</div>

			<div class="mb-3">
	            <label for="security" class="form-label"><span>*</span> Security code</label> <br />
	            <?php
			    	$attributes = array(
			    		'name' 	=> 'security',
			    		'id'	=> 'security',
			    		'class' => 'form-control security-field',
			    		'aria-describedby'	=> 'securityError',
			    		'value' => set_value('security'),
			    		'style' => 'width:150px;float:left;margin-right:10px;'
			    	);

			    	$attributes = classChecker('security', $attributes);

			    	echo form_input($attributes);

			    	
			    ?>
	            
	            <p id="captImg" class="captcha-img" style=""><?php echo $captchaImg; ?></p>

	            <?php 

	            echo form_error('security','<div class="invalid-feedback" id="securityError">', '</div>');

	            ?>
	          
	        </div>	
	        <?php
		    	
		    	echo form_hidden('code', $code);

			?>
	        
			<button type="submit" class="btn btn-primary">Submit</button>
			<button type="reset" class="btn btn-secondary">Reset</button>
		</form>
	</div>
	<div class="col-sm-7">

		<div id="carouselExampleIndicators" class="carousel slide mt-4" data-bs-ride="carousel">
		  <div class="carousel-indicators">
		    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
		    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
		    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
		  </div>
		  <div class="carousel-inner" style="max-height: 80vh;">
		    <div class="carousel-item active">
		      <img src="<?php echo base_url(); ?>assets/images/reg-1.jpg" class="d-block w-100 h-50" alt="">
		    </div>
		    <div class="carousel-item">
		      <img src="<?php echo base_url(); ?>assets/images/reg-2.jpg" class="d-block w-100" alt="">
		    </div>
		    <div class="carousel-item">
		      <img src="<?php echo base_url(); ?>assets/images/reg-3.jpg" class="d-block w-100" alt="">
		    </div>
		  </div>
		  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
		    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
		    <span class="visually-hidden">Previous</span>
		  </button>
		  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
		    <span class="carousel-control-next-icon" aria-hidden="true"></span>
		    <span class="visually-hidden">Next</span>
		  </button>
		</div>

	</div>
</div>