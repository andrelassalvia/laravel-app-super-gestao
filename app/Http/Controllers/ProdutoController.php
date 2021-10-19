<?php

namespace App\Http\Controllers;

use App\Produto;
use App\ProdutoDetalhe;
use App\Item;
use App\Fornecedor;
use Illuminate\Http\Request;
use App\Unidade;
use App\Pedido;

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
        $produtos = Produto::with(['produtoDetalhe', 'fornecedor', 'unidade', 'pedidos'])->paginate(10);
        $fornecedores = Fornecedor::all();
        $unidades = Unidade::all();
        

        /*
        foreach ($produtos as $key => $produto) {
            // print_r($produto->getAttributes());
            // echo '<br><br>';

            $produto_detalhe = ProdutoDetalhe::where('produto_id', $produto->id)->first();
            if(isset($produto_detalhe)){
                // print_r($produto_detalhe->getAttributes());
                // echo '<br><br>';
                // echo '<hr>';

                $produtos[$key]['comprimento'] = $produto_detalhe->comprimento;
                $produtos[$key]['altura'] = $produto_detalhe->altura;
                $produtos[$key]['largura'] = $produto_detalhe->largura;
            }

        }
        */
        
        return view('app.produto.index', ['produtos' => $produtos, 'request' => $request->all(), 'fornecedores' => $fornecedores, 'unidades' => $unidades]);
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
        $fornecedores = Fornecedor::all();
        return view ('app.produto.create', ['unidades' => $unidades, 'fornecedores' => $fornecedores]);
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
            'unidade_id' => 'exists:unidades,id',
            'fornecedor_id' => 'exists:fornecedores,id'
        ];
        $feedback = [
            'required' => 'O campo :attribute deve ser preenchido',
            'min' => 'Numero mínimo de caracteres deve ser 2',
            'nome.max' => 'Numero maximo de caracteres deve ser 50',
            'descricao.max' => 'Numero maximo de caracteres deve ser 100',
            'peso.integer' => 'O peso deve ser um numero inteiro',
            'unidade_id.exists' => 'A unidade de medida informada não está cadastrada.',
            'fornecedor_id.exists' => 'O fornecedor informado não existe.'
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
        
        $unidades = Unidade::all();
        $fornecedores = Fornecedor::all();
        return view('app.produto.edit', ['produto' => $produto, 'unidades' => $unidades, 'fornecedores' => $fornecedores]);
        // return view('app.produto.create', ['produto' => $produto, 'unidades' => $unidades]);
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
        // $request->all(); // payload - os dados atualizados que digitamos no formulario - metodo put
        // $produto;  // instancia do objeto no estado anterior - os dados que estao no BD

        $regras = [
            'nome' => 'required|min:2|max:50',
            'descricao' => 'required|min:2|max:100',
            'peso' => 'required|integer',
            'unidade_id' => 'exists:unidades,id',
            'fornecedor_id' => 'exists:fornecedores,id'
        ];
        $feedback = [
            'required' => 'O campo :attribute deve ser preenchido',
            'min' => 'Numero mínimo de caracteres deve ser 2',
            'nome.max' => 'Numero maximo de caracteres deve ser 50',
            'descricao.max' => 'Numero maximo de caracteres deve ser 100',
            'peso.integer' => 'O peso deve ser um numero inteiro',
            'unidade_id.exists' => 'A unidade de medida informada não está cadastrada.',
            'fornecedor_id.exists' => 'O fornecedor informado não existe.'
        ];
        
        $request->validate($regras, $feedback);
        $produto->update($request->all());
        $fornecedores = Fornecedor::all();
        return redirect(route('produto.show', ['produto' => $produto->id, 'fornecedores' => $fornecedores]));
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
        $produto->delete();
        return redirect(route('produto.index'));
    }
}
