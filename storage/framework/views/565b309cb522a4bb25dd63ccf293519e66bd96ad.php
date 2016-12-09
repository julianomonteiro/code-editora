<?php $__env->startSection('content'); ?>
    <div class="content">
        <div class="row">
            <h3>Listagem de Livros</h3>
            <?php echo Button::primary('Novo Livro')->asLinkTo(route('books.create')); ?>

        </div>
        <div class="row">
            <?php echo Table::withContents($books->items())->striped()
                ->callback('Ações', function($field, $book){
                    $linkEdit = route('books.edit', ['books' => $book->id]);

                    $linkDestroy = route('books.destroy',['book' => $book->id]);
                    $deleteForm = "delete-form-{$book->id}";
                    $form = Form::open(['route' => ['books.destroy', 'book' => $book->id],
                                    'id' => $deleteForm, 'method' => 'DELETE', 'sytle' => 'display:none']).Form::close();
                    $ancorDestroy = Button::link('Excluir')->asLinkTo($linkDestroy)->addAttributes([
                        'onclick' => "event.preventDefault();document.getElementById(\"{$deleteForm}\").submit();"
                    ]);

                    return "<ul class=\"list-inline\">".
                    "<li>".Button::link('Editar')->asLinkTo($linkEdit)."</li>".
                    "<li>|</li>".
                    "<li>".$ancorDestroy."</li>".
                    "</ul>".$form;
                }); ?>

            <?php echo e($books->links()); ?>

        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>