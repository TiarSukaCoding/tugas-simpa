<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SupplierController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        $data_supplier = \App\Models\Supplier::where('deleted', 'LIKE', '0')->get();
        return view('supplier.index', ['data_supplier' => $data_supplier]);
    }

    public function create(Request $request)
    {
        \App\Models\Supplier::create($request->all());
        return redirect('/home/supplier')->with('sucsses', 'Data Berhasil diInput');
    }

    public function edit($id)
    {
        $supplier = \App\Models\Supplier::find($id);
        return view('supplier.edit', ['supplier' => $supplier]);
    }

    public function update(Request $request, $id)
    {
        $supplier = \App\Models\Supplier::find($id);
        $supplier->update($request->all());
        return redirect('/home/supplier')->with('sucsses', 'Data Berhasil diUpdate');
    }

    public function delete(Request $request, $id)
    {
        $supplier = \App\Models\Supplier::find($id);
        $supplier->update($request->all());
        return redirect('/home/supplier', ['supplier' => $supplier])->with('sucsses', 'Data Berhasil diDelete');
    }
}
