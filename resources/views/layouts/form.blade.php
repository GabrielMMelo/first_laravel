@extends('master')

@section('nav-logo','black')

@section('title','PCD - Nova atividade')

@section('nav-items')
@endsection

@section('search-bar')
@endsection

@section('content')

<form action="#" method="post" 

	<div class="row mt-4">

		<div class="form-group col-10 text-left">

			<label class="lead" for="atividade">Atividade:</label>
			<select class="form-control" id="atividade">
			@foreach ($advertencias as $advertencia)
				<option>{{ $advertencia->nome }}</option>
			@endforeach
			</select>
		</div>

		<div class="form-group col-2 text-left">

			<label class="lead" for="ponto">Pontos:</label>
			<input class="form-control" id="ponto" type="text" value="{{ 2+2 }}" readonly>
		</div>

		<div class="form-group col-6 text-left">

			<label class="lead text-danger" for="penalizado">Penalizado:</label>
			<select class="form-control" id="penalizado">
			@foreach ($membros as $membro)
				<option>{{ $membro->nome }}</option>
			@endforeach
			</select>
		</div>

		<div class="form-group col-6 text-left">

			<label class="lead" for="responsavel">Responsável:</label>
			<select class="form-control" id="responsavel">
			@foreach ($direxes as $direx)
				<option>{{ $direx->nome }}</option>
			@endforeach
			</select>
		</div>

		<div class="form-group col-6 text-left">

			<label class="lead" for="data">Data:</label>
			<input type="date" class="form-control" id="data" required>
		</div>

		<div class="form-group col-6 text-left">

			<label class="lead" for="hora">Hora:</label>
			<input type="time" class="form-control" id="hora" required>
		</div>

		<div class="form-group col-12 text-left">

			<label class="lead">Descrição adicional:</label>
			<textarea id="textarea" name="content"  class="form-control"></textarea>
		</div>

		<div class="form-group col-12">
			<button type="submit" class="btn btn-lg btn-dark">Enviar</button>
		</div>
	</div>
</form>

<script src="{{asset('js/tinymce/tinymce.min.js')}}"></script>
<script src="{{asset('js/mytinymce.js')}}"></script>
<script src="{{asset('js/prism.js')}}"></script>
@endsection
