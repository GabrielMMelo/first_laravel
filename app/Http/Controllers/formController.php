<?php

namespace App\Http\Controllers;

use DB;

use App\advertencia;
use App\membro;
use App\User;
use App\tipo_advertencia;
use Auth;
use Emoji;
use Illuminate\Http\Request;

class formController extends Controller
{
    public function view(){
        $list_membros = membro::all();
        $list_direxes = DB::select('SELECT m.nome FROM membro as m, cargo as c WHERE c.id = m.cargo and c.direx = true');
        $list_tipos_advertencias = tipo_advertencia::all();
        return view('form', [
        'membros' => $list_membros,
        'direxes' => $list_direxes,
        'advertencias' => $list_tipos_advertencias,
        ]);
    }

    public function store(Request $request){
        if (User::isDirex(Auth::user())) {
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
            $advertencia->hora = $request->input('hora');	
            $advertencia->descricao = $request->input('descricao');
            $advertencia->status = 2;
            $advertencia->save();
            return redirect()->back()->with(['msg' => "Dados enviados com Sucesso!", 'emoji' => Emoji::findByName('smile') ]);
        }

        else{
            return redirect()->back()->with(['msg' => 'Você não possui permissão pra isso! ', 'color' => 'red', 'emoji' => "\u{1F631}" ]);   
        }
        
    }
}

