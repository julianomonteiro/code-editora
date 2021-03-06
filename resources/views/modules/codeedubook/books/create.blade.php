@extends('layouts.app')
@section('content')
    <div class="content">
        <div class="row">
            <h3>Novo Livro</h3>
            {!! Button::primary('Voltar')->asLinkTo(route('books.index')) !!}
        </div>

        <div class="row">

            {!! Form::open(['route' => 'books.store', 'class'=> 'form']) !!}

                @include('codeedubook::books._form')

                {!! Html::openFormGroup() !!}
                    {!! Form::submit('Criar Livro', ['class' => 'btn btn-primary']) !!}
                {!! html::closeFormGroup() !!}

            {!! Form::close() !!}

        </div>
    </div>
@endsection