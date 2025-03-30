

<?php $__env->startSection('title'); ?>
    <?php echo e(__('Admins - Admin Panel')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('styles'); ?>
    <!-- Start datatable css -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.18/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.jqueryui.min.css">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('admin-content'); ?>

<!-- page title area start -->
<div class="page-title-area">
    <div class="row align-items-center">
        <div class="col-sm-6">
            <div class="breadcrumbs-area clearfix">
                <h4 class="page-title pull-left"><?php echo e(__('Admins')); ?></h4>
                <ul class="breadcrumbs pull-left">
                    <li><a href="<?php echo e(route('admin.dashboard')); ?>"><?php echo e(__('Dashboard')); ?></a></li>
                    <li><span><?php echo e(__('All Admins')); ?></span></li>
                </ul>
            </div>
        </div>
        <div class="col-sm-6 clearfix">
            <?php echo $__env->make('backend.layouts.partials.logout', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
        </div>
    </div>
</div>
<!-- page title area end -->

<div class="main-content-inner">
    <div class="row">
        <!-- data table start -->
        <div class="col-12 mt-5">
            <div class="card">
                <div class="card-body">
                    <h4 class="header-title float-left"><?php echo e(__('Admins')); ?></h4>
                    <p class="float-right mb-2">
                        <?php if(auth()->user()->can('admin.edit')): ?>
                            <a class="btn btn-primary text-white" href="<?php echo e(route('admin.admins.create')); ?>">
                                <?php echo e(__('Create New Admin')); ?>

                            </a>
                        <?php endif; ?>
                    </p>
                    <div class="clearfix"></div>
                    <div class="data-tables">
                        <?php echo $__env->make('backend.layouts.partials.messages', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
                        <table id="dataTable" class="text-center">
                            <thead class="bg-light text-capitalize">
                                <tr>
                                    <th width="5%"><?php echo e(__('Sl')); ?></th>
                                    <th width="10%"><?php echo e(__('Name')); ?></th>
                                    <th width="10%"><?php echo e(__('Email')); ?></th>
                                    <th width="40%"><?php echo e(__('Roles')); ?></th>
                                    <th width="15%"><?php echo e(__('Action')); ?></th>
                                </tr>
                            </thead>
                            <tbody>
                               <?php $__currentLoopData = $admins; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $admin): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                               <tr>
                                    <td><?php echo e($loop->index+1); ?></td>
                                    <td><?php echo e($admin->name); ?></td>
                                    <td><?php echo e($admin->email); ?></td>
                                    <td>
                                        <?php $__currentLoopData = $admin->roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <span class="badge badge-info mr-1">
                                                <?php echo e($role->name); ?>

                                            </span>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </td>
                                    <td>
                                        <?php if(auth()->user()->can('admin.edit')): ?>
                                            <a class="btn btn-success text-white" href="<?php echo e(route('admin.admins.edit', $admin->id)); ?>">Edit</a>
                                        <?php endif; ?>
                                        
                                        <?php if(auth()->user()->can('admin.delete')): ?>
                                        <a class="btn btn-danger text-white" href="javascript:void(0);"
                                        onclick="event.preventDefault(); if(confirm('Are you sure you want to delete?')) { document.getElementById('delete-form-<?php echo e($admin->id); ?>').submit(); }">
                                            <?php echo e(__('Delete')); ?>

                                        </a>

                                        <form id="delete-form-<?php echo e($admin->id); ?>" action="<?php echo e(route('admin.admins.destroy', $admin->id)); ?>" method="POST" style="display: none;">
                                            <?php echo method_field('DELETE'); ?>
                                            <?php echo csrf_field(); ?>
                                        </form>
                                        <?php endif; ?>
                                    </td>
                                </tr>
                               <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!-- data table end -->
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
     <!-- Start datatable js -->
     <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>
     <script src="https://cdn.datatables.net/1.10.18/js/jquery.dataTables.min.js"></script>
     <script src="https://cdn.datatables.net/1.10.18/js/dataTables.bootstrap4.min.js"></script>
     <script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>
     <script src="https://cdn.datatables.net/responsive/2.2.3/js/responsive.bootstrap.min.js"></script>
     
     <script>
        if ($('#dataTable').length) {
            $('#dataTable').DataTable({
                responsive: true
            });
        }
     </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('backend.layouts.master', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\Project\laravel-role\resources\views/backend/pages/admins/index.blade.php ENDPATH**/ ?>