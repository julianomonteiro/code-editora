<?php $__env->startSection('content'); ?>
    <div class="content">
        <div class="row">
            <h3>Lixeira de Livros</h3>
        </div>
            <br />
            <div class="row">
                <?php echo Form::model(compact('search'), ['class'=> 'form-inline', 'method' => 'GET']); ?>

                    <?php echo Form::label('search', 'Pesquisar por título:', ['class' => 'control-label']); ?>

                    <?php echo Form::text('search', null, ['class' => 'form-control']); ?>

                    <?php echo Form::submit('Buscar', ['class' => 'btn btn-primary']); ?>

                <?php echo Form::close(); ?>

            </div>
        <div class="row">
            <?php if($books->count() > 0): ?>
            <?php echo Table::withContents($books->items())->striped()
                ->callback('Ações', function($field, $book){
                    $linkView = route('trashed.books.show', ['books' => $book->id]);

                    $linkDestroy = route('books.destroy',['book' => $book->id]);
                    $restoreForm = "restore-form-{$book->id}";
                    $form = Form::open(['route' => ['trashed.books.update', 'book' => $book->id],
                                    'id' => $restoreForm, 'method' => 'PUT', 'sytle' => 'display:none']).Form::close();
                                    Form::hidden('redirect_to', URL::previous());
                                    Form::close();
                    $ancorRestore = Button::link('Restaurar')->asLinkTo($linkDestroy)->addAttributes([
                        'onclick' => "event.preventDefault();document.getElementById(\"{$restoreForm}\").submit();"
                    ]);

                    return "<ul class=\"list-inline\">".
                    "<li>".Button::link('Visualizar')->asLinkTo($linkView)."</li>".
                    "<li>|</li>".
                    "<li>".$ancorRestore."</li>".
                    "</ul>".$form;
                }); ?>

            <?php echo e($books->links()); ?>

            <?php else: ?>
                <br />
                <p class="well well-lg text-center">
                    <strong>Lixeira vazia</strong>
                </p>
            <?php endif; ?>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>