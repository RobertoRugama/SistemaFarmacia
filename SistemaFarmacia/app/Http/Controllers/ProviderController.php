<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use SistemaFarmacia\App\Http\Requests;
use SistemaFarmacia\App\Http\Requests\Provider;
use SistemaFarmacia\Http\Request\ProviderFormRequest;
use DB;

class ProviderController extends Controller
{
   public function __construct(){

   }

   public function index(Request $request){

   		if ($request) {
   			# code..$
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
	   	$provider = new Provider;
	   	$provider->status='1';
	   	$provider->ruc=$request->get('ruc');
	   	$provider->name=$request->get('name');
	   	$provider->address=$request->get('address');
	   	$provider->save();
	   	return Redirect::to('provider');
	   }

   public function show($id){
   	return view("provider.show",["provider"=>Provider::findOrFail($id)]);
   }
   public function edit($id){
   	return view("provider.edit",["provider"=>Provider::findOrFail($id)]);
   }

   public function update(ProviderFormRequest $request, $id){
   		$provider=Provider::findOrFail($id);
   		$provider->status='true';
	   	$provider->ruc=$request->get('ruc');
	   	$provider->name=$request->get('name');
	   	$provider->address=$request->get('address');
	   	$provider->update();
	   	return Redirect::to('provider');
   }
   public function destroy(){
   	$provider=Providers::findOrFail($id);
   	$provider->status = flase;
   	$provider->update();
   	return Redirect::to('provider');
   }
}
