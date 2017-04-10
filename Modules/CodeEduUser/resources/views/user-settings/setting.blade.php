@extends('layouts.app')
@section('content')
    <div class="content">
        <div class="row">
            <h3>Editar meu perfil</h3>
            <a href="{{ route('codeeduuser.users.index') }}" class="btn btn-primary">Voltar</a>
            <br /><br />
            @if($errors->any())
                <ul class="alert alert-danger list-inline">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            @endif
        </div>

        <div class="row">
            {!! Form::open(['route' => ['codeeduuser.user_settings.update'], 'class'=> 'form', 'method' =>'PUT']) !!}

            {!! Html::openFormGroup('password', $errors) !!}
                {!! Form::label('password', 'Senha', ['class' => 'control-label']) !!}
                {!! Form::password('password', ['class' => 'form-control']) !!}
                {!! Form::error("password", $errors) !!}
            {!! html::closeFormGroup() !!}

            {!! Html::openFormGroup() !!}
                {!! Form::label('password_confirmation', 'Confirmar Senha', ['class' => 'control-label']) !!}
                {!! Form::password('password_confirmation', ['class' => 'form-control']) !!}
            {!! html::closeFormGroup() !!}

            {!! Html::openFormGroup() !!}
            {!! Button::primary('Salvar usuário')->submit() !!}
            {!! html::closeFormGroup() !!}

            {!! Form::close() !!}

        </div>
    </div>
@endsection