<?php $__env->startSection('content'); ?>
    <div class="content">
        <div class="row">
            <h3>Nova Categoria</h3>
            <a href="<?php echo e(route('categories.index')); ?>" class="btn btn-primary">Voltar</a>
        </div>

        <div class="row">

            <?php echo Form::model($category, ['route' => ['categories.update', 'category' => $category->id], 'class'=> 'form', 'method' => 'PUT']); ?>


            <div class="form-group">
                <?php echo Form::label('name', 'Name'); ?>

                <?php echo Form::text('name', null, ['class' => 'form-control']); ?>

            </div>

            <div class="form-group">
                <?php echo Form::submit('Salvar categoria', ['class' => 'btn btn-primary']); ?>

            </div>

            <?php echo Form::close(); ?>


        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>