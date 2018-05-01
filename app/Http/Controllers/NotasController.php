<?php

namespace App\Http\Controllers;

use App\DataTables\NotasDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateNotasRequest;
use App\Http\Requests\UpdateNotasRequest;
use App\Repositories\NotasRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class NotasController extends AppBaseController
{
    /** @var  NotasRepository */
    private $notasRepository;

    public function __construct(NotasRepository $notasRepo)
    {
        $this->notasRepository = $notasRepo;
    }

    
    public function index(NotasDataTable $notasDataTable)
    {
        return $notasDataTable->render('notas.index');
    }

   
    public function create()
    {
        return view('notas.create');
    }

  
    public function store(CreateNotasRequest $request)
    {
        $input = $request->all();

        $notas = $this->notasRepository->create($input);

        Flash::success('Notas Agregadas Exiotosamente.');

        return redirect(route('notas.index'));
    }

 
    public function show($id)
    {
        $notas = $this->notasRepository->findWithoutFail($id);

        if (empty($notas)) {
            Flash::error('Notas no Encontrada');

            return redirect(route('notas.index'));
        }

        return view('notas.show')->with('notas', $notas);
    }

    public function edit($id)
    {
        $notas = $this->notasRepository->findWithoutFail($id);

        if (empty($notas)) {
            Flash::error('Notas no Encontradas');

            return redirect(route('notas.index'));
        }

        return view('notas.edit')->with('notas', $notas);
    }

    public function update($id, UpdateNotasRequest $request)
    {
        $notas = $this->notasRepository->findWithoutFail($id);

        if (empty($notas)) {
            Flash::error('Notas no Encontradas');

            return redirect(route('notas.index'));
        }

        $notas = $this->notasRepository->update($request->all(), $id);

        Flash::success('Notas Actualizadas Exiotosamente.');

        return redirect(route('notas.index'));
    }

    public function destroy($id)
    {
        $notas = $this->notasRepository->findWithoutFail($id);

        if (empty($notas)) {
            Flash::error('Notas no encontradas');

            return redirect(route('notas.index'));
        }

        $this->notasRepository->delete($id);

        Flash::success('Registro Eliminado.');

        return redirect(route('notas.index'));
    }
}
