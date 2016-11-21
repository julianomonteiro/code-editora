@extends('layouts.app')
@section('content')
    <div class="content">
        <div class="row">
            <h3>Nova Categoria</h3>
            <a href="{{ route('books.index') }}" class="btn btn-primary">Voltar</a>
        </div>

        <div class="row">

            {!! Form::model($book, ['route' => ['books.update', 'book' => $book->id], 'class'=> 'form', 'method' => 'PUT']) !!}

                @include('books._form')

                {!! Html::openFormGroup() !!}
                    {!! Form::submit('Salvar Livro', ['class' => 'btn btn-primary']) !!}
                {!! html::closeFormGroup() !!}

            {!! Form::close() !!}

        </div>
    </div>
@endsection