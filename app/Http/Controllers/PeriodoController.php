<?php

namespace App\Http\Controllers;

use App\DataTables\PeriodoDataTable;
use App\Http\Requests;
use App\Http\Requests\CreatePeriodoRequest;
use App\Http\Requests\UpdatePeriodoRequest;
use App\Repositories\PeriodoRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class PeriodoController extends AppBaseController
{
    /** @var  PeriodoRepository */
    private $periodoRepository;

    public function __construct(PeriodoRepository $periodoRepo)
    {
        $this->periodoRepository = $periodoRepo;
    }

    public function index(PeriodoDataTable $periodoDataTable)
    {
        return $periodoDataTable->render('periodos.index');
    }

    public function create()
    {
        return view('periodos.create');
    }

    public function store(CreatePeriodoRequest $request)
    {
        $input = $request->all();

        $periodo = $this->periodoRepository->create($input);

        Flash::success('Periodo Guardado satisfactoriamnete.');

        return redirect(route('seguimientos.create'));
    }

    public function show($id)
    {
        $periodo = $this->periodoRepository->findWithoutFail($id);

        if (empty($periodo)) {
            Flash::error('Periodo no encontrado');

            return redirect(route('periodos.index'));
        }

        return view('periodos.show')->with('periodo', $periodo);
    }

    public function edit($id)
    {
        $periodo = $this->periodoRepository->findWithoutFail($id);

        if (empty($periodo)) {
            Flash::error('Periodo no encontrado');

            return redirect(route('periodos.index'));
        }

        return view('periodos.edit')->with('periodo', $periodo);
    }

    public function update($id, UpdatePeriodoRequest $request)
    {
        $periodo = $this->periodoRepository->findWithoutFail($id);

        if (empty($periodo)) {
            Flash::error('Periodo no encontrado');

            return redirect(route('periodos.index'));
        }

        $periodo = $this->periodoRepository->update($request->all(), $id);

        Flash::success('Periodo Actualizado Exitosamente.');

        return redirect(route('periodos.index'));
    }

    public function destroy($id)
    {
        $periodo = $this->periodoRepository->findWithoutFail($id);

        if (empty($periodo)) {
            Flash::error('Periodo no Encontrado');

            return redirect(route('periodos.index'));
        }

        $this->periodoRepository->delete($id);

        Flash::success('Periodo Eliminado.');

        return redirect(route('periodos.index'));
    }
}
