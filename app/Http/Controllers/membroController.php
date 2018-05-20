<?php

namespace App\Http\Controllers;

use DB;
use App\membro;
use App\tipo_advertencia;
use Illuminate\Http\Request;

class membroController extends Controller
{
    public function form(){
	$list_membros = membro::all();
	$list_direxes = DB::select('SELECT m.nome FROM membro as m, cargo as c WHERE c.id = m.cargo and c.direx = true');
	$list_tipos_advertencias = tipo_advertencia::all();
	return view('layouts.form', [
	'membros' => $list_membros,
	'direxes' => $list_direxes,
	'advertencias' => $list_tipos_advertencias
	]);
    }
}
