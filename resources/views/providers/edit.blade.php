@extends('layout.template')
@section('main')

    <div class="row">
        <div class="col-md d-flex justify-content-between align-items-center">
            <h1>Atualizacao de Fornecedor</h1>
            <a href="{{ route('provider.index') }}" class="btn btn-dark btn-unidev">Voltar para a listagem</a>
        </div>
    </div>

    @include('layout.messages')

    <form action="{{ route('provider.update', $provider->id) }}" method="post">

        @csrf
        @method('put')

        @include('providers.partials.form')

        <div class="row">
            <div class="col-md">
                <hr>
                <button type="submit" class="btn btn-dark btn-unidev">Atualizar fornecedor</button>
            </div>
        </div>
    </form>

@endsection
