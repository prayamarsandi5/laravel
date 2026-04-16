

<?php $__env->startPush('styles'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('assets/css/profile.css')); ?>">
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
<div class="container profile-container">
    <div class="row">
        
        <div class="col-md-3">
            <div class="glass-card sidebar-card">
                <div class="profile-header text-center">
                    <div class="avatar-wrapper">
                        <div class="avatar-circle-large">
                            <?php echo e(strtoupper(substr(Auth::user()->name, 0, 1))); ?>

                        </div>
                        <div class="camera-icon"><i class="fas fa-camera"></i></div>
                    </div>
                </div>

                <ul class="profile-menu mt-4">
                    <li><a href="#"><i class="fas fa-credit-card"></i> Kartu Saya</a></li>
                    <li><a href="#"><i class="fas fa-wallet"></i> E-Wallet Saya</a></li>
                    <li><a href="#"><i class="fas fa-box"></i> Pesanan Saya</a></li>
                    <li><a href="#"><i class="fas fa-undo"></i> Refunds</a></li>
                    <li class="active"><a href="#"><i class="fas fa-user-cog"></i> My Account</a></li>
                    <li>
                        <form action="<?php echo e(route('logout')); ?>" method="POST">
                            <?php echo csrf_field(); ?>
                            <button type="submit" class="logout-btn"><i class="fas fa-power-off"></i> Log Out</button>
                        </form>
                    </li>
                </ul>
            </div>
        </div>

        
        <div class="col-md-9">
            <div class="glass-card form-card">
                <h4 class="mb-4 fw-bold text-dark">Personal Data</h4>
                
                
                <?php if(session('success')): ?>
                    <div class="alert alert-success border-0 small mb-4" style="background: #d1e7dd; color: #0f5132;">
                        <i class="fas fa-check-circle me-2"></i> <?php echo e(session('success')); ?>

                    </div>
                <?php endif; ?>

                <hr>

                
                <form action="<?php echo e(route('profile.update')); ?>" method="POST">
                    <?php echo csrf_field(); ?> 
                    
                    <div class="mb-3">
                        <label class="form-label text-muted small">Full Name</label>
                        <input type="text" name="name" class="form-control input-custom" value="<?php echo e(Auth::user()->name); ?>" required>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-3">
                            <label class="form-label text-muted small">Gender</label>
                            <select name="gender" class="form-select input-custom">
                                <option value="Male" <?php echo e(Auth::user()->gender == 'Male' ? 'selected' : ''); ?>>Male</option>
                                <option value="Female" <?php echo e(Auth::user()->gender == 'Female' ? 'selected' : ''); ?>>Female</option>
                            </select>
                        </div>
                        <div class="col-md-9">
                            <label class="form-label text-muted small">Birthdate</label>
                            <div class="d-flex gap-2">
                                <?php
                                    $birthdate = Auth::user()->birthdate ? \Carbon\Carbon::parse(Auth::user()->birthdate) : null;
                                ?>
                                <input type="text" name="day" class="form-control input-custom" placeholder="DD" value="<?php echo e($birthdate ? $birthdate->format('d') : ''); ?>">
                                <input type="text" name="month" class="form-control input-custom" placeholder="MM" value="<?php echo e($birthdate ? $birthdate->format('m') : ''); ?>">
                                <input type="text" name="year" class="form-control input-custom" placeholder="YYYY" value="<?php echo e($birthdate ? $birthdate->format('Y') : ''); ?>">
                            </div>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label text-muted small">City of Residence</label>
                        <input type="text" name="city" class="form-control input-custom" value="<?php echo e(Auth::user()->city); ?>">
                    </div>

                    <div class="row mb-4">
                        <div class="col-md-6">
                            <label class="form-label text-muted small">Email</label>
                            <input type="email" class="form-control input-custom" value="<?php echo e(Auth::user()->email); ?>" readonly>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label text-muted small">Mobile Number</label>
                            <input type="text" name="phone" class="form-control input-custom" placeholder="08xxxxxxx" value="<?php echo e(Auth::user()->phone); ?>">
                        </div>
                    </div>

                    <div class="text-end">
                        <button type="submit" class="btn btn-gold px-5">Save</button>
                    </div>
                </form>
                
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\project laravel\laravel\resources\views/profile.blade.php ENDPATH**/ ?>