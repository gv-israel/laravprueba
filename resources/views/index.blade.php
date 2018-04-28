 @extends('plantilla.principal')
 @section('title', 'Bienvenido')
 @section('contenido')
    <div class="row">
        <div class="col-xs-12 p-5"><h1>Bienvenido<h1></div>
    </div>
    <div class="row">
        <div class="col-sm-12 p-4">
		
		<p>Inicia sesion o registrate para obtener descuentos increibles en tus compras. A que esperas? Registrate gratis.</p>
			
		<div class="text-center">
		<div id="codigoGenerado"></div>
		<a href="iniciar-sesion">
			<button class="btn btn-primary btn-lg">Iniciar sesion</button>
		</a>
		<a href="registro">
			<button class="btn btn-primary btn-lg">Registro</button>
		</a>
		</div>
		
		</div>
    </div>
   @stop