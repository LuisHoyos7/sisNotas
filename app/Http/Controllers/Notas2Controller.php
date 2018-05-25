<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateNotas2Request;
use App\Http\Requests\UpdateNotas2Request;
use App\Repositories\Notas2Repository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade as PDF;
use App\Models\Notas2;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class Notas2Controller extends AppBaseController
{
    /** @var  Notas2Repository */
    private $notas2Repository;

    public function __construct(Notas2Repository $notas2Repo)
    {
        $this->notas2Repository = $notas2Repo;
    }

    /**
     * Display a listing of the Notas2.
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
         

         $notas = Notas2::orderBy('id','DESC')
         ->id($id_asignatura)
         ->grupo($grupo)
         ->corte2($parametro1,$parametro2)
         ->paginate(10);

         $pdfs = Notas2::orderBy('id','DESC')
         ->id($id_asignatura)
         ->grupo($grupo)
         ->corte2($parametro1,$parametro2)
         ->paginate(6000);

         $detallesList = \DB::table('notas2s')->select(['id_asignatura','asignatura' ,'grupo'])->get();
         

         session()->put('search',compact('pdfs','detallesList'));

         return view('notas2s.index',compact('notas','detallesList'));
    }

    /**
     * Show the form for creating a new Notas2.
     *
     * @return Response
     */
    public function create()
    {
        return view('notas2s.create');
    }

    /**
     * Store a newly created Notas2 in storage.
     *
     * @param CreateNotas2Request $request
     *
     * @return Response
     */
    public function store(CreateNotas2Request $request)
    {
        $input = $request->all();

        $notas2 = $this->notas2Repository->create($input);

        Flash::success('Notas2 saved successfully.');

        return redirect(route('notas2s.index'));
    }

    /**
     * Display the specified Notas2.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $notas2 = $this->notas2Repository->findWithoutFail($id);

        if (empty($notas2)) {
            Flash::error('Notas2 not found');

            return redirect(route('notas2s.index'));
        }

        return view('notas2s.show')->with('notas2', $notas2);
    }

    /**
     * Show the form for editing the specified Notas2.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $notas2 = $this->notas2Repository->findWithoutFail($id);

        if (empty($notas2)) {
            Flash::error('Notas2 not found');

            return redirect(route('notas2s.index'));
        }

        return view('notas2s.edit')->with('notas2', $notas2);
    }

    /**
     * Update the specified Notas2 in storage.
     *
     * @param  int              $id
     * @param UpdateNotas2Request $request
     *
     * @return Response
     */
    public function update($id, UpdateNotas2Request $request)
    {
        $notas2 = $this->notas2Repository->findWithoutFail($id);

        if (empty($notas2)) {
            Flash::error('Notas2 not found');

            return redirect(route('notas2s.index'));
        }

        $notas2 = $this->notas2Repository->update($request->all(), $id);

        Flash::success('Notas2 updated successfully.');

        return redirect(route('notas2s.index'));
    }

    /**
     * Remove the specified Notas2 from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $notas2 = $this->notas2Repository->findWithoutFail($id);

        if (empty($notas2)) {
            Flash::error('Notas2 not found');

            return redirect(route('notas2s.index'));
        }

        $this->notas2Repository->delete($id);

        Flash::success('Notas2 deleted successfully.');

        return redirect(route('notas2s.index'));
    }

    public function pdf(Request $request)
    {        
        $pdf = PDF::loadView('reportes.notas2', session('search'));
        return $pdf->stream();
        //return $pdf->download('listado.pdf');
    }

}
