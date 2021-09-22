<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TesteController extends Controller
{
    public function teste(int $p1, int $p2){
        // echo "A soma de $p1 + $p2 é igual a ".($p1+$p2);
        // return view('site.teste', ['x'=>$p1,], ['y'=>$p2]);
        // return view('site.teste', ['p1'=>$p1], ['p2'=>$p2]); // via array associativo
        // return view ('site.teste', compact('p1', 'p2'));  // metodo compact
        return view('site.teste')->with('xxx', $p1)->with('yyy', $p2);  // metodo with()
    }
}
// O metodo mais utilizado é o compact
