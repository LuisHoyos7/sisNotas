<?php

namespace App\Http\Controllers;
use App\Models\Notas;
use Illuminate\Http\Request;

class InformesController extends Controller
{
    public function materiasEstudiante(){

    	$estudiante = Notas::select('select estudiante,asignatura,corte1,corte2,corte3');

    	
    }
}
