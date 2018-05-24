<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use App\advertencia;
use App\tipo_advertencia;

use DB;

class pcdController extends Controller
{
    public function view(){

	$list_membros_pontos = User::all(['nome'])->toArray();
	for ($i=0;$i<count($list_membros_pontos);$i++){
		$list_membros_pontos[$i]['pontos'] = DB::table('advertencia')
		            ->join('tipo_advertencia', 'advertencia.tipo', '=', 'tipo_advertencia.id')
                	          ->select('advertencia.penalizado', 'advertencia.tipo', 'tipo_advertencia.pontos')
                        	  	->where('penalizado', $list_membros_pontos[$i]['nome'])
                 	       		    ->sum('pontos');
	}

//	Acesso aos dados com:
//	echo($list_membros[0]['nome']);

	return view('pcd', [
		'membros_pontos' => $list_membros_pontos
	]);
    }
}
