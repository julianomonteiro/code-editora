@extends('layouts.app')
@section('content')
    <div class="content">
        <div class="row">
            <h3>Listagem de Categorias</h3>
            {!! Button::primary('Nova categoria')->asLinkTo(route('categories.create')) !!}
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