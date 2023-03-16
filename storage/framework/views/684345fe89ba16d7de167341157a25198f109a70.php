<?php $__env->startSection('title'); ?>
<?php echo app('translator')->get('translation.detached'); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<?php $__env->startComponent('components.breadcrumb'); ?>
<?php $__env->slot('li_1'); ?>
Layouts
<?php $__env->endSlot(); ?>
<?php $__env->slot('title'); ?>
Detached
<?php $__env->endSlot(); ?>
<?php echo $__env->renderComponent(); ?>



<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
<script src="<?php echo e(URL::asset('/assets/js/app.min.js')); ?>"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.layouts-detached', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/luk/Desktop/WORKSPACE/OVERLORD/resources/views/layouts-detached.blade.php ENDPATH**/ ?>