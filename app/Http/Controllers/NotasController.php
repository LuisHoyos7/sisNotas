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
        /**
        $this->notasRepository->pushCriteria(new RequestCriteria($request));
        $notas = $this->notasRepository->paginate(6);

        return view('notas.index')
            ->with('notas', $notas);
            */
         $id_asignatura = $request->get('id_asignatura');
         $grupo = $request->get('grupo');
         $parametro1 = $request->get('parametro1');
         $parametro2 = $request->get('parametro2');
         

         $notas = Notas::orderBy('id','DESC')
         ->id($id_asignatura)
         ->grupo($grupo)
         ->corte1($parametro1,$parametro2)
         ->paginate(10);

         $pdfs = Notas::orderBy('id','DESC')
         ->id($id_asignatura)
         ->grupo($grupo)
         ->corte1($parametro1,$parametro2)
         ->paginate(6000);
         $detallesList = \DB::table('notas')->select(['id_asignatura','asignatura' ,'grupo'])->get();
         

         session()->put('search',compact('pdfs','detallesList'));

         return view('notas.index',compact('notas','detallesList'));
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
}
