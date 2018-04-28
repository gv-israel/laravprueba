 @extends('plantilla.principal')
 @section('title', 'Generar Codigo')
 @section('contenido')
    <div class="row">
        <div class="col-xs-12 p-5"><h1>Bienvenido {!!Auth::user()->name!!}<h1></div>
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
		
		<p>Puedes generar tus codigos promocionales haciendo click en el boton <strong>GENERAR!</strong> y canjearlos en la seccion <strong>Mis Codigos</strong>.</p>
			
		<div class="text-center">
		<div id="codigoGenerado"></div>
		<button id="generar" class="btn btn-primary btn-lg">GENERAR!</button>
		</div>
		
		</div>
    </div>
   @stop