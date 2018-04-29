@extends('plantilla.principal')

@section('title', 'Mis Codigos')

@if(Session::has('codigo-canjeado'))
<div class="alert alert-success" role="alert">{{Session::get('codigo-canjeado')}}</div>
@endif

@section('contenido')

<div class="row">
	<div class="col-xs-12 p-5"><h1>Mis Codigos Promocionales</h1></div>
</div>
<div class="row">

	@include('plantilla.menu')

	<div class="col-sm-9 p-4">
		<table class="table">

			<thead>
				<tr>
					<th scope="col">Codigo</th>
					<th scope="col" class="text-center">Canjeado</th>
					<th scope="col" class="text-center">Opciones</th>
				</tr>
			</thead>

			@foreach($codigos as $codigo)
			<tbody @if($codigo->canjeado == 1) class="bg-success" @endif >
				<td>{{$codigo->codigo}}</td>
				<td>
					@if($codigo->canjeado == 1)
					Canjeado
					@else
					No canjeado
					@endif
				</td>
				<td>
					@if($codigo->canjeado == 0)
					<button class="canjear btn btn-primary" data-id="{{$codigo->id}}">CANJEAR</button>
					@endif
				</td>
			</tbody>
			@endforeach

		</table>

	</div>
</div>

@stop