<?php $__env->startSection('content'); ?>
    <div class="content">
        <div class="row">
            <h3>Editar meu perfil</h3>
            <a href="<?php echo e(route('codeeduuser.users.index')); ?>" class="btn btn-primary">Voltar</a>
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
            <?php echo Form::open(['route' => ['codeeduuser.user_settings.update'], 'class'=> 'form', 'method' =>'PUT']); ?>


            <?php echo Html::openFormGroup('password', $errors); ?>

                <?php echo Form::label('password', 'Senha', ['class' => 'control-label']); ?>

                <?php echo Form::password('password', ['class' => 'form-control']); ?>

                <?php echo Form::error("password", $errors); ?>

            <?php echo html::closeFormGroup(); ?>


            <?php echo Html::openFormGroup(); ?>

                <?php echo Form::label('password_confirmation', 'Confirmar Senha', ['class' => 'control-label']); ?>

                <?php echo Form::password('password_confirmation', ['class' => 'form-control']); ?>

            <?php echo html::closeFormGroup(); ?>


            <?php echo Html::openFormGroup(); ?>

            <?php echo Button::primary('Salvar usuário')->submit(); ?>

            <?php echo html::closeFormGroup(); ?>


            <?php echo Form::close(); ?>


        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>