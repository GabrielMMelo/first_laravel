@extends('layouts.nemesys')

@section('nav-logo', 'black')

@section('nav-items')

@endsection

@section('content')

	<div class="mt-4">

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
			      <td>{{ $membro_pontos['nome']  }}</td>
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


@endsection
