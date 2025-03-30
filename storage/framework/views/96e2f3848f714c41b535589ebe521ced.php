

<?php $__env->startSection('title'); ?>
    403 - Access Denied
<?php $__env->stopSection(); ?>

<?php $__env->startSection('error-content'); ?>
    <h2>403</h2>
    <p>Access to this resource on the server is denied</p>
    <hr>
    <p class="mt-2">
        <?php echo e($exception->getMessage()); ?>

    </p>
    <a href="<?php echo e(route('admin.dashboard')); ?>">Back to Dashboard</a>
    <a href="<?php echo e(route('admin.login')); ?>">Login Again !</a>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('errors.errors_layout', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\Project\laravel-role\resources\views/errors/403.blade.php ENDPATH**/ ?>