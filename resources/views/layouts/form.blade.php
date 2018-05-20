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

			<label for="atividade">Atividade:</label>
			<select class="form-control" id="atividade">
				<option>1</option>
				<option>2</option>
				<option>3</option>
				<option>4</option>
				<option>5</option>
			</select>
		</div>

		<div class="form-group col-2 text-left">

			<label for="ponto">Pontos:</label>
			<input class="form-control" id="ponto" type="text" value="{{ 2+2 }}" readonly>
		</div>

		<div class="form-group col-6 text-left">

			<label for="penalizado">Penalizado:</label>
			<select class="form-control" id="penalizado">
			@foreach ($membros as $membro)
				<option>{{ $membro->nome }}</option>
			@endforeach
			</select>
		</div>

		<div class="form-group col-6 text-left">

			<label for="responsavel">Responsável:</label>
			<select class="form-control" id="responsavel">
				<option>1</option>
				<option>2</option>
				<option>3</option>
				<option>4</option>
				<option>5</option>
			</select>
		</div>

		<div class="form-group col-6 text-left">

			<label for="data">Data:</label>
			<input type="date" class="form-control" id="data">
		</div>

		<div class="form-group col-6 text-left">

			<label for="hora">Hora:</label>
			<input type="time" class="form-control" id="hora">
		</div>

		<div class="form-group col-12 text-left">

			<label for="descricao">Descrição adicional:</label>
			<textarea rows="10" class="form-control" id="descricao"></textarea>
		</div>

		<div class="form-group col-12">
			<button type="submit" class="btn btn-lg btn-dark">Enviar</button>
		</div>
	</div>
</form>

@endsection
