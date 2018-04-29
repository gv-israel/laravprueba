 @extends('plantilla.principal')
 @section('title', 'Iniciar Sesion')

@if(Session::has('registro-exitoso'))
<div class="alert alert-success" role="alert">{{Session::get('registro-existoso')}}</div>
@endif

@if(Session::has('mensaje-error'))
<div class="alert alert-warning" role="alert">{{Session::get('mensaje-error')}}</div>
@endif

@if(Session::has('cerrado-sesion'))
<div class="alert alert-success" role="alert">{{Session::get('cerrado-sesion')}}</div>
@endif

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

 @section('contenido')
    <div class="row">
        <div class="col-sm-offset-4 col-sm-5 m-auto">
        <h1>Iniciar Sesion</h1><br>

             {!!Form::open(['route'=>'login.store', 'method'=>'post'])!!}
                {!!Form::text('email', null, ['class'=>'form-control form-control-lg', 'placeholder'=>'Email'])!!}
                {!!Form::password('clave', ['class'=>'form-control form-control-lg', 'placeholder'=>'Contraseña'])!!}
                {!!Form::submit('Iniciar sesion', ['class'=>'btn btn-primary'])!!}
             {!!Form::close()!!}

            <p class="float-right">
                Aun no estas registrado? <br>
                <a href="{!!URL::to('registro')!!}">Registrate Gratis</a>
            </p>
       
            
        </div>
    </div>
   @stop