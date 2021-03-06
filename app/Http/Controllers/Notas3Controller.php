<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateNotas3Request;
use App\Http\Requests\UpdateNotas3Request;
use App\Repositories\Notas3Repository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Barryvdh\DomPDF\Facade as PDF;
use App\Models\Notas3;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class Notas3Controller extends AppBaseController
{
    /** @var  Notas3Repository */
    private $notas3Repository;

    public function __construct(Notas3Repository $notas3Repo)
    {
        $this->notas3Repository = $notas3Repo;
    }

    /**
     * Display a listing of the Notas3.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        session()->put('id_asignatura',$request->get('id_asignatura'));
        session()->put('grupo',$request->get('grupo'));
        session()->put('parametro1',$request->get('parametro1'));
        session()->put('parametro2',$request->get('parametro2'));
         $id_asignatura = session()->get('id_asignatura');
         $grupo = session()->get('grupo');
         $parametro1 = session()->get('parametro1');
         $parametro2 = session()->get('parametro2');
         

         $notas = Notas3::orderBy('id','DESC')
         ->id($id_asignatura)
         ->grupo($grupo)
         ->corte2($parametro1,$parametro2)
         ->paginate(10);

         $pdfs = Notas3::orderBy('id','DESC')
         ->id($id_asignatura)
         ->grupo($grupo)
         ->corte2($parametro1,$parametro2)
         ->paginate(6000);
         
         $excel = Notas3::orderBy('asignatura','ASC')
         ->id($id_asignatura)
         ->grupo($grupo)
         ->corte2($parametro1,$parametro2)
         ->paginate(6000);
        session()->put('excel',$excel);

         $asignaturas = Notas3::orderBy('asignatura')->pluck('asignatura', 'id_asignatura');
         $grupos = Notas3::orderBy('grupo')->pluck('grupo', 'grupo');
         

         session()->put('search',compact('pdfs','asignaturas','grupos'));

         return view('notas3s.index',compact('notas','asignaturas','grupos'));
    }

    /**
     * Show the form for creating a new Notas3.
     *
     * @return Response
     */
    public function create()
    {
        return view('notas3s.create');
    }

    /**
     * Store a newly created Notas3 in storage.
     *
     * @param CreateNotas3Request $request
     *
     * @return Response
     */
    public function store(CreateNotas3Request $request)
    {
        $input = $request->all();

        $notas3 = $this->notas3Repository->create($input);

        Flash::success('Notas3 saved successfully.');

        return redirect(route('notas3s.index'));
    }

    /**
     * Display the specified Notas3.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $notas3 = $this->notas3Repository->findWithoutFail($id);

        if (empty($notas3)) {
            Flash::error('Notas3 not found');

            return redirect(route('notas3s.index'));
        }

        return view('notas3s.show')->with('notas3', $notas3);
    }

    /**
     * Show the form for editing the specified Notas3.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $notas3 = $this->notas3Repository->findWithoutFail($id);

        if (empty($notas3)) {
            Flash::error('Notas3 not found');

            return redirect(route('notas3s.index'));
        }

        return view('notas3s.edit')->with('notas3', $notas3);
    }

    /**
     * Update the specified Notas3 in storage.
     *
     * @param  int              $id
     * @param UpdateNotas3Request $request
     *
     * @return Response
     */
    public function update($id, UpdateNotas3Request $request)
    {
        $notas3 = $this->notas3Repository->findWithoutFail($id);

        if (empty($notas3)) {
            Flash::error('Notas3 not found');

            return redirect(route('notas3s.index'));
        }

        $notas3 = $this->notas3Repository->update($request->all(), $id);

        Flash::success('Notas3 updated successfully.');

        return redirect(route('notas3s.index'));
    }

    /**
     * Remove the specified Notas3 from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $notas3 = $this->notas3Repository->findWithoutFail($id);

        if (empty($notas3)) {
            Flash::error('Notas3 not found');

            return redirect(route('notas3s.index'));
        }

        $this->notas3Repository->delete($id);

        Flash::success('Notas3 deleted successfully.');

        return redirect(route('notas3s.index'));
    }
      public function pdf(Request $request)
    {        
        $pdf = PDF::loadView('reportes.notas2', session('search'));
        return $pdf->stream();
        //return $pdf->download('listado.pdf');
    }

    public function excel(){
         // estas dos lineas permiten descargar y abrir el archivo excel sin errores en el formato y la extension de este //

            ob_end_clean (); 
            ob_start (); 
            
           return \Excel::create('LISTADO DE ESTUDIANTES CON NOTAS ENTRE '.session()->get('parametro1').' Y '.session()->get('parametro2'), function($excel)   {
                
            $excel->sheet('REPORTE_ESTUDIANTES', function ($sheet) {
            
            $sheet->mergeCells('A1:D1');
            $sheet->row(1,['LISTADO DE ESTUDIANTES']);
            $sheet->ROW(2,['ID_ASIGNATURA','ASIGNATURA','GRUPO',
                           'DOCENTE','ID_ESTUDIANTE','ESTUDIANTE','COHORTE 1','COHORTE 2','COHORTE 3']);
            
            $consulta = session()->get('excel');
            

          
            foreach($consulta as $cons){
                    $row = [];

                    $row[0] = $cons->id_asignatura;
                    $row[1] = $cons->asignatura;
                    $row[2] = $cons->grupo;
                    $row[3] = $cons->docente;
                    $row[4] = $cons->id_estudiante;
                    $row[5] = $cons->estudiante;
                    $row[6] = $cons->corte1;
                    $row[7] = $cons->corte2;
                    $row[8] = $cons->corte3;
                        
                    $sheet->appendRow($row);

            }

            
        });
                
        })->export('XLSX');

    }
}


