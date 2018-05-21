@extends('master')

@section('link')
	@parent
	<link href="{{asset('css/prism.css')}}" rel="stylesheet" type="text/css">
@endsection

@section('nav-logo','black')

@section('title','PCD - Nova atividade')

@section('nav-items')
@endsection

@section('search-bar')
@endsection

@section('snackbar')
	@parent
@endsection

@if(Session::has('msg'))
     <?php $msg = Session::get('msg') ?>
@endif

@section('content')

<div id="snackbar">{{ $msg or ""}}</div>

@if (isset($msg))
	<script>
		snackbar();
	</script>
@endif

<form action="{{ route('form.store') }}" method="post">
	{{ csrf_field()  }}
	<div class="row mt-4">

		<div class="form-group col-10 text-left">

			<label class="lead" for="atividade">Atividade:</label>
			<select class="form-control" name="tipo" id="atividade">
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
			<select class="form-control" name="penalizado" id="penalizado">
			@foreach ($membros as $membro)
				<option>{{ $membro->nome }}</option>
			@endforeach
			</select>
		</div>

		<div class="form-group col-6 text-left">

			<label class="lead" for="responsavel">Responsável:</label>
			<select class="form-control" name="responsavel" id="responsavel">
			@foreach ($direxes as $direx)
				<option>{{ $direx->nome }}</option>
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

<script src="{{asset('js/tinymce/tinymce.min.js')}}"></script>
<script src="{{asset('js/mytinymce.js')}}"></script>
<script src="{{asset('js/prism.js')}}"></script>
@endsection
