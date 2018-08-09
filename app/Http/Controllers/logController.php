<?php
	namespace App\Http\Controllers;

	use Illuminate\Http\Request;

	use Illuminate\Support\Facades\DB;

	//Função que faz a busca no banco de dados
	function queryBD($historic)
		{
			$i = 0;
			//Inicializa html em -2 para saber se algum dado foi armazenado em html
			$html[0]['id'] = -2;
			
			foreach ($historic as $historic){
				$html[$i]['id'] = $historic->id;
				$html[$i]['type'] = $historic->type;
				$html[$i]['penalized'] = $historic->penalized;
				$html[$i]['responsible'] = $historic->responsible;
				$html[$i]['date'] = $historic->date;
				$html[$i]['time'] = $historic->time;
				$html[$i]['description'] = $historic->description;
				$html[$i]['status'] = $historic->status;
				$html[$i]['id_semester'] = $historic->id_semester;
		
				$i = $i + 1;
			}
			return ($html);
		}

	class logController extends Controller {

		//Log Geral
		public function general()
		{
			$historic = DB::select('select * from warnings');
			$html = queryBD($historic);
			
			//Verifica se html é -2 ou não
			//Caso verdadeiro retorna null para o log.blade, caso falso retorna os dados
			if ($html[0]['id'] == -2)
				return view ('log', ['historic' => NULL]);
			else
				return view('log',['historic' => $html]);
		}

		//Log de Cada Usuario
		public function user(Request $request)
		{
			$identifier = $request->input('name');
			$historic = DB::table('warnings')->where('penalized',$identifier)->get();
			$html = queryBD($historic);


			//Verifica se html é -2 ou não
			//Caso verdadeiro retorna null para o log.blade, caso falso retorna os dados
			if ($html[0]['id'] == -2)
				return view ('log', ['historic' => NULL]);
			else
				return view('log',['historic' => $html]);
		}

		//Deletar
		public function delete(Request $request){
			$identifier = $request->input('delete');
			$delete = DB::table('warnings')->where('id', $identifier)->delete();
			return redirect()->route('pcd.view');
		}
	}