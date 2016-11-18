@extends('layouts.app')
@section('content')
    <div class="content">
        <div class="row">
            <h3>Novo Livro</h3>
            <a href="{{ route('books.index') }}" class="btn btn-primary">Voltar</a>
        </div>

        <div class="row">

            {!! Form::open(['route' => 'books.store', 'class'=> 'form']) !!}

            <div class="form-group">
                {!! Form::label('title', 'Titulo') !!}
                {!! Form::text('title', null, ['class' => 'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('subtitle', 'Subitulo') !!}
                {!! Form::text('subtitle', null, ['class' => 'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('price', 'Preço') !!}
                {!! Form::text('price', null, ['class' => 'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::submit('Criar Livro', ['class' => 'btn btn-primary']) !!}
            </div>

            {!! Form::close() !!}

        </div>
    </div>
@endsection