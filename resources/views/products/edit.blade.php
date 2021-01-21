@extends('layout.template')
@section('main')

    <div class="row">
        <div class="col-md d-flex justify-content-between align-items-center">
            <h1>Atualizacao de produtos</h1>
            <a href="{{ route('product.index') }}" class="btn btn-dark btn-unidev">Voltar para a listagem</a>
        </div>
    </div>

    @include('layout.messages')

    <form action="{{ route('product.update', $product->id) }}" method="post">

        @csrf
        @method('put')

        @include('products.partials.form')
        <div class="row">
            <div class="col-md">
                <hr>
                <button type="submit" class="btn btn-dark btn-unidev">Atualizar produto</button>
            </div>
        </div>
    </form>

@endsection
