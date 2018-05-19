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


    public function index(SeguimientoDataTable $seguimientoDataTable)
    {
        return $seguimientoDataTable->render('seguimientos.index');
        
    }

    public function create()
    {   
       $periodo = Periodo::all();
        return view('seguimientos.create',compact('periodo'));
    }

 
    public function store(CreateSeguimientoRequest $request)
    {
        $periodo = Periodo::all();
        $input = $request->all();

        $seguimiento = $this->seguimientoRepository->create($input,$periodo);

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
