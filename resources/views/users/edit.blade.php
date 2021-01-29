@extends('layout.template')
@section('main')

    <div class="row">
        <div class="col-md d-flex justify-content-between align-items-center">
            <h1>Atualizacao de usuarios</h1>
            <a href="{{ route('user.index') }}" class="btn btn-dark btn-unidev">Voltar para a listagem</a>
        </div>
    </div>

    @include('layout.messages')

    <form action="{{ route('user.update', $user->id) }}" method="post">

        @csrf
        @method('put')

        @include('users.partials.form')
        @include('users.partials.password')

        <div class="input-group mb-3 mt-3">
            <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon1">Senha Atual:</span>
            </div>
            <input type="password" class="form-control" id="actualPassword" minlength="6" name="actualPassword" placeholder="Para trocar de senha digite a senha atual">
        </div>

        <div class="row">
            <div class="col-md">
                <hr>
                <button type="submit" class="btn btn-dark btn-unidev">Atualizar usuario</button>
            </div>
        </div>
    </form>

@endsection
