<?php

namespace App\Http\Controllers;

use App\membro;
use Illuminate\Http\Request;

class membroController extends Controller
{
    public function form(){
	$list_membros = membro::all();
	return view('layouts.form', [
	'membros' => $list_membros
	]);
    }
}
