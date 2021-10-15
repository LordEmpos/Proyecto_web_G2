<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reserva;
use JWTAuth;
use Illuminate\Database\QueryException;
#Propio
use App\Models\Habitacion;

class ReservaController extends Controller
{
    public function create(Request $request){
        /* $data = $request->all();
        $token = $request->bearerToken();
        $doc = JWTAuth::getPayload($token)->toArray()['sub'];
        $data['doc_cliente'] = $doc;
        $created = Reserva::create($data);
        return $created; */
        
        $data = $request->all();
        $token = $request->bearerToken();
        $doc = JWTAuth::getPayload($token)->toArray()['sub'];
        $data['doc_cliente'] = $doc;
        try{
            $created = is_object(Reserva::create($data));
        } catch(QueryException $e){
            $created = false;
        }
        return array('created'=>$created); 
    }

    public function history(Request $request){
        $token = $request->bearerToken();
        $doc = JWTAuth::getPayload($token)->toArray()['sub'];
        
        /* $history = Reserva::where('doc_cliente', $doc)->get(); */
        /* $history = Reserva::where('doc_cliente', $doc)->with(['habitacion.hotel', 'habitacion.tipo'])->get(); */

        # SELECT * FROM `reservas` INNER JOIN `habitaciones` ON habitaciones.id = reservas.habitacion_id WHERE reservas.doc_cliente = 6666
        $history = Reserva::where('doc_cliente', $doc)
        ->join('habitaciones', 'habitaciones.id', '=', 'reservas.habitacion_id')
        ->join('hoteles', 'hoteles.id', '=', 'habitaciones.hotel_id')
        ->join('tipo_habitaciones', 'tipo_habitaciones.id', '=', 'habitaciones.tipo_id')
        ->select('hoteles.nombre', 'ciudad', 'precio', 'fecha_inicio', 'fecha_fin', 'estrellas', 'huespedes', 'minibar')
        ->get();

        return $history;
    }

    public function showByCliente(Request $request){ //Funcion del profesor
        $token = $request->bearerToken();
        $doc = JWTAuth::getPayload($token)->toArray()['sub'];
        $history = Reserva::where('doc_cliente', $doc)->with(['habitacion.hotel', 'habitacion.tipo'])->get();
        /* $history = Reserva::where('doc_cliente', $doc)->get(); */
        return $history;
    }

    public function datos(Request $request){
        $filter = $request->input('filter');
        $HabReserva = Habitacion::where('id', $request->input('value'))->with('hotel', 'tipo')->get();
        return $HabReserva;
    }


}

