<?php $__env->startSection('content'); ?>
    <div class="content">
        <div class="row">
            <h3>Listagem de Livros</h3>
            <a href="<?php echo e(route('books.create')); ?>" class="btn btn-primary">Novo Livro</a>
        </div>
        <div class="row">
            <table class="table table-striped">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Título</th>
                    <th>Subtitulo</th>
                    <th>Valor</th>
                    <th>Ação</th>
                </tr>
                </thead>
                <tbody>
                <?php $__currentLoopData = $books; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $book): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                    <tr>
                        <td><?php echo e($book->id); ?></td>
                        <td><?php echo e($book->title); ?></td>
                        <td><?php echo e($book->subtitle); ?></td>
                        <td><?php echo e($book->price); ?></td>
                        <td>
                            <ul class="list-inline">
                                <li>
                                    <a href="<?php echo e(route('books.edit', ['book' => $book->id])); ?>">Editar</a>
                                </li>
                                <li>|</li>
                                <li>
                                    <?php $deleteForm = "delete-form-{$loop->index}"; ?>
                                    <a  onclick="event.preventDefault();document.getElementById('<?php echo e($deleteForm); ?>').submit();" href="<?php echo e(route('books.destroy', ['book' => $book->id])); ?>">Excluir</a>
                                    <?php echo Form::open(['route' => ['books.destroy', 'book' => $book->id],
                                    'id' => $deleteForm, 'method' => 'DELETE', 'sytle' => 'display:none']); ?>

                                    <?php echo Form::close(); ?>

                                </li>
                            </ul>
                        </td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                </tbody>
            </table>
            <?php echo e($books->links()); ?>

        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>