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
                    $ancorDestroy = Button::link('Deletar')->asLinkTo($linkDestroy)->addAttributes([
                        'onclick' => "event.preventDefault();document.getElementById(\"{$deleteForm}\").submit();"
                    ]);

                    return "<ul class=\"list-inline\">".
                    "<li>".Button::link('Editar')->asLinkTo($linkEdit)."</li>".
                    "<li>|</li>".
                    "<li>".$ancorDestroy."</li>".
                    "</ul>".$form;
                })
            !!}
            <table class="table table-striped">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Ação</th>
                </tr>
                </thead>
                <tbody>
                @foreach($categories as $category)
                    <tr>
                        <td>{{ $category->id }}</td>
                        <td>{{ $category->name }}</td>
                        <td>
                            <ul class="list-inline">
                                <li>
                                    <a href="{{ route('categories.edit', ['category' => $category->id]) }}">Editar</a>
                                </li>
                                <li>|</li>
                                <li>
                                    <?php $deleteForm = "delete-form-{$loop->index}"; ?>
                                    <a  onclick="event.preventDefault();document.getElementById('{{$deleteForm}}').submit();" href="{{ route('categories.destroy', ['category' => $category->id]) }}">Excluir</a>
                                    {!! Form::open(['route' => ['categories.destroy', 'category' => $category->id],
                                    'id' => $deleteForm, 'method' => 'DELETE', 'sytle' => 'display:none']) !!}
                                    {!! Form::close() !!}
                                </li>
                            </ul>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            {{ $categories->links() }}
        </div>
    </div>
@endsection