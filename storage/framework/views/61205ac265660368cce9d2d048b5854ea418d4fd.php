<?php $__env->startSection('content'); ?>
    <div class="content">
        <div class="row">
            <h3>Visualizar Livro</h3>
            <?php echo Button::primary('Voltar')->asLinkTo(route('trashed.books.index')); ?>

        </div>

        <div class="row">
            <h3>Livro - <?php echo e($book->title); ?></h3>
            <ul class="list-group">
                <li class="list-group-item">
                    <strong>Título</strong>
                </li>
                <li class="list-group-item"><?php echo e($book->title); ?></li>
                <li class="list-group-item">
                    <strong>Subtítulo</strong>
                </li>
                <li class="list-group-item"><?php echo e($book->subtitle); ?></li>
                <li class="list-group-item">
                    <strong>Preço</strong>
                </li>
                <li class="list-group-item"><?php echo e($book->price); ?></li>
                <li class="list-group-item">
                    <strong>Categorias</strong>
                </li>
                <li class="list-group-item"><?php echo e($book->categories->implode('name', ', ')); ?></li>
            </ul>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>