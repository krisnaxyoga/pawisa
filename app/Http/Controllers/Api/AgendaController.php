<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\AgendaKegiatan;

class AgendaController extends Controller
{
    public function agenda(){
        $data = AgendaKegiatan::all();

        return response()->json($data);
    }
}
