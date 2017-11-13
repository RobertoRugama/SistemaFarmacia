<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\LaboratoryFormRequest;
use SistemaFarmacia\App\Http\Requests;
use \App\Laboratory;
use App\Http\Controllers\Session;
use App\Http\Requests\TaskRequest;

use DB;
use Exception;
use Alert;  

class LaboratoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response

     */
    public function __construct(){

   }
    public function index(Request $request)
    {
        if ($request) {
            $query=trim($request ->get('searchText'));
            $laboratories=DB::table('laboratories')->where('name','LIKE','%'.$query.'%')
            ->where('status','=','1')
            ->orderBy('id','desc')->paginate(7);
            return view('laboratory.index',["laboratories"=>$laboratories,"searchText"=>$query]);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('laboratory.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(LaboratoryFormRequest $request)
    {
         try{
            $lab = new Laboratory;
            $lab ->status=1;
            $lab->name = $request->get('name');
            $lab->type= $request->get('type');
            $lab->location= $request->get('location');
         if ($lab->save()) {
            Alert::success('Success Message', 'Guardado con exito')->persistent('Close'); 
            return Redirect('laboratory');
         }else{ 
          Alert::error('Error Message', 'Error al guardar el registro');
         }
      }catch(Exception $e){
        Alert::error('Error Message', 'Error en la data insertar Verificar si hay campos vacios'.$e)->persistent('close');
           return redirect()->route('laboratory.create');
      }
     
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Laboratory  $laboratory
     * @return \Illuminate\Http\Response
     */
    public function show( $id)
    {
        return view("laboratory.show",["laboratory"=>Laboratory::findOrFail($id)]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Laboratory  $laboratory
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view("laboratory.edit",["laboratory"=>Laboratory::findOrFail($id)]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Laboratory  $laboratory
     * @return \Illuminate\Http\Response
     */
    public function update(LaboratoryFormRequest $request, $id)
    {
        try {
            $lab =  Laboratory::findOrFail($id);
            $lab->name=$request->get('name');
            $lab->type=$request->get('type');
            $lab->location=$request->get('location');
            if ($lab->update()) {
                Alert::success('Success Message','Registro ha sido Modificado')->persistent('close');
                return redirect('laboratory');

            }else{
                Alert::warning('Warning Message','Error al Modificar el Registro')->persistent(3500);
            }
            
        } catch (Exception $e) {

         Alert::error('Error Message', 'Error en la data insertar Verificar si hay campos vacios')->persistent(3500);
          
           return redirect()->route('laboratory.create');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Laboratory  $laboratory
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id)
    {
        try {
            $lab = Laboratory::findOrFail($id);
            $lab->status=0;
            if ($lab->update()) {
                Alert::success('Success Message', 'El registro ha sido Eliminado')->persistent(3500);
                return Redirect('laboratory');
            }else{
                Alert::warning('Warning Message', 'Alerta No se pudo eliminar el Registro')->persistent(3500);
                 return Redirect('laboratory');
            }
            
        } catch (Exception $e) {
            
             return Redirect()->route('laboratory');
            
        }
    }
}
