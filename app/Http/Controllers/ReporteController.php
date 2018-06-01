<?php
 
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Detalle;
use App\Models\Notas;
use Barryvdh\DomPDF\Facade as PDF;

class ReporteController extends Controller
{
    

    public function reporte(Request $request){

         $id_asignatura = $request->get('id_asignatura');
         $grupo = $request->get('grupo');
        
        $notas = Notas::orderBy('asignatura','ASC')
        ->id($id_asignatura)
        ->grupo($grupo)
        ->distinct()
        ->paginate(8);

        $busqueda = Notas::orderBy('asignatura','ASC')
        ->id($id_asignatura)
        ->grupo($grupo)
        ->distinct()
        ->paginate(6000);

        $detallesList = \DB::select("select DISTINCT id_asignatura,asignatura,grupo FROM notas ORDER BY asignatura");
        
        session()->put('buscar',compact('busqueda','detallesList'));
        return view('reporte',compact('notas','detallesList'));
    }

    public function informacionCurso($ID_ASIGNATURA,$GRUPO){
       
        /* variable info se toma para mostrar las notas que estan por debajo de 3*/
        $info = \DB::select("select DISTINCT * FROM notas
            where id_asignatura = '$ID_ASIGNATURA' and grupo = '$GRUPO' and corte1 < 3.0
            ORDER BY asignatura");

        /* variable datos se toma para mostrar la informacion basica materias,asignatura demas...*/
        $datos = \DB::select("select DISTINCT * FROM notas 
        where id_asignatura = '$ID_ASIGNATURA' and grupo = '$GRUPO'
        ORDER BY asignatura ");
       

        session()->put('datos',compact('info','datos'));
       
        $pdf = PDF::loadView('reportes.reportesCurso',session('datos'));
        return $pdf->stream();
        

    }

      public function informacionCurso1($ID_ASIGNATURA,$GRUPO){
       
        /* variable info se toma para mostrar las notas que estan por debajo de 3*/
        $info = \DB::select("select DISTINCT * FROM notas2s
            where id_asignatura = '$ID_ASIGNATURA' and grupo = '$GRUPO' and corte1 < 3.0 and corte2 < 3.0
            ORDER BY asignatura");

        /* variable datos se toma para mostrar la informacion basica materias,asignatura demas...*/
        $datos = \DB::select("select DISTINCT * FROM notas2s 
        where id_asignatura = '$ID_ASIGNATURA' and grupo = '$GRUPO'
        ORDER BY asignatura ");
       

        session()->put('datos',compact('info','datos'));
       
        $pdf = PDF::loadView('reportes.reportesCurso1',session('datos'));
        return $pdf->stream();
        

    }

      public function informacionCurso2($ID_ASIGNATURA,$GRUPO){
       
        /* variable info se toma para mostrar las notas que estan por debajo de 3*/
        $info = \DB::select("select DISTINCT * FROM notas
            where id_asignatura = '$ID_ASIGNATURA' and grupo = '$GRUPO' and corte1 < 3.0 
            ORDER BY asignatura");

        /* variable datos se toma para mostrar la informacion basica materias,asignatura demas...*/
        $datos = \DB::select("select DISTINCT * FROM notas 
        where id_asignatura = '$ID_ASIGNATURA' and grupo = '$GRUPO'
        ORDER BY asignatura ");
       

        session()->put('datos',compact('info','datos'));
       
        $pdf = PDF::loadView('reportes.reportesCurso',session('datos'));
        return $pdf->stream();
        

    }
}
