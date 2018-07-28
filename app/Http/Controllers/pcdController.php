<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use App\Warning;
use App\WarningType;

use DB;

class pcdController extends Controller
{
    public function view(){

	$list_membros_pontos = User::all(['name'])->toArray();
	for ($i=0;$i<count($list_membros_pontos);$i++){
		$list_membros_pontos[$i]['pontos'] = DB::table('warnings')
		            ->join('warning_types', 'warnings.type', '=', 'warning_types.id')
                	          ->select('warnings.penalized', 'warnings.tipo', 'warning_types.points')
                        	  	->where('penalized', $list_membros_pontos[$i]['name'])
                 	       		    ->sum('points');
	}

//	Acesso aos dados com:
//	echo($list_membros[0]['nome']);

	return view('pcd', [
		'membros_pontos' => $list_membros_pontos
	]);
    }
}
