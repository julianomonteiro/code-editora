{!!  Form::hidden('redirect_to', URL::previous()) !!}
{!! Html::openFormGroup('name', $errors) !!}
    {!! Form::label('name', 'Name', ['class' => 'control-label']) !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
    {!! Form::error("name", $errors) !!}
{!! html::closeFormGroup() !!}

{!! Html::openFormGroup('email', $errors) !!}
{!! Form::label('email', 'E-mail', ['class' => 'control-label']) !!}
{!! Form::email('email', null, ['class' => 'form-control']) !!}
{!! Form::error("email", $errors) !!}
{!! html::closeFormGroup() !!}