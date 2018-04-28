<?php

namespace PruebaHotel\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use Redirect;
//NECESARIO PARA OBTENER EL ID USUARIO DE SESION
use Illuminate\Support\Facades\Auth;

class ControladorUsuario extends Controller
{
    public function __construct(){
        $this->middleware('Panel', ['only' => ['generar_codigo','codigos_promocionales','crear_codigo', 'canjear_codigo']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //CREA USUARIO
        $user = \PruebaHotel\User::create([
            //consulta variales en app/User.php
            'name' => $request['nombres'],
            'email' => $request['email'],
            'password' => bcrypt($request['clave'])
        ]);
        if($user){
            Session::flash('registro-exitoso', 'Te has registrado con exito. Ahora inicia sesion.');
            return redirect('iniciar-sesion');
        }
        else{
            return 'Algo salio mal.';
        }
    }

    //REGISTRO
    public function registro(){
        return view('registro');
    }

    //PAGINA INICIAR SESION
    public function iniciar_sesion(){
        return view('iniciar-sesion');
    }

    //PAGINA GENERAR CODIGO
    public function generar_codigo(){
        return view('generar-codigo');
    }

    //PAGINA CODIGOS PROMOCIONALES
    public function codigos_promocionales(){
        //CONSULTA EN DB CODIGOS
        $codigos = \PruebaHotel\Codigos::All()->where('idUsuario', Auth::user()->id);
        //IMPRIME CON LOS CODIGOS CONSULTADOS
        return view('codigos-promocionales', compact('codigos'));
    }

    //CREAR CODIGO
    public function crear_codigo(){
        //GENERA CODIGO
        $codigo = "";
        $patron = '1234567890abcdefghijklmnopqrstuvwxyz';
        $max = strlen($patron)-1;

        for($i=0;$i < 10;$i++){
            $codigo .= $patron{mt_rand(0,$max)};
        }

        $codigo = strtoupper($codigo);

        //CREA CODIGO EN DB
        $cod = \PruebaHotel\Codigos::create([
            //consulta variales en app/User.php
            'idUsuario' => Auth::user()->id,
            'codigo' => $codigo,
            'canjeado' => 0,

        ]);

        //DEVUELVE CODIGO PARA SER CARGADO CON AJAx
        $codig['Codigo'] = $codigo;
        return json_encode($codig);

    }

    //CANJEA CODIGO PROMOCIONAL
    public function canjear_codigo($idCodigo){
       \PruebaHotel\Codigos::where('idUsuario', Auth::user()->id)
        ->where('id', $idCodigo)
        ->update(['canjeado' => 1]);
    Session::flash('codigo-canjeado', 'El codigo promocional se canjeo con exito.');
    return Redirect::to('codigos-promocionales');
    }

}
