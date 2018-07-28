@extends('layouts.nemesys')

<!-- Includes -->
@include('partials.snackbar-header')
@include('partials.tinymce-header')

@section('link')
	@parent
@endsection

@section('script')
	<script src="{{ asset('js/submit_confirm.js') }}"></script>
@endsection

@section('nav-logo','black')

@section('title','PCD - Nova atividade')

@section('nav-items')
@endsection

@section('content')

@include('partials.snackbar-body')

<form action="{{ route('pcd.form.store') }}" method="post">
	{{ csrf_field()  }}
	<div class="row mt-4">

		<div class="form-group col-10 text-left">

			<label class="lead" for="atividade">Atividade:</label>
			<select class="form-control" name="tipo" id="atividade">
			@foreach ($advertencias as $advertencia)
				<option>{{ $advertencia->name }}</option>
			@endforeach
			</select>
		</div>

		<div class="form-group col-2 text-left">

			<label class="lead" for="ponto">Pontos:</label>
			<input class="form-control" id="ponto" type="text" value="{{ 2+2 }}" readonly>
		</div>

		<div class="form-group col-6 text-left">

			<label class="lead text-danger" for="penalizado">Penalizado:</label>
			<select class="form-control" name="penalizado" id="penalizado">
			@foreach ($membros as $membro)
				<option>{{ $membro->name }}</option>
			@endforeach
			</select>
		</div>

		<div class="form-group col-6 text-left">

			<label class="lead" for="responsavel">Responsável:</label>
			<select class="form-control" name="responsavel" id="responsavel">
			@foreach ($direxes as $direx)
				<option>{{ $direx->name }}</option>
			@endforeach
			</select>
		</div>

		<div class="form-group col-6 text-left">

			<label class="lead" for="data">Data:</label>
			<input type="date" class="form-control" name="data" id="data" required>
		</div>

		<div class="form-group col-6 text-left">

			<label class="lead" for="hora">Hora:</label>
			<input type="time" class="form-control" name="hora" id="hora" required>
		</div>

		<div class="form-group col-12 text-left">

			<label class="lead">Descrição adicional:</label>
			<textarea id="textarea" name="descricao"  class="form-control"></textarea>
		</div>

		<div class="form-group col-12">
			<button type="submit" class="btn btn-lg btn-dark">Enviar</button>
		</div>
	</div>
</form>

@endsection