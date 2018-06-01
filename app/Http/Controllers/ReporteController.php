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
        
        $notas = Notas::select('asignatura','grupo','id_asignatura')
                ->id($id_asignatura)
                ->grupo($grupo)
                ->distinct()
                ->orderBy('asignatura')
                ->paginate(8);


        $busqueda = Notas::select('asignatura','grupo','id_asignatura')
                ->id($id_asignatura)
                ->grupo($grupo)
                ->distinct()
                ->orderBy('asignatura', 'asc');
              

        //$detallesList = \DB::select("select DISTINCT id_asignatura,asignatura,grupo FROM notas ORDER BY asignatura");
        $asignaturas = Notas::orderBy('asignatura')->pluck('asignatura', 'id_asignatura');
        $grupos = Notas::orderBy('grupo')->pluck('grupo', 'grupo');
        
        //session()->put('buscar',compact('busqueda','detallesList'));

        return view('reporte', compact('notas','detallesList', 'asignaturas', 'grupos'));
    }

    public function informacionCurso($ID_ASIGNATURA,$GRUPO){
       
        /* variable info se toma para mostrar las notas que estan por debajo de 3*/
        
            $info = \DB::select("select DISTINCT * FROM notas
            where id_asignatura = '$ID_ASIGNATURA' and grupo = '$GRUPO' and corte1 < 3.0
            ORDER BY asignatura");

            $contador = \DB::select("select DISTINCT * FROM notas
            where id_asignatura = '$ID_ASIGNATURA' and grupo = '$GRUPO' 
            ORDER BY asignatura");
            
        /* variable datos se toma para mostrar la informacion basica materias,asignatura demas...*/
            $datos = \DB::select("select DISTINCT id_asignatura, asignatura, grupo FROM notas 
            where id_asignatura = '$ID_ASIGNATURA' and grupo = '$GRUPO'
            ORDER BY asignatura ");



       

        session()->put('datos',compact('info','datos','contador'));
       
        $pdf = PDF::setPaper('legal')->loadView('reportes.reportesCurso',session('datos'));
        return $pdf->stream();
        

    }

      public function informacionCurso1($ID_ASIGNATURA,$GRUPO){
       
        /* variable info se toma para mostrar las notas que estan por debajo de 3*/
            $info = \DB::select("select DISTINCT * FROM notas2s
            where id_asignatura = '$ID_ASIGNATURA' and grupo = '$GRUPO' and corte1 < 3.0 and corte2 < 3.0
            ORDER BY asignatura");

            $contador = \DB::select("select DISTINCT * FROM notas2s
            where id_asignatura = '$ID_ASIGNATURA' and grupo = '$GRUPO' 
            ORDER BY asignatura");
        /* variable datos se toma para mostrar la informacion basica materias,asignatura demas...*/
            $datos = \DB::select("select DISTINCT id_asignatura, asignatura, grupo FROM notas2s 
            where id_asignatura = '$ID_ASIGNATURA' and grupo = '$GRUPO'
            ORDER BY asignatura ");
           

        session()->put('datos1',compact('info','datos','contador'));
       
        $pdf = PDF::setPaper('legal')->loadView('reportes.reportesCurso1',session('datos1'));
        return $pdf->stream();
        

    }

      public function informacionCurso2($ID_ASIGNATURA,$GRUPO){
       
        /* variable info se toma para mostrar las notas que estan por debajo de 3*/
       
            $info = \DB::select("select DISTINCT * FROM notas3s
            where id_asignatura = '$ID_ASIGNATURA' and grupo = '$GRUPO' and corte1 < 3.0
            and corte2 < 3.0 and corte3 < 3.0  
            ORDER BY asignatura");

            $contador = \DB::select("select DISTINCT * FROM notas3s
            where id_asignatura = '$ID_ASIGNATURA' and grupo = '$GRUPO' 
            ORDER BY asignatura");

        /* variable datos se toma para mostrar la informacion basica materias,asignatura demas...*/
            $datos = \DB::select("select DISTINCT id_asignatura, asignatura, grupo FROM notas3s 
            where id_asignatura = '$ID_ASIGNATURA' and grupo = '$GRUPO'
            ORDER BY asignatura ");
           

        session()->put('datos',compact('info','datos','contador'));
       
        $pdf = PDF::setPaper('legal')->loadView('reportes.reportesCurso2',session('datos'));
        return $pdf->stream();
        

    }
}
