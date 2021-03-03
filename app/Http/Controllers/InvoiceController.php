<?php

namespace App\Http\Controllers;

use App\Http\Resources\InvoiceResource;
use App\Models\Invoice;
use Illuminate\Http\Request;

class InvoiceController extends Controller
{
    public function index(){
        $invoices = Invoice::get();
        return InvoiceResource::collection($invoices);
    }

    public function addinvoice(){

        $shortname = request('supplier_shortname');
        $invoice = request()->validate([
            'supplier_id' => 'required'
        ]);

        $invoice2 = [
            'reference' => time(),
            'note' => request('note')
        ];

        Invoice::create(array_merge($invoice2, $invoice));

        // Invoice reference logics
        $lastid = latestid('invoices');
        $reference = $lastid+1467246549808;
        $obj = Invoice::find($lastid);
        $obj->update([
            'reference' => $shortname."-".$reference
        ]);

        return response()->json([
            'message' => 'Success',
            // 'fruit' => $fruit,
        ]);
    }
}
