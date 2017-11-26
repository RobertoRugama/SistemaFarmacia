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
        $products  = Product::paginate(5);
        $records = array(
            'employees'  => $employees,
            'products'   => $products
        );
        return response()->json([
            'records'  => $records
        ]);
    }
    public function store(Request $request){
        
        $selectedEmployeeId = $request->selectedEmployeeId;
        $customerName = $request->customerName;
        $products = $request->products;
        $generalSubtotal = $request->generalSubtotal;
        $generalTax = $request->generalTax;
        $generalTotal = $request->generalTotal;

        $invoice = new Invoice;
        $invoice->customer_name = $customerName;
        $invoice->discount = 0.00;
        $invoice->subtotal = $generalSubtotal;
        $invoice->tax = $generalTax;
        $invoice->total = $generalTotal;
        $invoice->employee_id = $selectedEmployeeId;


         if($invoice->save()){  
             foreach($products as $detail){
                $detailInvoice = new DetailInvoice;
                $detailInvoice->product_id = $detail['id'];
                $detailInvoice->invoice_id = $invoice->id;
                $detailInvoice->quantity = $detail['quantity'];
                $detailInvoice->unit_price = $detail['unitPrice'];
                $detailInvoice->subtotal = $detail['subtotal'];
                $detailInvoice->tax = $detail['tax'];
                $detailInvoice->total = $detail['total'];
                $detailInvoice->save();
             }
         }
    }
}
