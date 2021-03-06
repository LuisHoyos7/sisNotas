<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateNotasRequest;
use App\Http\Requests\UpdateNotasRequest;
use App\Repositories\NotasRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Barryvdh\DomPDF\Facade as PDF;
use App\Models\Notas;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class NotasController extends AppBaseController
{
    /** @var  NotasRepository */
    private $notasRepository;

    public function __construct(NotasRepository $notasRepo)
    {
        $this->notasRepository = $notasRepo;
    }

    /**
     * Display a listing of the Notas.
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
         
         

         $notas = Notas::orderBy('asignatura','ASC')
         ->id($id_asignatura)
         ->grupo($grupo)
         ->corte1($parametro1,$parametro2)
         ->paginate(10);

         $pdfs = Notas::orderBy('asignatura','ASC')
         ->id($id_asignatura)
         ->grupo($grupo)
         ->corte1($parametro1,$parametro2)
         ->paginate(6000);
        
         $excel = Notas::orderBy('asignatura','ASC')
         ->id($id_asignatura)
         ->grupo($grupo)
         ->corte1($parametro1,$parametro2)
         ->paginate(6000);
        session()->put('excel',$excel);
        $asignaturas = Notas::orderBy('asignatura')->pluck('asignatura', 'id_asignatura');
        $grupos = Notas::orderBy('grupo')->pluck('grupo', 'grupo');
         
        session()->put('excel',$excel);
         session()->put('search',compact('pdfs','asignaturas','grupos'));

         return view('notas.index',compact('notas','asignaturas','grupos'));
    }
    

    /**
     * Show the form for creating a new Notas.
     *
     * @return Response
     */
    public function create()
    {
        return view('notas.create');
    }

    /**
     * Store a newly created Notas in storage.
     *
     * @param CreateNotasRequest $request
     *
     * @return Response
     */
    public function store(CreateNotasRequest $request)
    {
        $input = $request->all();

        $notas = $this->notasRepository->create($input);

        Flash::success('Notas saved successfully.');

        return redirect(route('notas.index'));
    }

    /**
     * Display the specified Notas.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $notas = $this->notasRepository->findWithoutFail($id);

        if (empty($notas)) {
            Flash::error('Notas not found');

            return redirect(route('notas.index'));
        }

        return view('notas.show')->with('notas', $notas);
    }

    /**
     * Show the form for editing the specified Notas.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $notas = $this->notasRepository->findWithoutFail($id);

        if (empty($notas)) {
            Flash::error('Notas not found');

            return redirect(route('notas.index'));
        }

        return view('notas.edit')->with('notas', $notas);
    }

    /**
     * Update the specified Notas in storage.
     *
     * @param  int              $id
     * @param UpdateNotasRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateNotasRequest $request)
    {
        $notas = $this->notasRepository->findWithoutFail($id);

        if (empty($notas)) {
            Flash::error('Notas not found');

            return redirect(route('notas.index'));
        }

        $notas = $this->notasRepository->update($request->all(), $id);

        Flash::success('Notas updated successfully.');

        return redirect(route('notas.index'));
    }

    /**
     * Remove the specified Notas from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $notas = $this->notasRepository->findWithoutFail($id);

        if (empty($notas)) {
            Flash::error('Notas not found');

            return redirect(route('notas.index'));
        }

        $this->notasRepository->delete($id);

        Flash::success('Notas deleted successfully.');

        return redirect(route('notas.index'));
    }

      public function pdf(Request $request)
    {        
        $pdf = PDF::loadView('reportes.notas', session('search'));
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
