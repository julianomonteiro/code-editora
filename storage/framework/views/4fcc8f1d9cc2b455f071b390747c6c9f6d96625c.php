<?php $__env->startSection('content'); ?>
    <div class="content">
        <div class="row">
            <h3>Novo Livro</h3>
            <a href="<?php echo e(route('books.index')); ?>" class="btn btn-primary">Voltar</a>
        </div>

        <div class="row">

            <?php echo Form::open(['route' => 'books.store', 'class'=> 'form']); ?>


            <div class="form-group">
                <?php echo Form::label('title', 'Titulo'); ?>

                <?php echo Form::text('title', null, ['class' => 'form-control']); ?>

            </div>

            <div class="form-group">
                <?php echo Form::label('subtitle', 'Subitulo'); ?>

                <?php echo Form::text('subtitle', null, ['class' => 'form-control']); ?>

            </div>

            <div class="form-group">
                <?php echo Form::label('price', 'Preço'); ?>

                <?php echo Form::text('price', null, ['class' => 'form-control']); ?>

            </div>

            <div class="form-group">
                <?php echo Form::submit('Criar Livro', ['class' => 'btn btn-primary']); ?>

            </div>

            <?php echo Form::close(); ?>


        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>