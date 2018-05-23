@extends('layouts.nemesys')

@section('title', 'Dashboard')

@section('nav-logo', 'black')

@section('nav-items')
@endsection

@section('link')
	@parent
@endsection

@section('script')
	@parent
@endsection


@section('content')
                <div class="mt-3">
			<h1 class="display-4">Dashboard</h1>
		</div>

		<div class="row justify-content-sm-center mt-4">

			<div class="col-sm-6 col-md-4 col-10">
				<div class="card mb-4 ">
					<div class="card-body">
						<h4 class="card-title"> PCD</h4>
						<h6 class="subtitle text-muted">Plano de Controle Disciplinar</h6>

						<a href="{{ route('pcd.view') }}" class="btn btn-lg btn-success btn_custom mt-3 card-link">
							Acessar
						</a>

						<!--<button href="#" class="btn btn-lg bg_roxo btn_hover box_generic text-light card-link" data-toggle="modal" data-target="#modalAndroid">Saiba mais</button>-->
					</div>
				</div>
			</div>
		</div>

@endsection
