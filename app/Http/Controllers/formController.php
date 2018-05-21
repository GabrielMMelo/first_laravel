<?php

namespace App\Http\Controllers;

use DB;

use App\advertencia;
use App\membro;
use App\tipo_advertencia;

use Illuminate\Http\Request;

class formController extends Controller
{
    public function view(){
        $list_membros = membro::all();
        $list_direxes = DB::select('SELECT m.nome FROM membro as m, cargo as c WHERE c.id = m.cargo and c.direx = true');
        $list_tipos_advertencias = tipo_advertencia::all();
        return view('layouts.form', [
        'membros' => $list_membros,
        'direxes' => $list_direxes,
        'advertencias' => $list_tipos_advertencias,
        ]);
    }

    public function store(Request $request){
        $nomeTipo = $request->input('tipo');
	$query = DB::table('tipo_advertencia')
                     ->select(DB::raw('id'))	// cuidado ao usar raw statements -> problemas de injecao de vulnerabilidade
                     ->where('nome', '=', $nomeTipo)
                     ->first();		// get na primeira posição do registro
        $advertencia = new advertencia;
        $advertencia->tipo = $query->id;	// pega o id na query
        $advertencia->penalizado = $request->input('penalizado');
        $advertencia->responsavel = $request->input('responsavel');
        $advertencia->data = $request->input('data');
        $advertencia->descricao = $request->input('descricao');
        $advertencia->status = 2;
        $advertencia->save();

        return redirect()->back()->with('msg', "Dados enviados com Sucesso!");
//        return redirect()->route('form.view',['msg' => 'Dados enviados com Sucesso!']);
//        return redirect->back()->with('mensagem', ['Dados enviados com Sucesso!']);
//        return route('form.view', ['mensagem'=> 'Dados enviados com Sucesso!']);
//        return route('form.view')->with('mensagem', 'Dados enviados com Sucesso!');
    }
}

