<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use App\advertencia;
use App\WarningType;

use DB;

class pcdController extends Controller
{
    public function view(){

	$list_membros_pontos = User::all(['name'])->toArray();
	for ($i=0;$i<count($list_membros_pontos);$i++){
		$list_membros_pontos[$i]['pontos'] = DB::table('advertencia')
		            ->join('warning_types', 'advertencia.tipo', '=', 'warning_types.id')
                	          ->select('advertencia.penalizado', 'advertencia.tipo', 'warning_types.points')
                        	  	->where('penalizado', $list_membros_pontos[$i]['name'])
                 	       		    ->sum('points');
	}

//	Acesso aos dados com:
//	echo($list_membros[0]['nome']);

	return view('pcd', [
		'membros_pontos' => $list_membros_pontos
	]);
    }
}
