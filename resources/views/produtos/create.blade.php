@extends('layouts.app')
@section('content')
<h2>Novo Produto</h2>
<form action="{{ route('produtos.store') }}" method="POST">
    @csrf
    <div class="mb-3">
        <label>Nome</label>
        <input type="text" name="nome" class="form-control">
    </div>
    <div class="mb-3">
        <label>Descrição</label>
        <textarea name="descricao" class="form-control"></textarea>
    </div>
    <div class="mb-3">
        <label>Categoria</label>
        <input type="text" name="categoria" class="form-control">
    </div>
    <div class="mb-3">
        <label>Quantidade</label>
        <input type="number" name="quantidade" class="form-control" value="0">
    </div>
    <div class="mb-3">
        <label>Preço</label>
        <input type="number" step="0.01" name="preco" class="form-control">
    </div>
    <div class="mb-3">
        <label>Fornecedor</label>
        <input type="text" name="fornecedor" class="form-control">
    </div>
    <button type="submit" class="btn btn-success">Salvar</button>
    <a href="{{ route('produtos.index') }}" class="btn btn-secondary">Cancelar</a>
</form>
@endsection