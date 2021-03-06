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
            {!! Form::model($category, ['route' => ['categories.update', 'category' => $category->id], 'class'=> 'form', 'method' => 'PUT']) !!}

                @include('categories._form')

                {!! Html::openFormGroup() !!}
                    {!! Button::primary('Salvar Categoria')->submit() !!}
                {!! html::closeFormGroup() !!}

            {!! Form::close() !!}
        </div>
    </div>
@endsection