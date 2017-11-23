<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App;
use App\Employee;
use App\Invoice;
use App\Product;
use App\DetailInvoice;

class InvoiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('invoice.index');
    }

    public function getDataForShow(Request $request){

        $employees = Employee::all();
        $products  = Product::all();
        $records = array(
            'employees'  => $employees,
            'products'   => $products
        );
        return response()->json([
            'records'  => $records
        ]);
    }
}
