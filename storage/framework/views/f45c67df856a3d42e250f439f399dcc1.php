

<?php $__env->startPush('styles'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('assets/css/login.css')); ?>">
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
<div class="login-wrapper">
    <a href="<?php echo e(url('/')); ?>" class="btn-back">
        <i class="fas fa-chevron-left"></i>
    </a>

    <div class="glass-card">
        <img src="<?php echo e(asset('assets/img/icons/logo.svg')); ?>" alt="Roomly" class="login-logo">
        
        <h2 class="font-serif mb-4">Welcome Back!</h2>

        <form action="<?php echo e(route('login.action')); ?>" method="POST">
            <?php echo csrf_field(); ?>
            <div class="form-group-custom">
                <label>Email</label>
                <input type="email" name="email" class="input-dark" placeholder="Email Anda" required value="<?php echo e(old('email')); ?>">
            </div>

            <div class="form-group-custom">
                <label>Password</label>
                <div class="password-container">
                    <input type="password" name="password" id="password" class="input-dark" placeholder="Password Anda" required>
                    <i class="fas fa-eye toggle-password" id="eyeIcon"></i>
                </div>
            </div>

            <button type="submit" class="btn-login-submit">Login</button>
        </form>

        <p class="reg-link">
            Are You New Member? <a href="<?php echo e(route('register')); ?>">Register</a>
        </p>
    </div>
</div>
<?php $__env->stopSection(); ?>


<?php $__env->startPush('scripts'); ?>
    <script src="<?php echo e(asset('assets/js/login.js')); ?>"></script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\project laravel\laravel\resources\views/login.blade.php ENDPATH**/ ?>