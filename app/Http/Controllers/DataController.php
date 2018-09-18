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

                }else{
                     Flash::success('Archivo no se  Cargo Satisfactoriamente.');
                }

            }

        }

             return redirect(route('notas.index'));

    } 

    public function importFile2(Request $request){

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

                    DB::table('notas2s')->insert($arr);

                    Flash::success('Archivo Cargado Satisfactoriamente.');
                    return redirect(route('notas2s.index'));

                }else{
                    Flash::success('Archivo no se  Cargo Satisfactoriamente.');
                }

            }

        }

              return redirect(route('notas2s.index'));

    } 

    public function importFile3(Request $request){

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

                    DB::table('notas3s')->insert($arr);

                    Flash::success('Archivo Cargado Satisfactoriamente.');
                    return redirect(route('notas3s.index'));

                }else{
                    Flash::success('Archivo no se  Cargo Satisfactoriamente.');
                }

            }

        }

        return redirect(route('notas3s.index'));      

    }


    public function LimpiarTablas(){


        
        \DB::table('periodos')->truncate();
        \DB::table('seguimientos')->truncate();
        \DB::table('notas')->truncate();
        \DB::table('notas2s')->truncate();
        \DB::table('notas3s')->truncate();

        return view('periodos.create');

    }
}
