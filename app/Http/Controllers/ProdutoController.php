<?php

namespace App\Http\Controllers;

use App\Produto;
use Illuminate\Http\Request;
use App\Unidade;

class ProdutoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        $produtos = Produto::paginate(10);
        
        return view('app.produto.index', ['produtos' => $produtos, 'request' => $request->all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $unidades = Unidade::all();
        return view ('app.produto.create', ['unidades' => $unidades]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //regras de validacao
        $regras = [
            'nome' => 'required|min:2|max:50',
            'descricao' => 'required|min:2|max:100',
            'peso' => 'required|integer',
            'unidade_id' => 'exists:unidades,id'
        ];
        $feedback = [
            'required' => 'O campo :attribute deve ser preenchido',
            'min' => 'Numero mínimo de caracteres deve ser 2',
            'nome.max' => 'Numero maximo de caracteres deve ser 50',
            'descricao.max' => 'Numero maximo de caracteres deve ser 100',
            'peso.integer' => 'O peso deve ser um numero inteiro',
            'unidade_id.exists' => 'A unidade de medida informada não está cadastrada.'
        ];
        $request->validate($regras, $feedback);

        // Gravacao no BD e Redirecionamento da Pagina
        Produto::create($request->all());
        return redirect()->route('produto.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Produto  $produto
     * @return \Illuminate\Http\Response
     */
    public function show(Produto $produto)
    {
        //
        return view('app.produto.show', ['produto' => $produto]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Produto  $produto
     * @return \Illuminate\Http\Response
     */
    public function edit(Produto $produto)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Produto  $produto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Produto $produto)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Produto  $produto
     * @return \Illuminate\Http\Response
     */
    public function destroy(Produto $produto)
    {
        //
    }
}