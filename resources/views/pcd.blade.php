@extends('layouts.nemesys')

@section('nav-logo', 'black')

@section('nav-items')

@endsection

@section('link')
@parent
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">
@endsection

@section('content')

	<div class="mt-4">
	<h1 class="display-4 mb-4"> 2018/2</h1> 
	<div class="row mb-4" >
		<div class="col-4">
			<h4 class="text-muted"></h4>	
		</div>

		<div class="col-4">
			<h4 class="text-muted">22/02/2018</h4>	
		</div>

		<div class="col-4 text-right">
			<button class="btn btn-danger"  onclick="Mudarestado(1)"><i class="fas fa-recycle"></i></button>	
		</div>
		
	</div>
	 

		<div class="_botaoReset" id = 1>
			<form action="" method="get">
				<div class="form-group">
					<label for="data inicio">Data de Inicio:</label>
					<input id="data inicio" type="date" placeholder="Digite a Data de Inicio"/>
				</div>
				<div  class="form-group">
					<label for="data fim">Data do Termino:</label>
					<input id="data fim" type="date" placeholder="Digite a Data do Termino "/>
				</div>
				<div  class="form-group">
					<label for="semestre">Qual o semestre:</label>
					<input id="semestre" type="radio" name="semestre" value="/1"/> /1
					<input id="semestre" type="radio" name="semestre" value="/2"/> /2
				</div>
				<div  class="form-group">
					<input type="submit" value="Criar" />
				</div>
			</form>
		</div>

		

		<table class="table">
		    <thead>
		        <tr>
				 <th scope="col">#</th>
				 <th scope="col">Membro</th>
	                	 <th scope="col">Pontos</th>
		    	</tr>
		    </thead>
  		    <tbody>
		   	@foreach($membros_pontos as $membro_pontos)

			    <tr>
			      <th scope="row">{{ $loop->iteration }}</th>
			      <td>{{ $membro_pontos['name']  }}</td>
			      <td>{{ $membro_pontos['pontos']  }}</td>
			    </tr>

			@endforeach
		     </tbody>
		</table>

	</div>

	<div class="row justify-content-sm-center mt-4">

              <div class="col-8">
              		<div class="card mb-4 ">
                                <div class="card-body">
                        	        <h4 class="card-title"> PCD</h4>
                	                <h6 class="subtitle text-muted">Plano de Controle Disciplinar</h6>
				        <div class="row">
						<div class="col-6">
	                                       		 <a href="{{ route('pcd.form.view') }}" class="btn btn-lg btn-success btn_custom mt-3 card-link">
                                                        	Nova atividade
                                        		</a>
						</div>
						<div class="col-6">
	                                       		 <a href="{{ '#' }}" class="btn btn-lg btn-danger btn_custom mt-3 card-link">
                                                        	Esqueci
                                        		</a>
						</div>

					</div>
                                        <!--<button href="#" class="btn btn-lg bg_roxo btn_hover box_generic text-light card-link" data-toggle="modal" data-target="#modalAndroid">Saiba mais</button>-->
                               </div>
                       </div>
              </div>
        </div>


    <script>

function Mudarestado(divid){
 var testarDisplay = document.getElementById(divid).style.display;
  if (testarDisplay == "none") {
  	 document.getElementById(divid).style.display = "inline";
  }

  else{
  document.getElementById(divid).style.display = "none";
  }

}

</script>
@endsection
