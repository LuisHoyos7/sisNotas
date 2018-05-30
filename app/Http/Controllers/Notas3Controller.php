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
         $id_asignatura = $request->get('id_asignatura');
         $grupo = $request->get('grupo');
         $parametro1 = $request->get('parametro1');
         $parametro2 = $request->get('parametro2');
         

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

         $detallesList = \DB::table('notas3s')->select(['id_asignatura','asignatura' ,'grupo'])->get();
         

         session()->put('search',compact('pdfs','detallesList'));

         return view('notas3s.index',compact('notas','detallesList'));
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
}
