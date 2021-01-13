<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BooksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // echo "Buku";
        // mengambil data dari table books
        $books = DB::table('books') -> get();  
        // mengirim data books ke view books
        return view('toko/books', ['books' => $books]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('toko/create');
    }

    public function add(Request $request)
    {
        $this -> validate($request, [
            'name' => 'required',
            'type' => 'required',
            'stock' => 'required',
            'writer' => 'required',
            'publisher' => 'required',
            'date' => 'required'
        ]);

        DB::table('books') -> insert([
            'nama_buku' => $request -> name,
            'tipe_buku' => $request -> type,
            'stock_buku' => $request -> stock,
            'penulis' => $request -> writer,
            'penerbit' => $request -> publisher,
            'tanggal_terbit' => $request -> date
        ]);
        // alihkan halaman tambah buku ke halaman books
        return redirect('/toko/books') -> with('status', 'Data Buku Berhasil Ditambahkan');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // untuk validasi form
        $this -> validate($request, [
            'name' => 'required',
            'type' => 'required',
            'stock' => 'required',
            'writer' => 'required',
            'publisher' => 'required',
            'date' => 'required'
        ]);
        // insert data ke table books
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // mengambil data books berdasarkan id yang dipilih
        $book = DB::table('books')->where('id',$id)->first();
        // passing data books yang didapat ke view edit.blade.php
        return view('/toko/edit', compact('book'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        // untuk validasi form
        $this -> validate($request, [
            'name' => 'required',
            'type' => 'required',
            'stock' => 'required',
            'writer' => 'required',
            'publisher' => 'required',
            'date' => 'required'
        ]);
        // update data books
        DB::table('books') -> where('id', $request -> id) -> update([
            'nama_buku' => $request -> name,
            'tipe_buku' => $request -> type,
            'stock_buku' => $request -> stock,
            'penulis' => $request -> writer,
            'penerbit' => $request -> publisher,
            'tanggal_terbit' => $request -> date
        ]);
        // alihkan halaman edit ke halaman books
        return redirect('/toko/books') -> with('status', 'Data Buku Berhasil DiUbah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // menghapus data books berdasarkan id yang dipilih
        DB::table('books') -> where('id', $id) -> delete();
        // Alihkan ke halaman books
        return redirect('/toko/books') -> with('status', 'Data Buku Berhasil DiHapus');
    }

    public function beli()
    {
        $books = DB::table('books') -> get();  
        // mengirim data books ke view books
        return view('toko/beli', ['books' => $books]);
    }

    public function beli_ajax(Request $request)
    {
        $book = DB::table('books')->where('id',$request->id)->first();

        return json_encode($book);
    }
    public function beli_buku(Request $request)
    {

        $this -> validate($request, [
            'myselect' => 'required',
            'stock' => 'required'
        ]);

        $books = DB::table('books') -> where('id',$request->myselect)->first();
        $stockLama=$books->stock_buku;
        $stockBaru=(int)$request->stock;

        $hitung = $stockLama+$stockBaru;
        // // update data books
        DB::table('books') -> where('id', $request->myselect) -> update([
            'stock_buku' => $hitung
        ]);
        //alihkan halaman edit ke halaman books
        return redirect('/toko/books') -> with('status', 'Buku telah dibeli');
        // dd($hitung);
        // var_dump($request);
    }

    public function datatabel()
    {
        $books = DB::table('books') -> get();  
        // mengirim data books ke view books
        return view('toko/datatabel', ['books' => $books]);
    }
}
