<?php $__env->startSection('content'); ?>
    <div class="content">
        <div class="row">
            <h3>Listagem de Categorias</h3>
            <?php echo Button::primary('Nova categoria')->asLinkTo(route('categories.create')); ?>

        </div>
        <div class="row">
            <?php echo Table::withContents($categories->items())->striped()
                ->callback('Ações', function($field, $category){
                    $linkEdit = route('categories.edit', ['category' => $category->id]);

                    $linkDestroy = route('categories.destroy',['category' => $category->id]);
                    $deleteForm = "delete-form-{$category->id}";
                    $form = Form::open(['route' => ['categories.destroy', 'category' => $category->id],
                                    'id' => $deleteForm, 'method' => 'DELETE', 'sytle' => 'display:none']).Form::close();
                    $ancorDestroy = Button::link('Deletar')->asLinkTo($linkDestroy)->addAttributes([
                        'onclick' => "event.preventDefault();document.getElementById(\"{$deleteForm}\").submit();"
                    ]);

                    return "<ul class=\"list-inline\">".
                    "<li>".Button::link('Editar')->asLinkTo($linkEdit)."</li>".
                    "<li>|</li>".
                    "<li>".$ancorDestroy."</li>".
                    "</ul>".$form;
                }); ?>

            <table class="table table-striped">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Ação</th>
                </tr>
                </thead>
                <tbody>
                <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                    <tr>
                        <td><?php echo e($category->id); ?></td>
                        <td><?php echo e($category->name); ?></td>
                        <td>
                            <ul class="list-inline">
                                <li>
                                    <a href="<?php echo e(route('categories.edit', ['category' => $category->id])); ?>">Editar</a>
                                </li>
                                <li>|</li>
                                <li>
                                    <?php $deleteForm = "delete-form-{$loop->index}"; ?>
                                    <a  onclick="event.preventDefault();document.getElementById('<?php echo e($deleteForm); ?>').submit();" href="<?php echo e(route('categories.destroy', ['category' => $category->id])); ?>">Excluir</a>
                                    <?php echo Form::open(['route' => ['categories.destroy', 'category' => $category->id],
                                    'id' => $deleteForm, 'method' => 'DELETE', 'sytle' => 'display:none']); ?>

                                    <?php echo Form::close(); ?>

                                </li>
                            </ul>
                        </td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                </tbody>
            </table>
            <?php echo e($categories->links()); ?>

        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>