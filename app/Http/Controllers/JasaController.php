<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class JasaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        $data_jasa = \App\Models\Jasa::where('deleted', 'LIKE', '0')->get();
        return view('jasa.index', ['data_jasa' => $data_jasa]);
    }

    public function create(Request $request)
    {
        \App\Models\Jasa::create($request->all());
        return redirect('/home/jasa')->with('sucsses', 'Data Berhasil diInput');
    }

    public function edit($id)
    {
        $jasa = \App\Models\Jasa::find($id);
        return view('jasa.edit', ['jasa' => $jasa]);
    }

    public function update(Request $request, $id)
    {
        $jasa = \App\Models\Jasa::find($id);
        $jasa->update($request->all());
        return redirect('/home/jasa')->with('sucsses', 'Data Berhasil diUpdate');
    }

    public function delete(Request $request, $id)
    {
        $jasa = \App\Models\Jasa::find($id);
        $jasa->update($request->all());
        return redirect('/home/jasa', ['jasa' => $jasa])->with('sucsses', 'Data Berhasil diDelete');
    }
}
