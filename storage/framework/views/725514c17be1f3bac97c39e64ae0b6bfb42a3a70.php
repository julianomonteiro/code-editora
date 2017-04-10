<?php echo Form::hidden('redirect_to', URL::previous()); ?>

<?php echo Html::openFormGroup('name', $errors); ?>

    <?php echo Form::label('name', 'Name', ['class' => 'control-label']); ?>

    <?php echo Form::text('name', null, ['class' => 'form-control']); ?>

    <?php echo Form::error("name", $errors); ?>

<?php echo html::closeFormGroup(); ?>


<?php echo Html::openFormGroup('email', $errors); ?>

<?php echo Form::label('email', 'E-mail', ['class' => 'control-label']); ?>

<?php echo Form::email('email', null, ['class' => 'form-control']); ?>

<?php echo Form::error("email", $errors); ?>

<?php echo html::closeFormGroup(); ?>