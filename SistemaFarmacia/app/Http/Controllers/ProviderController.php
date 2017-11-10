<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\ProviderFormRequest;
use SistemaFarmacia\App\Http\Requests;
use \App\Provider;
use App\Http\Controllers\Session;
use App\Http\Requests\TaskRequest;

use DB;
use Exception;
use Alert;  


class ProviderController extends Controller
{
   public function __construct(){

   }

   public function index(Request $request){

   		if ($request) {
   			$query=trim($request ->get('searchText'));
   			$providers=DB::table('providers')->where('name','LIKE','%'.$query.'%')
   			->where('status','=','1')
   			->orderBy('id','desc')->paginate(7);
   			return view('provider.index',["providers"=>$providers,"searchText"=>$query]);
   		}
   }
   public function create(){
   	return view('provider.create');
   }

   public function store(ProviderFormRequest $request){
      try{
         $provider = new Provider;
         $provider ->status=1;
	   	$provider->ruc = $request->get('ruc');
	   	$provider->name= $request->get('name');
	   	$provider->address= $request->get('address');
         if ($provider->save()) {
            Alert::success('Success Message', 'Guardado con exito')->persistent('Close'); 
            return Redirect('provider');
         }else{ 
          Alert::error('Error Message', 'Error al guardar el registro');
         }
      }catch(Exception $e){
        Alert::error('Error Message', 'Error en la data insertar Verificar si hay campos vacios')->persistent('close');
           return redirect()->route('provider.create');
      }
     
	   }

   public function show($id){
   	return view("provider.show",["provider"=>Provider::findOrFail($id)]);

   }
   public function edit($id){
      	return view("provider.edit",["provider"=>Provider::findOrFail($id)]);
   }

   public function update(ProviderFormRequest $request, $id){
   		try {
         $provider = Provider::findOrFail($id);
         $provider->ruc=$request->get('ruc');
         $provider->name=$request->get('name');
         $provider->address=$request->get('address');
         if ($provider->update()) {
            Alert::success('Success Message', 'Modificado con exito')->persistent('Close'); 
            return Redirect('provider');
            
         }else{
            Aler::error('Error Message','Error al modificar Registro');
         }
         } catch (Exception $e) {
         Alert::error('Error Message', 'Error en la data insertar Verificar si hay campos')->persistent('close');
           return redirect()->route('provider.create');
         }
	   	
   }
   public function destroy($id){
   try {
   	$provider=Provider::findOrFail($id);
   	$provider->status = 0;
      if ($provider->update()) {
            Alert::success('Success Message', 'Registro Eliminado!!!')->persistent('Close'); 
            return Redirect('provider');
            
         }else{
            Aler::error('Error Message','Error al eliminar el registro');
         }
         } catch (Exception $e) {
          
           return redirect()->route('provider');
         }
   	
   }
}
