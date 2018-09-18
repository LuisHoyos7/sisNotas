<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Notas;
use JavaScript;
use Barryvdh\DomPDF\Facade as PDF;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        

        $reprobados = \DB::table('notas')->select('asignatura',\DB::raw('count(*) as cant_est'))
        ->where('corte1','<','3.0')
        ->groupBy('asignatura')->orderBy('asignatura','ASC')->get();
        
        $aprobados = \DB::table('notas')->select('asignatura',\DB::raw('count(*) as cant_est'))
        ->where('corte1','>','2.9')
        ->groupBy('asignatura')->orderBy('asignatura','ASC')->get();
        

        $totalEstudiantes = \DB::table('notas')->select(\DB::raw('estudiante'))->groupBy('estudiante')->get();
        $totalReprobados = \DB::table('notas')->select(\DB::raw('estudiante'))
        ->where('corte1','<','3.0')
        ->groupBy('estudiante')->get();

        $totalAprobados = \DB::table('notas')->select(\DB::raw('estudiante'))
        ->where('corte1','>','2.9')
        ->groupBy('estudiante')->get();

        JavaScript::put([
            'aprobados' => $aprobados,
            'reprobados' =>$reprobados,
            'totalReprobados'=>$totalReprobados,
            'totalEstudiantes'=>count($totalEstudiantes),
            'totalAprobados'=>count($totalAprobados)
        ]);



        
        

        
        return view('home',compact('aprobados','reprobados'));
    }

    public function reporte(){

        $reprobados = \DB::table('notas')->select('asignatura',\DB::raw('count(*) as cant_est'))
        ->where('corte1','<','3.0')
        ->groupBy('asignatura')->orderBy('asignatura','ASC')->get();

        $pdf = PDF::setPaper('legal')->loadView('home',compact('reprobados'));
        return $pdf->stream();

    }
}
