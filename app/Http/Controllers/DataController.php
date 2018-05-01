<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Input;
use App\Models\Notas;
use DB;
use Session;
use Excel;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class DataController extends Controller
{
    public function importData(Request $request)
    {
        Excel::load($request->excel, function($reader) {
    
            $excel = $reader->get();

            $reader->each(function($row) {
                $user = new Notas;
                $user->id_asignatura = $row['id_asignatura'];
                $user->asignatura = $row['asignatura'];
                $user->grupo = $row['grupo'];
                $user->docente = $row['docente'];
                $user->id_estudiante = $row['id_estudiante'];
                $user->estudiante = $row['estudiante'];
                $user->corte1 = $row['corte1'];
                $user->corte2 = $row['corte2'];
                $user->corte3 = $row['corte3'];
                $user->save();
    
            });
        
        });

        Flash::success('Archivo Cargado Satisfactoriamente.');
        return redirect(route('notas.index'));
    }
}
