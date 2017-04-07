@extends('layouts.app')
@section('content')
    <div class="content">
        <div class="row">
            <h3>Lixeira de Livros</h3>
        </div>
            <br />
            <div class="row">
                {!! Form::model(compact('search'), ['class'=> 'form-inline', 'method' => 'GET']) !!}
                    {!! Form::label('search', 'Pesquisar por título:', ['class' => 'control-label']) !!}
                    {!! Form::text('search', null, ['class' => 'form-control']) !!}
                    {!! Form::submit('Buscar', ['class' => 'btn btn-primary']) !!}
                {!! Form::close() !!}
            </div>
        <div class="row">
            @if($books->count() > 0)
            {!!
                Table::withContents($books->items())->striped()
                ->callback('Ações', function($field, $book){
                    $linkView = route('trashed.books.show', ['books' => $book->id]);

                    $linkDestroy = route('books.destroy',['book' => $book->id]);
                    $restoreForm = "restore-form-{$book->id}";
                    $form = Form::open(['route' => ['trashed.books.update', 'book' => $book->id],
                                    'id' => $restoreForm, 'method' => 'PUT', 'sytle' => 'display:none']).Form::close();
                                    Form::hidden('redirect_to', URL::previous());
                                    Form::close();
                    $ancorRestore = Button::link('Restaurar')->asLinkTo($linkDestroy)->addAttributes([
                        'onclick' => "event.preventDefault();document.getElementById(\"{$restoreForm}\").submit();"
                    ]);

                    return "<ul class=\"list-inline\">".
                    "<li>".Button::link('Visualizar')->asLinkTo($linkView)."</li>".
                    "<li>|</li>".
                    "<li>".$ancorRestore."</li>".
                    "</ul>".$form;
                })
             !!}
            {{ $books->links() }}
            @else
                <br />
                <p class="well well-lg text-center">
                    <strong>Lixeira vazia</strong>
                </p>
            @endif
        </div>
    </div>
@endsection