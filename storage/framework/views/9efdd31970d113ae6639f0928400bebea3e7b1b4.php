<?php echo Form::hidden('redirect_to', URL::previous()); ?>

<?php echo Html::openFormGroup('title', $errors); ?>

    <?php echo Form::label('title', 'Titulo', ['class' => 'control-label']); ?>

    <?php echo Form::text('title', null, ['class' => 'form-control']); ?>

    <?php echo Form::error("title", $errors); ?>

<?php echo html::closeFormGroup(); ?>


<?php echo Html::openFormGroup('subtitle', $errors); ?>

    <?php echo Form::label('subtitle', 'Subitulo', ['class' => 'control-label']); ?>

    <?php echo Form::text('subtitle', null, ['class' => 'form-control']); ?>

    <?php echo Form::error("subtitle", $errors); ?>

<?php echo html::closeFormGroup(); ?>


<?php echo Html::openFormGroup('price', $errors); ?>

    <?php echo Form::label('price', 'Preço', ['class' => 'control-label']); ?>

    <?php echo Form::text('price', null, ['class' => 'form-control']); ?>

    <?php echo Form::error("price", $errors); ?>

<?php echo html::closeFormGroup(); ?>


<?php echo Html::openFormGroup('price', $errors); ?>

    <?php echo Form::label('user_id', 'Autor', ['class' => 'control-label']); ?>

    <?php echo Form::select('user_id', $users, null, ['class'=>'form-control']); ?>

<?php echo html::closeFormGroup(); ?>