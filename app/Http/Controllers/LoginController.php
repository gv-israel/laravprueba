<?php

namespace PruebaHotel\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Session;
use Redirect;
use PruebaHotel\Http\Requests;
use PruebaHotel\Http\Requests\LoginRequest;
use PruebaHotel\Http\Controllers\Controller;
class LoginController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(LoginRequest $request)
    {
        //COMPRUEBA QUE INFORMACION DE LOGIN RECIBIDA SEA IGUAL QUE EN DB
        if(Auth::attempt(['email'=>$request['email'], 'password' => $request['clave']])){
            return Redirect::to('generar-codigo');
        }else{
            Session::flash('mensaje-error', 'El usuario o la contraseña son incorrectos.');
            return Redirect::to('iniciar-sesion');            
        }
    }

    public function cerrar_sesion()
    {
        Auth::logout();
        Session::flash('cerrado-sesion', 'Se ha cerrado sesion con exito.');
        return Redirect::to('iniciar-sesion');
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
