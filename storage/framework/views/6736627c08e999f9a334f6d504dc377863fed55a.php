<?php echo $__env->make('home.assetss', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
	
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>

<body class="auth-page">
	
    <!-- Wrapper Starts -->
    <div class="limiter">
        <div class="container-form user-auth" >
				<div class="section-form-box">
                            <!-- Logo Starts -->
                            <div>
                                <a href="<?php echo e(url('/')); ?>">
                                  <span style="color:#04b9f4;font-size:30px;" class="w3-hide-large"><img src="<?php echo e(asset ('home/images/logo-light.png')); ?>" width="320"></span>
                                </a>
                            </div>
                            <!-- Logo Ends -->
						    <!-- Section Title Starts -->
							<h3 class="mb-3"> registration</h3>
						<!-- Section Title Ends -->
						<!-- Form Starts -->
						<form  class="form" method="POST" action="<?php echo e(route('register')); ?>">
                            <?php echo e(csrf_field()); ?>   
                            <!-- Input Field Starts -->
							<div class="form__group">
								<input  class="form__input" id="name" placeholder="firstname" name="name" type="text" value="<?php echo e(old('name')); ?>" required>
                                <?php if($errors->has('name')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('name')); ?></strong>
                                    </span>
                                <?php endif; ?>
                                <label for="name" class="form__label">First Name</label>
                            </div>
							<!-- Input Field Ends -->
	
							<!-- Input Field Starts for lastname -->
							<div class="form__group">
								<input  class="form__input" id="name" placeholder="lastname" name="l_name" type="text" value="<?php echo e(old('l_name')); ?>" required >
                            
                                <?php if($errors->has('l_name')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('l_name')); ?></strong>
                                    </span>
                                <?php endif; ?>
                                <label for="name" class="form__label">Last Name</label>
                            </div>
							<!-- Input Field Ends -->

                             <!-- Input Field Starts -->
                            <div class="form__group">
                                <input class="form__input" id="email" placeholder="email" name="email" type="email" value="<?php echo e(old('email')); ?>" required>
                            
                                <?php if($errors->has('email')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('email')); ?></strong>
                                    </span>
                                <?php endif; ?>
                                <label for="email" class="form__label">Emails</label>
                            </div>
                            
                            <div class="form__group">
								<input  class="form__input" id="phone" placeholder="phone number"  name="phone" type="number" value="<?php echo e(old('phone')); ?>" required>
                            
                                <?php if($errors->has('phone')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('phone')); ?></strong>
                                    </span>
                                <?php endif; ?>
                                <label for="phone" class="form__label">Phone Number</label>
                            </div>
							
							<!-- Input Field Starts -->
							<div class="form__group">
                                <?php if($errors->has('password')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('password')); ?></strong>
                                    </span>
                                <?php endif; ?>
                                <input  class="form__input" id="password" name="password" id="password" placeholder="Password" type="password" required>
                                <label for="password" class="form__label">Password</label>
							</div>
                            <!-- Input Field Ends -->
                            <!-- Input Field Starts -->
							<div class="form__group">
								<input  class="form__input" id="password" placeholder="re-enter password" name="password_confirmation" type="password" value="<?php echo e(old('password_confirmation')); ?>" required>
                                <label for="password" class="form__label">Re-enter password</label>
							</div>
							<!-- Input Field Ends -->
                            <!-- Input Field Starts -->
                            
                            
                            <div class="form__group">
								
								<select  class="form__input" name="country" id="country">
                                <option value="" selected disabled hidden>Select country</option>
                                <option selected="selected"><?php echo e($user_country); ?></option>
								<?php $__currentLoopData = $countries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $country): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php if($country === $user_country): ?>
                                        <option value="<?php echo e($country); ?>" selected><?php echo e($country); ?></option>
                                    <?php else: ?>
                                        <option value="<?php echo e($country); ?>"><?php echo e($country); ?></option>
                                    <?php endif; ?>
								<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
							<!-- Submit Form Button Starts -->
							<div class="form__group text-center">
								<button class="btn btn__login" type="submit">Create account</button>
                            </div>
                            
							<!-- Submit Form Button Ends -->
                            <div class="signup text-center">
                                <a href="<?php echo e(route('login')); ?>"><p class=""> Already a member? Login </p></a>
                            </div>
                        </form>
                        <!-- Form Ends -->
                        <!-- Copyright Text Starts -->
                        <div class="form__footer text-center">
                            <p class="mt-2">  &copy; Copyright  <?php echo e(date('Y')); ?> &nbsp; <?php echo e($settings->site_name); ?> &nbsp; All Rights Reserved.</p>
                        </div>
				<!-- Copyright Text Ends -->
			</div>
		</div>

    </div>
    <!-- Wrapper Ends -->
</body>

</html>

