<?php
	namespace App\Http\Controllers;

	use Illuminate\Http\Request;

	use Illuminate\Support\Facades\DB;

	use App\User;

	use Auth;


	//Função que retorna o nome do Status
	function status($status){
		switch ($status) {
			case 1:
				$name = "Deferida";
				break;
			case 2:
				$name = "Indeferida";
				break;
			case 3:
				$name = "Em processo";
				break;
			case 4:
				$name = "Deletada";
				break;
		}
		return $name;
	}

	//Função que torna o botão visível para Presidente e Gestão de Pessoas
	function visible(){
		if ((User::isPresident(Auth::user()) == 2) or (User::isInternalProcesses(Auth::user()) == 4))
			return 1;
		else return 0;
	}

	//Função que verifica se deram os 3 dias do botão Delete
	function dateDelete($date){
		$date = strtotime($date);

		$dateNow= date('Y/m/d');
		$dateNow = strtotime($dateNow);

		$intervalo = ($dateNow - $date)/86400;
		
		if ($intervalo >= 3)
			return 0;
		else return 1;		
	}

	//Função que faz a busca no banco de dados
	function queryBD($historic){
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
				$status = status($historic->status);
				$html[$i]['status'] = $status;
				$html[$i]['id_semester'] = $historic->id_semester;
				$html[$i]['dateNow'] = dateDelete($historic->date);
				$html[$i]['visible'] = visible();
				$i = $i + 1;
			}
			return ($html);
		}

	class logController extends Controller {

		//Log Geral
		public function general(){
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
		public function user(Request $request){
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