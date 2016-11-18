@extends('layouts.app')
@section('content')
    <div class="content">
        <div class="row">
            <h3>Listagem de Livros</h3>
            <a href="{{ route('books.create') }}" class="btn btn-primary">Novo Livro</a>
        </div>
        <div class="row">
            <table class="table table-striped">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Título</th>
                    <th>Subtitulo</th>
                    <th>Valor</th>
                    <th>Ação</th>
                </tr>
                </thead>
                <tbody>
                @foreach($books as $book)
                    <tr>
                        <td>{{ $book->id }}</td>
                        <td>{{ $book->title }}</td>
                        <td>{{ $book->subtitle }}</td>
                        <td>{{ $book->price }}</td>
                        <td>
                            <ul class="list-inline">
                                <li>
                                    <a href="{{ route('books.edit', ['book' => $book->id]) }}">Editar</a>
                                </li>
                                <li>|</li>
                                <li>
                                    <?php $deleteForm = "delete-form-{$loop->index}"; ?>
                                    <a  onclick="event.preventDefault();document.getElementById('{{$deleteForm}}').submit();" href="{{ route('books.destroy', ['book' => $book->id]) }}">Excluir</a>
                                    {!! Form::open(['route' => ['books.destroy', 'book' => $book->id],
                                    'id' => $deleteForm, 'method' => 'DELETE', 'sytle' => 'display:none']) !!}
                                    {!! Form::close() !!}
                                </li>
                            </ul>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            {{ $books->links() }}
        </div>
    </div>
@endsection