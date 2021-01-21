@extends('layout.template')
@section('main')

    <div class="row">
        <div class="col-md d-flex justify-content-between align-items-center">
            <h1>Cadastro de produtos</h1>
            <a href="{{ route('product.index') }}" class="btn btn-dark btn-unidev">Voltar para a listagem</a>
        </div>
    </div>

    @include('layout.messages')

    <form action="{{ route('product.store') }}" method="post">

        @csrf

        @include('products.partials.form')
        
        <div class="row">
            <div class="col-md">
                <hr>
                <button type="submit" class="btn btn-dark btn-unidev">Registrar produto</button>
            </div>
        </div>
    </form>

@endsection
