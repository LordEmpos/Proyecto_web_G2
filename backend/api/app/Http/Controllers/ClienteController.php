<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\cliente;

class ClienteController extends Controller
{
    //
    public function showAll(){
        return cliente::all();
    }
}
