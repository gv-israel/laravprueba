 @extends('plantilla.principal')
 @section('title', 'Registro')
 @section('contenido')
    <div class="row">
        <div class="col-sm-offset-4 col-sm-5 m-auto">
		<h1>Registrarse</h1><br>

		 {!!Form::open(['route'=>'usuario.store', 'method'=>'post'])!!}
			{!!Form::text('nombres', null, ['class'=>'form-control form-control-lg', 'placeholder'=>'Nombre y Apellido'])!!}
			{!!Form::text('email', null, ['class'=>'form-control form-control-lg', 'placeholder'=>'Email'])!!}
			{!!Form::password('clave', ['class'=>'form-control form-control-lg', 'placeholder'=>'Contraseña'])!!}
			{!!Form::submit('Registrarse', ['class'=>'btn btn-primary'])!!}
		 {!!Form::close()!!}

			<p class="float-right">
				Ya estas registrado? <br>
			<a href="iniciar-sesion">Iniciar sesion</a>
			</p>
		
			
		</div>
    </div>
 @stop