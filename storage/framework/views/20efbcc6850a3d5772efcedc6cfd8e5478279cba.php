<?php $__env->startSection('content'); ?>
    <div class="content">
        <div class="row">
            <h3>Nova Categoria</h3>
            <a href="<?php echo e(route('books.index')); ?>" class="btn btn-primary">Voltar</a>
        </div>

        <div class="row">

            <?php echo Form::model($book, ['route' => ['books.update', 'book' => $book->id], 'class'=> 'form', 'method' => 'PUT']); ?>


                <?php echo $__env->make('books._form', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

                <?php echo Html::openFormGroup(); ?>

                    <?php echo Form::submit('Salvar Livro', ['class' => 'btn btn-primary']); ?>

                <?php echo html::closeFormGroup(); ?>


            <?php echo Form::close(); ?>


        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>