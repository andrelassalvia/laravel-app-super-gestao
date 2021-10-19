<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pedido;
use App\Produto;
use App\PedidoProduto;
use App\Cliente;

class PedidoProdutoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Pedido $pedido)
    {
        //
        $pedido->produtos; // eager loading
        $pedido->cliente;
        $clientes = Cliente::all();
        $produtos = Produto::all();
        return view('app.pedido_produto.create', ['pedido' => $pedido, 'produtos' => $produtos, 'clientes' => $clientes]) ;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Pedido $pedido)
    {
        $regras = [
            'produto_id' => 'exists:produtos,id',
            'quantidade' => 'required'
        ];

        $feedback = [
            'produto_id.exists' => 'O campo produto é obrigatório',
            'required' => 'O campo :attribute é obrigatório.'
        ];

        $request->validate($regras, $feedback);

       

        /*
        $pedido_produto = new PedidoProduto();
        $pedido_produto->produto_id = $request->get('produto_id');
        $pedido_produto->pedido_id = $pedido->id;
        $pedido_produto->quantidade = $request->get('quantidade');
        $pedido_produto->save();
        */

        $pedido->produtos()->attach(
            $request->get('produto_id'),
            [
                'quantidade' => $request->get('quantidade')
            ]
        );
        /*
        $pedido->produtos()->attach(
            [
                $request->get('produto_id') => ['quantidade' => $request->get('quantidade')],
                $request->get('produto_id') => ['quantidade' => $request->get('quantidade')],
                $request->get('produto_id') => ['quantidade' => $request->get('quantidade')],
            ]
        );
        */
        return redirect()->route('pedido_produto.create', ['pedido' => $pedido->id]);
        

        // echo '<pre>';
        // print_r($pedido->id);
        // '</pre>';
        // '<hr>';
        // echo '<pre>';
        // print_r($request->produto_id);
        // '</pre>';
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(PedidoProduto $pedidoProduto)
    {
        //
        // print_r($pedido->getAttributes());
        // echo '<hr>';
        // print_r($produto->getAttributes());

        // METODO CONVENCIONAL
        /*
        PedidoProduto::where(
            [
                'pedido_id'=>$pedido->id,
                'produto_id' => $produto->id
            ]
        )->delete();
        */
        // METODO DETACHED
        // $pedido->produtos()->detach($produto->id);
        // $produto->pedidos()->detach($pedido->id);
        $pedidoProduto->delete();

        return redirect()->route('pedido_produto.create', ['pedido' => $pedidoProduto->pedido_id]);
    }
}
