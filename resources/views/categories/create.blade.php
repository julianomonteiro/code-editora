@extends('layouts.app')
@section('content')
    <div class="content">
        <div class="row">
            <h3>Nova Categoria</h3>
            <a href="{{ route('categories.index') }}" class="btn btn-primary">Voltar</a>
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
            {!! Form::open(['route' => 'categories.store', 'class'=> 'form']) !!}

                {!! Html::openFormGroup('name', $errors) !!}
                    {!! Form::label('name', 'Name', ['class' => 'control-label']) !!}
                    {!! Form::text('name', null, ['class' => 'form-control']) !!}
                    {!! Form::error("name", $errors) !!}
                {!! html::closeFormGroup() !!}


                {!! Html::openFormGroup() !!}
                    {!! Form::submit('Criar categoria', ['class' => 'btn btn-primary']) !!}
                {!! html::closeFormGroup() !!}

            {!! Form::close() !!}

        </div>
    </div>
@endsection