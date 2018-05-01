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
   
     

    public function importFile(Request $request){

        if($request->hasFile('sample_file')){

            $path = $request->file('sample_file')->getRealPath();

            $data = \Excel::load($path)->get();



            if($data->count()){

               // dd($data);

                foreach ($data as $key => $value) {

                    //dd($value);
                    //return;

                    $arr[] = [   'id_asignatura' => $value->id_asignatura,
                                 'asignatura' => $value->asignatura,
                                 'grupo' => $value->grupo,
                                 'docente'=>$value->docente,
                                 'id_estudiante'=>$value->id_estudiante,
                                 'estudiante'=> $value->estudiante,
                                 'corte1' =>$value->corte1,
                                 'corte2' =>$value->corte2,
                                 'corte3' =>$value->corte3  ];

                }

                if(!empty($arr)){

                    DB::table('notas')->insert($arr);

                    Flash::success('Archivo Cargado Satisfactoriamente.');
                    return redirect(route('notas.index'));

                }

            }

        }

        dd('Request data does not have any files to import.');      

    } 
}
