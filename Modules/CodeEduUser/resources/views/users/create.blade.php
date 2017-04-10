@extends('layouts.app')
@section('content')
    <div class="content">
        <div class="row">
            <h3>Novo usuário</h3>
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
            {!! Form::open(['route' => 'codeeduuser.users.store', 'class'=> 'form']) !!}

                @include('codeeduuser::users._form')


                {!! Html::openFormGroup() !!}
                    {!! Button::primary('Criar usuário')->submit() !!}
                {!! html::closeFormGroup() !!}

            {!! Form::close() !!}

        </div>
    </div>
@endsection