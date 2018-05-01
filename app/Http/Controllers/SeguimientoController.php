<?php

namespace App\Http\Controllers;

use App\DataTables\SeguimientoDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateSeguimientoRequest;
use App\Http\Requests\UpdateSeguimientoRequest;
use App\Repositories\SeguimientoRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;
use App\Models\Periodo;
use App\Models\Seguimiento;

class SeguimientoController extends AppBaseController
{
    /** @var  SeguimientoRepository */
    private $seguimientoRepository;

    public function __construct(SeguimientoRepository $seguimientoRepo)
    {
        $this->seguimientoRepository = $seguimientoRepo;
    }


    public function index(SeguimientoDataTable $seguimientoDataTable,$id_periodo="")
    {
        if($id_periodo == "")
        {

            return $seguimientoDataTable->render('seguimientos.index');

        }
        else
        {  
             
            $periodo               = Periodo::where("id",$id_periodo)->first();
            $seguimiento  = \DB::table('seguimientos as seg')
                                    ->join('periodos as per', 'p.id', '=', 'seg.id_per')
                                    ->select('seg.*', 'per.*')
                                    ->where("seg.id_per",$id_periodo)
                                    ->get();

            return view('seguimientos.index')
                                    ->with('seguimiento',$seguimiento)
                                    ->with("periodo",$periodo)
                                    ->with("id_periodo",$id_periodo);
                                    
        }
        
    }

    public function create($id_periodo="")
    {
        $periodo          = Periodo::where("id",$id_periodo)->first();
        return view('seguimientos.create')
                                    ->with("periodo",$periodo)
                                    ->with("id_periodo",$id_periodo);
    }

 
    public function store(CreateSeguimientoRequest $request)
    {
        $input = $request->all();

        $seguimiento = $this->seguimientoRepository->create($input);

        Flash::success('Seguimiento Guardado Exitosamente.');

        return view('data');
    }

    public function show($id)
    {
        $seguimiento = $this->seguimientoRepository->findWithoutFail($id);

        if (empty($seguimiento)) {
            Flash::error('Seguimiento no encontrado');

            return redirect(route('seguimientos.index'));
        }

        return view('seguimientos.show')->with('seguimiento', $seguimiento);
    }

    public function edit($id)
    {
        $seguimiento = $this->seguimientoRepository->findWithoutFail($id);

        if (empty($seguimiento)) {
            Flash::error('Seguimiento no encontrado');

            return redirect(route('seguimientos.index'));
        }

        return view('seguimientos.edit')->with('seguimiento', $seguimiento);
    }

    public function update($id, UpdateSeguimientoRequest $request)
    {
        $seguimiento = $this->seguimientoRepository->findWithoutFail($id);

        if (empty($seguimiento)) {
            Flash::error('Seguimiento no encontrado');

            return redirect(route('seguimientos.index'));
        }

        $seguimiento = $this->seguimientoRepository->update($request->all(), $id);

        Flash::success('Seguimiento Actualizado Exiotasamente.');

        return redirect(route('seguimientos.index'));
    }

    public function destroy($id)
    {
        $seguimiento = $this->seguimientoRepository->findWithoutFail($id);

        if (empty($seguimiento)) {
            Flash::error('Seguimiento no encontrado');

            return redirect(route('seguimientos.index'));
        }

        $this->seguimientoRepository->delete($id);

        Flash::success('Seguimiento Eliminado.');

        return redirect(route('seguimientos.index'));
    }
}
