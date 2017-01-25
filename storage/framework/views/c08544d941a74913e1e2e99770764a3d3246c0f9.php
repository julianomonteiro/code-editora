<span class="help-block">
    <?php if(!str_contains($field, '*')): ?>
        <strong><?php echo e($errors->first($field)); ?></strong>
    <?php else: ?>
        <ul>
        <?php $__currentLoopData = $errors->get($field); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $fieldErrors): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
            <li><?php echo e($fieldErrors[0]); ?></li>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
        </ul>
    <?php endif; ?>
</span>