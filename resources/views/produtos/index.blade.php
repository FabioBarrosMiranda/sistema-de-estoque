@extends('layouts.app')
@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h2>Produtos</h2>
    <a href="{{ route('produtos.create') }}" class="btn btn-primary">+ Novo Produto</a>
</div>

@if($estoqueBaixo->count() > 0)
<div class="alert alert-warning">
    ⚠️ Produtos com estoque baixo (5 ou menos):
    <ul class="mb-0">
        @foreach($estoqueBaixo as $p)
            <li>{{ $p->nome }} — {{ $p->quantidade }} unidades</li>
        @endforeach
    </ul>
</div>
@endif

<table class="table table-bordered table-hover bg-white">
    <thead class="table-dark">
        <tr>
            <th>Nome</th>
            <th>Categoria</th>
            <th>Quantidade</th>
            <th>Preço</th>
            <th>Fornecedor</th>
            <th>Ações</th>
        </tr>
    </thead>
    <tbody>
        @forelse($produtos as $produto)
        <tr>
            <td>{{ $produto->nome }}</td>
            <td>{{ $produto->categoria ?? '—' }}</td>
            <td>{{ $produto->quantidade }}</td>
            <td>{{ $produto->preco ? 'R$ '.number_format($produto->preco, 2, ',', '.') : '—' }}</td>
            <td>{{ $produto->fornecedor ?? '—' }}</td>
            <td>
                <a href="{{ route('produtos.edit', $produto->id) }}" class="btn btn-sm btn-warning">Editar</a>
                <form action="{{ route('produtos.destroy', $produto->id) }}" method="POST" style="display:inline">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-sm btn-danger">Excluir</button>
                </form>
            </td>
        </tr>
        @empty
        <tr>
            <td colspan="6" class="text-center text-muted">Nenhum produto cadastrado ainda.</td>
        </tr>
        @endforelse
    </tbody>
</table>
@endsection