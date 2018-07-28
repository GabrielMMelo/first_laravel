<?php

namespace App\Http\Controllers;

use App\Semester;
use DB;

use App\Warning;
use App\User;
use App\WarningType;
use App\Log;
use Auth;
use Emoji;
use Illuminate\Http\Request;

class formController extends Controller
{
    public function view(){
        $list_membros = User::all();
        $list_direxes = DB::select('SELECT u.name FROM users as u, jobs as j WHERE j.id = u.job and j.direx = true');
        $list_tipos_advertencias = WarningType::all();
        return view('form', [
        'membros' => $list_membros,
        'direxes' => $list_direxes,
        'advertencias' => $list_tipos_advertencias,
        ]);
    }

    public function store(Request $request){
        if (User::isDirex(Auth::user())) {
            $warningTypeName = $request->input('tipo');
    	    $query = DB::table('warning_types')
                        ->select(DB::raw('id'))	// cuidado ao usar raw statements -> problemas de injecao de vulnerabilidade
                        ->where('name', '=', $warningTypeName)
                        ->first();		// get na primeira posição do registro

            // Mount new warning
            $warning = new Warning;
            $warning->type = $query->id;	// pega o id na query
            $warning->penalized = $request->input('penalizado');
            $warning->responsible = $request->input('responsavel');
            $warning->date = $request->input('data');
            $warning->time = $request->input('hora');
            $warning->description = $request->input('descricao');
            $warning->status = 2;
            // Get current semester
            $lastSemester = DB::table('semesters')->orderBy('id', 'desc')->first();
            $warning->id_semester = $lastSemester->id;

            // Mount new log
            $log = new Log;
            $log->id_warning = $warning->id;
            $log->status = $warning->status;

            // Transaction to make sure that log was stored properly
            DB::transaction(function() use ($warning, $log){
                $warning->save();
                $log->save();
            });

            // Send mail to penalized
            User::sendAdvertenciaEmail($warning, $warningTypeName);

            return redirect()->back()->with(['msg' => "Dados enviados com Sucesso!", 'emoji' => Emoji::findByName('smile') ]);
        }

        else{
            return redirect()->back()->with(['msg' => 'Você não possui permissão pra isso! ', 'color' => 'red', 'emoji' => "\u{1F631}" ]);   
        }
    }
}

