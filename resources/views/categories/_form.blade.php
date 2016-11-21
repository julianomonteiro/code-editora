{!! Html::openFormGroup('name', $errors) !!}
    {!! Form::label('name', 'Name', ['class' => 'control-label']) !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
    {!! Form::error("name", $errors) !!}
{!! html::closeFormGroup() !!}