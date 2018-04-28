@extends('plantilla.principal')

@section('title', 'Mis Codigos')

@if(Session::has('codigo-canjeado'))
	<div class="alert alert-success" role="alert">{{Session::get('codigo-canjeado')}}</div>
@endif

@section('contenido')
    <div class="row">
        <div class="col-xs-12 p-5"><h1>Mis Codigos Promocionales<h1></div>
    </div>
    <div class="row">
        <div class="col-sm-3 border-right">
		<ul class="list-group">
			<li class="list-group-item"><a href="generar-codigo">Generar Codigo</a></li>
			<li class="list-group-item"><a href="codigos-promocionales">Mis Codigos</a></li>
			<li class="list-group-item"><a href="cerrar-sesion" id="cerrar-sesion">Cerrar Sesion</a></li>
		</ul>		
		</div>
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