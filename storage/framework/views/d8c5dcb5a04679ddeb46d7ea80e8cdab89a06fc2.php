<?php $__env->startSection('content'); ?>
    <div class="content">
        <div class="row">
            <h3>Nova Categoria</h3>
            <a href="<?php echo e(route('categories.index')); ?>" class="btn btn-primary">Voltar</a>
            <br /><br />
            <?php if($errors->any()): ?>
                <ul class="alert alert-danger list-inline">
                    <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                        <li><?php echo e($error); ?></li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                </ul>
            <?php endif; ?>
        </div>

        <div class="row">
            <?php echo Form::model($category, ['route' => ['categories.update', 'category' => $category->id], 'class'=> 'form', 'method' => 'PUT']); ?>


                <?php echo $__env->make('modules.codeedubook.categories._form', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

                <?php echo Html::openFormGroup(); ?>

                    <?php echo Button::primary('Salvar Categoria')->submit(); ?>

                <?php echo html::closeFormGroup(); ?>


            <?php echo Form::close(); ?>

        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>