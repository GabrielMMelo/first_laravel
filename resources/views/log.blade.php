@extends('layouts.nemesys')

@section('nav-log', 'black')

@section ('nav-items')

@endsection

@section('content')

	<div class="mt-4">
		<table class="table">
			<thead>
				<tr>
					<th scope="col">#</th>
					<th scope="col">Id</th>
					<th scope="col">Tipo</th>
					<th scope="col">Penalizado</th>
					<th scope="col">Responsavel</th>
					<th scope="col">Data</th>
					<th scope="col">Hora</th>
					<th scope="col">Descrição</th>
					<th scope="col">Status</th>
					<th scope="col">Id_Semestre</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					@if ($historic != NULL)
						@foreach($historic as $historic)
							<th scope="row">{{$loop->iteration}}</th>
							<td>{{$historic['id']}}</td>
							<td>{{$historic['type']}}</td>
							<td>{{$historic['penalized']}}</td>
							<td>{{$historic['responsible']}}</td>
							<td>{{$historic['date']}}</td>
							<td>{{$historic['time']}}</td>
							<td>{{$historic['description']}}</td>
							<td>{{$historic['status']}}</td>
							<td>{{$historic['id_semester']}}</td>
							<td>
								<form action="{{route('log.delete')}}" method="POST">
									{{csrf_field()}}
									<input type=hidden name="delete" value="{{$historic['id']}}">
									<button type=submit class="btn btn-warning"> Deletar </button>
								</form>
							</td>
						</tr>
						@endforeach
					@endif
				</tbody>
			</table>
		</div>

@endsection
					