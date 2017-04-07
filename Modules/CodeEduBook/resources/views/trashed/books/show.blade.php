@extends('layouts.app')
@section('content')
    <div class="content">
        <div class="row">
            <h3>Visualizar Livro</h3>
            {!! Button::primary('Voltar')->asLinkTo(route('trashed.books.index')) !!}
        </div>

        <div class="row">
            <h3>Livro - {{ $book->title }}</h3>
            <ul class="list-group">
                <li class="list-group-item">
                    <strong>Título</strong>
                </li>
                <li class="list-group-item">{{ $book->title }}</li>
                <li class="list-group-item">
                    <strong>Subtítulo</strong>
                </li>
                <li class="list-group-item">{{ $book->subtitle }}</li>
                <li class="list-group-item">
                    <strong>Preço</strong>
                </li>
                <li class="list-group-item">{{ $book->price }}</li>
                <li class="list-group-item">
                    <strong>Categorias</strong>
                </li>
                <li class="list-group-item">{{ $book->categories->implode('name_trashed', ', ') }}</li>
            </ul>
        </div>
    </div>
@endsection