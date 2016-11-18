@extends('layouts.app')
@section('content')
    <div class="content">
        <div class="row">
            <h3>Nova Categoria</h3>
            <a href="{{ route('categories.index') }}" class="btn btn-primary">Voltar</a>
        </div>

        <div class="row">

            {!! Form::model($category, ['route' => ['categories.update', 'category' => $category->id], 'class'=> 'form', 'method' => 'PUT']) !!}

            <div class="form-group">
                {!! Form::label('name', 'Name') !!}
                {!! Form::text('name', null, ['class' => 'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::submit('Salvar categoria', ['class' => 'btn btn-primary']) !!}
            </div>

            {!! Form::close() !!}

        </div>
    </div>
@endsection