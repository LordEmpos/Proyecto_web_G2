<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cliente;
use Illuminate\Support\Facades\Hash;
use JWTAuth;

class ClienteController extends Controller
{
    /* public function signup(Request $request){
        Cliente::create($request->all());
    } */

    public function signup(Request $request){
        /* Cliente::create($request->all()); */
        $data = $request->all();
        $data['clave'] = Hash::make($data['clave']);
        $cliente = Cliente::create($data);
        $token = JWTAuth::fromUser($cliente);
        return array('token' => $token);
    }

    public function login(Request $request){
        /* $correo =$request->input('correo');
        $clave =$request->input('clave');

        $cliente=Cliente::select('clave')->where('correo',$correo)->first();
        
        $res=array(
            "validado"=> $cliente->clave==$clave
        );
        return $res; */

        /* $credentials = $request->all();
        $cliente = Cliente::where('correo', $credentials['correo'])->first();

        if(Hash::check($credentials['clave'], $cliente['clave'])){
            $token = JWTAuth::fromUser($cliente);
        }else{
            return response()->json(['error' => 'credenciales invalidas..'], 400);
        }
        return array('token' => $token); */

        $credentials = $request->all();
        $cliente = Cliente::where('correo', $credentials['correo'])->first();

        if(Hash::check($credentials['clave'], $cliente['clave'])){
            $token = JWTAuth::fromUser($cliente);
        }else{
            return response()->json(['error' => 'credenciales invalidas'], 400);
        }
        return array('token' => $token);

    } 
}
//}

    /* public function update(Request $request){
        
    } */

    /* public function showAll(){
        return cliente::all();
    } */

/* } */
