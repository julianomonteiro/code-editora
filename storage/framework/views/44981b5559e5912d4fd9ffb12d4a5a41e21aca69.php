<?php $__env->startSection('content'); ?>
    <div class="content">
        <div class="row">
            <h3>Listagem de Categorias</h3>
            <?php echo Button::primary('Nova categoria')->asLinkTo(route('categories.create')); ?>

        </div>
        <br />
        <div class="row">
            <?php echo Form::model(compact('search'), ['class'=> 'form-inline', 'method' => 'GET']); ?>

            <?php echo Form::label('search', 'Pesquisar por nome:', ['class' => 'control-label']); ?>

            <?php echo Form::text('search', null, ['class' => 'form-control']); ?>

            <?php echo Form::submit('Buscar', ['class' => 'btn btn-primary']); ?>

            <?php echo Form::close(); ?>

        </div>
        <div class="row">
            <?php echo Table::withContents($categories->items())->striped()
                ->callback('Ações', function($field, $category){
                    $linkEdit = route('categories.edit', ['category' => $category->id]);

                    $linkDestroy = route('categories.destroy',['category' => $category->id]);
                    $deleteForm = "delete-form-{$category->id}";
                    $form = Form::open(['route' => ['categories.destroy', 'category' => $category->id],
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


            <?php echo e($categories->links()); ?>

        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>