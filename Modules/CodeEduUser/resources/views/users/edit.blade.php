@extends('layouts.app')
@section('content')
    <div class="content">
        <div class="row">
            <h3>Alterar usuário</h3>
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
            {!! Form::model($user, ['route' => ['codeeduuser.users.update', 'user' => $user->id], 'class'=> 'form', 'method' => 'PUT']) !!}

                @include('codeeduuser::users._form')

                {!! Html::openFormGroup() !!}
                    {!! Button::primary('Salvar Usuário')->submit() !!}
                {!! html::closeFormGroup() !!}

            {!! Form::close() !!}
        </div>
    </div>
@endsection