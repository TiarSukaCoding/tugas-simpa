<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProyekController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        $data_proyek = \App\Models\Proyek::where('deleted', 'LIKE', '0')->get();
        return view('proyek.index', ['data_proyek' => $data_proyek]);
    }

    public function create(Request $request)
    {
        \App\Models\Proyek::create($request->all());
        return redirect('/home/proyek')->with('sucsses', 'Data Berhasil diInput');
    }

    public function edit($id)
    {
        $proyek = \App\Models\Proyek::find($id);
        return view('proyek.edit', ['proyek' => $proyek]);
    }

    public function update(Request $request, $id)
    {
        $proyek = \App\Models\Proyek::find($id);
        $proyek->update($request->all());
        return redirect('/home/proyek')->with('sucsses', 'Data Berhasil diUpdate');
    }

    public function delete(Request $request, $id)
    {
        $proyek = \App\Models\Proyek::find($id);
        $proyek->update($request->all());
        return redirect('/home/proyek', ['proyek' => $proyek])->with('sucsses', 'Data Berhasil diDelete');
    }
}
