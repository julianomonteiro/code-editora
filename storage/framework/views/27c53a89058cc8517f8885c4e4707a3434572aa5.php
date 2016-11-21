<?php echo Html::openFormGroup('name', $errors); ?>

    <?php echo Form::label('name', 'Name', ['class' => 'control-label']); ?>

    <?php echo Form::text('name', null, ['class' => 'form-control']); ?>

    <?php echo Form::error("name", $errors); ?>

<?php echo html::closeFormGroup(); ?>