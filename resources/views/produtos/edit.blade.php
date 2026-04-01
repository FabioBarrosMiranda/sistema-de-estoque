@extends('layouts.app')
@section('content')
<h2>Editar Produto</h2>
<form action="{{ route('produtos.update', $produto->id) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="mb-3">
        <label>Nome</label>
        <input type="text" name="nome" class="form-control" value="{{ $produto->nome }}">
    </div>
    <div class="mb-3">
        <label>Descrição</label>
        <textarea name="descricao" class="form-control">{{ $produto->descricao }}</textarea>
    </div>
    <div class="mb-3">
        <label>Categoria</label>
        <input type="text" name="categoria" class="form-control" value="{{ $produto->categoria }}">
    </div>
    <div class="mb-3">
        <label>Quantidade</label>
        <input type="number" name="quantidade" class="form-control" value="{{ $produto->quantidade }}">
    </div>
    <div class="mb-3">
        <label>Preço</label>
        <input type="number" step="0.01" name="preco" class="form-control" value="{{ $produto->preco }}">
    </div>
    <div class="mb-3">
        <label>Fornecedor</label>
        <input type="text" name="fornecedor" class="form-control" value="{{ $produto->fornecedor }}">
    </div>
    <button type="submit" class="btn btn-success">Atualizar</button>
    <a href="{{ route('produtos.index') }}" class="btn btn-secondary">Cancelar</a>
</form>
@endsection