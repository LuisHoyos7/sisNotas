<?php
 
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Detalle;
use App\Models\Notas;
use Barryvdh\DomPDF\Facade as PDF;

class ReporteController extends Controller
{
    

    public function reporte(){
        
        $notas = \DB::select('select DISTINCT id_asignatura,asignatura,grupo FROM notas
        ORDER BY asignatura ');
        
        return view('reporte',compact('notas'));
    }

    public function informacionCurso($ID_ASIGNATURA,$GRUPO,Request $datos){
       
    
      
       

        

        $info = \DB::select("select DISTINCT id_asignatura,asignatura,grupo FROM notas
            where id_asignatura = '$ID_ASIGNATURA' and grupo = '$GRUPO'
            ORDER BY asignatura");
    

        session()->put('datos',compact('info'));

        $pdf = PDF::loadView('reportes.reportesCurso',session('datos'));
        return $pdf->stream();
        

    }
}
