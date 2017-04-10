@extends('layouts.app')
@section('content')
    <div class="content">
        <div class="row">
            <h3>Listagem de Categorias</h3>
            {!! Button::primary('Nova categoria')->asLinkTo(route('categories.create')) !!}
        </div>
        <br />
        <div class="row">
            {!! Form::model(compact('search'), ['class'=> 'form-inline', 'method' => 'GET']) !!}
            {!! Form::label('search', 'Pesquisar por nome:', ['class' => 'control-label']) !!}
            {!! Form::text('search', null, ['class' => 'form-control']) !!}
            {!! Form::submit('Buscar', ['class' => 'btn btn-primary']) !!}
            {!! Form::close() !!}
        </div>
        <div class="row">
            {!!
                Table::withContents($categories->items())->striped()
                ->callback('Ações', function($field, $category){
                    $linkEdit = route('categories.edit', ['category' => $category->id]);

                    $linkDestroy = route('categories.destroy',['category' => $category->id]);
                    $deleteForm = "delete-form-{$category->id}";
                    $form = Form::open(['route' => ['categories.destroy', 'category' => $category->id],
                                    'id' => $deleteForm, 'method' => 'DELETE', 'sytle' => 'display:none']).Form::close();
                    $ancorDestroy = Button::link('Excluir')->asLinkTo($linkDestroy)->addAttributes([
                        'onclick' => "event.preventDefault();document.getElementById(\"{$deleteForm}\").submit();"
                    ]);

                    return "<ul class=\"list-inline\">".
                    "<li>".Button::link('Editar')->asLinkTo($linkEdit)."</li>".
                    "<li>|</li>".
                    "<li>".$ancorDestroy."</li>".
                    "</ul>".$form;
                })
            !!}

            {{ $categories->links() }}
        </div>
    </div>
@endsection