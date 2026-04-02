<?php

namespace App\Http\Controllers;

use App\Models\Produto;
use Illuminate\Http\Request;

class ProdutoController extends Controller
{
    public function index()
    {
        $produtos = Produto::where('user_id', auth()->id())->get();
        $estoqueBaixo = Produto::where('user_id', auth()->id())->where('quantidade', '<=', 5)->get();
        return view('produtos.index', compact('produtos', 'estoqueBaixo'));
    }

    public function create() 
    { 
        return view('produtos.create'); 
    
    }

    public function store(Request $request)
    {
        $request->validate([
            'nome' => ['required','string','max:100'],
            'quantidade' => ['required','integer','min:0'],
            'preco' => ['required','numeric','min:0'],
        ]);

        Produto::create([
            'user_id'    => auth()->id(),
            'nome'       => $request->nome,
            'descricao'  => $request->descricao,
            'categoria'  => $request->categoria,
            'quantidade' => $request->quantidade,
            'preco'      => $request->preco,
            'fornecedor' => $request->fornecedor,
        ]);

        return redirect()->route('produtos.index')->with('success', 'Produto cadastrado com sucesso!');
    }

    public function edit(Produto $produto)
    {
        return view('produtos.edit', compact('produto'));
    }

    public function update(Request $request, Produto $produto)
    {
        $request->validate([
            'nome' => ['required','string','max:100'],
            'quantidade' => ['required','integer','min:0'],
            'preco' => ['required','numeric','min:0'],
        ]);

        $produto->update($request->all());
        return redirect()->route('produtos.index')->with('success', 'Produto atualizado com sucesso!');
    }

    public function destroy(Produto $produto)
    {
        $produto->delete();
        return redirect()->route('produtos.index')->with('success', 'Produto removido com sucesso!');
    }
}