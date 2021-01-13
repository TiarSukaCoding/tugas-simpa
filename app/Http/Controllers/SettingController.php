<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;


class SettingController extends Controller
{
    public function index()
    {
    	return view('setting/setting');
    }
    public function perusahaan()
    {
    	$perusahaans = DB::table('perusahaan') -> get();  
        return view('setting/perusahaan', ['perusahaan' => $perusahaans]);
    }
    public function tampilperusahaan(Request $request)
    {
    	$perusahaans = DB::table('perusahaan')->where('id',$request->id)->first();
        return json_encode($perusahaans);
    }
    public function update(Request $request)
    {
        // untuk validasi form
        $this -> validate($request, [
            'nama' => 'required',
            'telfon' => 'required',
            'email' => 'required',
            'npwp' => 'required',
            'pilih' => 'required'
        ]);
        // update data books
        DB::table('perusahaan') -> where('id', $request -> id) -> update([
            'nama' => $request -> nama,
            'telfon' => $request -> telfon,
            'email' => $request -> email,
            'NPWP' => $request -> npwp,
            'PPH' => $request -> pilih
        ]);
        // alihkan halaman edit ke halaman books
        return redirect('/setting/perusahaan') -> with('status', 'Data telah diupdate');
    }
//lokasi
    public function lokasi()
    {
    	$lokasis = DB::table('lokasi') ->where('deleted', 0)->get();
        return view('setting/lokasi', ['lokasis' => $lokasis]);
    }
    public function tambahlokasi(Request $request)
    {
    	$this -> validate($request, [
            'kode' => 'required',
            'lokasi' => 'required',
            'telfon' => 'required',
            'email' => 'required',
            'alamat' => 'required',
            'npwp' => 'required'
        ]);

        DB::table('lokasi') -> insert([
            'nama' => $request -> lokasi,
            'kode' => $request -> kode,
            'telfon' => $request -> telfon,
            'email' => $request -> email,
            'alamat' => $request -> alamat,
            'NPWP' => $request -> npwp
        ]);
        // alihkan halaman tambah buku ke halaman books
        return redirect('/setting/lokasi') -> with('status', 'Lokasi berhasil ditambahkan');
    }
    public function destroyLokasi($id)
    {
        // menghapus data books berdasarkan id yang dipilih
         DB::table('lokasi') -> where('id', $id) -> update([
            'deleted' => 1 
        ]);
        // Alihkan ke halaman books
        return redirect('/setting/lokasi') -> with('status', 'Data Lokasi Berhasil Dihapus');
    }
    public function editlokasi($id)
    {
        // mengambil data books berdasarkan id yang dipilih
        $lokasis = DB::table('lokasi')->where('id',$id)->first();
        // passing data books yang didapat ke view edit.blade.php
        return view('/setting/edit_lokasi', compact('lokasis'));
    }
    public function updatelokasi(Request $request)
    {
        // untuk validasi form
        $this -> validate($request, [
            'nama' => 'required',
            'kode' => 'required',
            'telfon' => 'required',
            'email' => 'required',	
            'alamat' => 'required',
            'npwp' => 'required'
        ]);
        // update data books
        DB::table('lokasi') -> where('id', $request -> id) -> update([
            'nama' => $request -> nama,
            'kode' => $request -> kode,
            'telfon' => $request -> telfon,
            'email' => $request -> email,
            'alamat' => $request -> alamat,
            'NPWP' => $request -> npwp
        ]);
        // alihkan halaman edit ke halaman books
        return redirect('/setting/lokasi') -> with('status', 'Data telah diupdate');
    }
//jabatan
    public function jabatan()
    {
    	$jabatans = DB::table('jabatan') ->where('deleted', 0)->get();
        return view('setting/jabatan', ['jabatans' => $jabatans]);
    }
    public function tambahjabatan(Request $request)
    {
    	$this -> validate($request, [
            'jabatan' => 'required'
        ]);

        DB::table('jabatan') -> insert([
            'nama' => $request -> jabatan
        ]);
        // alihkan halaman tambah buku ke halaman books
        return redirect('/setting/jabatan') -> with('status', 'Jabatan berhasil ditambahkan');
    }
    public function editjabatan($id)
    {
        // mengambil data books berdasarkan id yang dipilih
        $jabatans = DB::table('jabatan')->where('id',$id)->first();
        // passing data books yang didapat ke view edit.blade.php
        return view('/setting/edit_jabatan', compact('jabatans'));
    }
    public function updatejabatan(Request $request)
    {
        // untuk validasi form
        $this -> validate($request, [
            'nama' => 'required'
        ]);
        // update data books
        DB::table('jabatan') -> where('id', $request -> id) -> update([
            'nama' => $request -> nama
        ]);
        // alihkan halaman edit ke halaman books
        return redirect('/setting/jabatan') -> with('status', 'Data telah diupdate');
    }
    public function destroyJabatan($id)
    {
        // menghapus data books berdasarkan id yang dipilih
        DB::table('jabatan') -> where('id', $id) -> update([
            'deleted' => 1 
        ]);
        // Alihkan ke halaman books
        return redirect('/setting/jabatan') -> with('status', 'Data Jabatan Berhasil Dihapus');
    }
//Dokumen
    public function dokumen()
    {
    	$dokumens = DB::table('dokumen') ->where('deleted', 0)->get();
        return view('setting/dokumen', ['dokumens' => $dokumens]);
    }
    public function tambahdokumen(Request $request)
    {
    	$this -> validate($request, [
            'dokumen' => 'required'

        ]);

        DB::table('dokumen') -> insert([
            'nama' => $request -> dokumen
        ]);
        // alihkan halaman tambah buku ke halaman books
        return redirect('/setting/dokumen') -> with('status', 'Dokumen berhasil ditambahkan');
    }
    public function editdokumen($id)
    {
        // mengambil data books berdasarkan id yang dipilih
        $dokumens = DB::table('dokumen')->where('id',$id)->first();
        // passing data books yang didapat ke view edit.blade.php
        return view('/setting/edit_dokumen', compact('dokumens'));
    }
    public function updatedokumen(Request $request)
    {
        // untuk validasi form
        $this -> validate($request, [
            'nama' => 'required'
        ]);
        // update data books
        DB::table('dokumen') -> where('id', $request -> id) -> update([
            'nama' => $request -> nama
        ]);
        // alihkan halaman edit ke halaman books
        return redirect('/setting/dokumen') -> with('status', 'Data telah diupdate');
    }
    public function destroydokumen($id)
    {
        // menghapus data books berdasarkan id yang dipilih
        DB::table('dokumen') -> where('id', $id) -> update([
            'deleted' => 1 
        ]);
        // Alihkan ke halaman books
        return redirect('/setting/dokumen') -> with('status', 'Data Dokumen Berhasil Dihapus');
    }
//Pendidikan
    public function pendidikan()
    {
    	$pendidikans = DB::table('pendidikan') ->where('deleted', 0)->get();
        return view('setting/pendidikan', ['pendidikans' => $pendidikans]);
    }
    public function tambahpendidikan(Request $request)
    {
    	$this -> validate($request, [
            'pendidikan' => 'required'

        ]);

        DB::table('pendidikan') -> insert([
            'nama' => $request -> pendidikan
        ]);
        // alihkan halaman tambah buku ke halaman books
        return redirect('/setting/pendidikan') -> with('status', 'Pendidikan berhasil ditambahkan');
    }
    public function editpendidikan($id)
    {
        // mengambil data books berdasarkan id yang dipilih
        $pendidikans = DB::table('pendidikan')->where('id',$id)->first();
        // passing data books yang didapat ke view edit.blade.php
        return view('/setting/edit_pendidikan', compact('pendidikans'));
    }
    public function updatependidikan(Request $request)
    {
        // untuk validasi form
        $this -> validate($request, [
            'nama' => 'required'
        ]);
        // update data books
        DB::table('pendidikan') -> where('id', $request -> id) -> update([
            'nama' => $request -> nama
        ]);
        // alihkan halaman edit ke halaman books
        return redirect('/setting/pendidikan') -> with('status', 'Data telah diupdate');
    }
    public function destroypendidikan($id)
    {
        // menghapus data books berdasarkan id yang dipilih
        DB::table('pendidikan') -> where('id', $id) -> update([
            'deleted' => 1 
        ]);
        // Alihkan ke halaman books
        return redirect('/setting/pendidikan') -> with('status', 'Data Pendidikan Berhasil Dihapus');
    }
//tipepegawai
    public function tipepegawai()
    {
    	$tipepegawais = DB::table('tipepegawai') ->where('deleted', 0)->get();
        return view('setting/tipepegawai', ['tipepegawais' => $tipepegawais]);
    }
    public function tambahtipepegawai(Request $request)
    {
    	$this -> validate($request, [
            'tipepegawai' => 'required'

        ]);

        DB::table('tipepegawai') -> insert([
            'nama' => $request -> tipepegawai
        ]);
        // alihkan halaman tambah buku ke halaman books
        return redirect('/setting/tipepegawai') -> with('status', 'Tipe Pegawai berhasil ditambahkan');
    }
    public function edittipepegawai($id)
    {
        // mengambil data books berdasarkan id yang dipilih
        $tipepegawais = DB::table('tipepegawai')->where('id',$id)->first();
        // passing data books yang didapat ke view edit.blade.php
        return view('/setting/edit_tipepegawai', compact('tipepegawais'));
    }
    public function updatetipepegawai(Request $request)
    {
        // untuk validasi form
        $this -> validate($request, [
            'nama' => 'required'
        ]);
        // update data books
        DB::table('tipepegawai') -> where('id', $request -> id) -> update([
            'nama' => $request -> nama
        ]);
        // alihkan halaman edit ke halaman books
        return redirect('/setting/tipepegawai') -> with('status', 'Data telah diupdate');
    }
    public function destroytipepegawai($id)
    {
        // menghapus data books berdasarkan id yang dipilih
        DB::table('tipepegawai') -> where('id', $id) -> update([
            'deleted' => 1 
        ]);
        // Alihkan ke halaman books
        return redirect('/setting/tipepegawai') -> with('status', 'Data Tipe Pegawai Berhasil Dihapus');
    }
//jenispegawai
    public function jenispegawai()
    {
    	$jenispegawais = DB::table('jenispegawai') ->where('deleted', 0)->get();
        return view('setting/jenispegawai', ['jenispegawais' => $jenispegawais]);
    }
    public function tambahjenispegawai(Request $request)
    {
    	$this -> validate($request, [
            'jenispegawai' => 'required'

        ]);

        DB::table('jenispegawai') -> insert([
            'nama' => $request -> jenispegawai
        ]);
        // alihkan halaman tambah buku ke halaman books
        return redirect('/setting/jenispegawai') -> with('status', 'Jenis Pegawai berhasil ditambahkan');
    }
    public function editjenispegawai($id)
    {
        // mengambil data books berdasarkan id yang dipilih
        $jenispegawais = DB::table('jenispegawai')->where('id',$id)->first();
        // passing data books yang didapat ke view edit.blade.php
        return view('/setting/edit_jenispegawai', compact('jenispegawais'));
    }
    public function updatejenispegawai(Request $request)
    {
        // untuk validasi form
        $this -> validate($request, [
            'nama' => 'required'
        ]);
        // update data books
        DB::table('jenispegawai') -> where('id', $request -> id) -> update([
            'nama' => $request -> nama
        ]);
        // alihkan halaman edit ke halaman books
        return redirect('/setting/jenispegawai') -> with('status', 'Data telah diupdate');
    }
    public function destroyjenispegawai($id)
    {
        // menghapus data books berdasarkan id yang dipilih
        DB::table('jenispegawai') -> where('id', $id) -> update([
            'deleted' => 1 
        ]);
        // Alihkan ke halaman books
        return redirect('/setting/jenispegawai') -> with('status', 'Data Jenis Pegawai Berhasil Dihapus');
    }
//golongan
    public function golongan()
    {
    	$golongans = DB::table('golongan') ->where('deleted', 0)->get();
        return view('setting/golongan', ['golongans' => $golongans]);
    }
    public function tambahgolongan(Request $request)
    {
    	$this -> validate($request, [
            'golongan' => 'required'

        ]);

        DB::table('golongan') -> insert([
            'nama' => $request -> golongan
        ]);
        // alihkan halaman tambah buku ke halaman books
        return redirect('/setting/golongan') -> with('status', 'Golongan berhasil ditambahkan');
    }
    public function editgolongan($id)
    {
        // mengambil data books berdasarkan id yang dipilih
        $golongans = DB::table('golongan')->where('id',$id)->first();
        // passing data books yang didapat ke view edit.blade.php
        return view('/setting/edit_golongan', compact('golongans'));
    }
    public function updategolongan(Request $request)
    {
        // untuk validasi form
        $this -> validate($request, [
            'nama' => 'required'
        ]);
        // update data books
        DB::table('golongan') -> where('id', $request -> id) -> update([
            'nama' => $request -> nama
        ]);
        // alihkan halaman edit ke halaman books
        return redirect('/setting/golongan') -> with('status', 'Data telah diupdate');
    }
    public function destroygolongan($id)
    {
        // menghapus data books berdasarkan id yang dipilih
        DB::table('golongan') -> where('id', $id) -> update([
            'deleted' => 1 
        ]);
        // Alihkan ke halaman books
        return redirect('/setting/golongan') -> with('status', 'Data Golongan Berhasil Dihapus');
    }
//komponengaji
    public function komponengaji()
    {
    	$komponengajis = DB::table('komponengaji') ->where('deleted', 0)->get();
        return view('setting/komponengaji', ['komponengajis' => $komponengajis]);
    }
    public function tambahkomponengaji(Request $request)
    {
    	$this -> validate($request, [
            'komponengaji' => 'required',
            'jenis' => 'required',
            'kategori' => 'required'
        ]);

        DB::table('komponengaji') -> insert([
            'nama' => $request -> komponengaji,
            'jenis' => $request -> jenis,
            'kategori' => $request -> kategori,
            'var1' => $request -> var1,
            'var2' => $request -> var2,
            'var3' => $request -> var3,
            'var5' => $request -> var5,
            'var6' => $request -> var6
        ]);
        // alihkan halaman tambah buku ke halaman books
        return redirect('/setting/komponengaji') -> with('status', 'Komponen Gaji berhasil ditambahkan');
    }
    public function editkomponengaji($id)
    {
        // mengambil data books berdasarkan id yang dipilih
        $komponengajis = DB::table('komponengaji')->where('id',$id)->first();
        // passing data books yang didapat ke view edit.blade.php
        return view('/setting/edit_komponengaji', compact('komponengajis'));
    }
    public function updatekomponengaji(Request $request)
    {
    	// dd($request);
        // untuk validasi form
        $this -> validate($request, [
            'komponengaji' => 'required',
            'jenis' => 'required',
            'kategori' => 'required'
        ]);
        // update data books
        DB::table('komponengaji') -> where('id', $request -> id) -> update([
            'nama' => $request -> komponengaji,
            'jenis' => $request -> jenis,
            'kategori' => $request -> kategori,
            'var1' => $request -> var1,
            'var2' => $request -> var2,
            'var3' => $request -> var3,
            'var5' => $request -> var5,
            'var6' => $request -> var6
        ]);
        // alihkan halaman edit ke halaman books
        // dd($request);
        return redirect('/setting/komponengaji') -> with('status', 'Data telah diupdate');
    }
    public function destroykomponengaji($id)
    {
        // menghapus data books berdasarkan id yang dipilih
        DB::table('komponengaji') -> where('id', $id) -> update([
            'deleted' => 1 
        ]);
        // Alihkan ke halaman books
        return redirect('/setting/komponengaji') -> with('status', 'Data Komponen Gaji Berhasil Dihapus');
    }
//ptkp
    public function ptkp()
    {
    	$ptkps = DB::table('ptkp') ->where('deleted', 0)->get();
        return view('setting/ptkp', ['ptkps' => $ptkps]);
    }
    public function tambahptkp(Request $request)
    {
    	$this -> validate($request, [
            'ptkp' => 'required',
            'deskripsi' => 'required',
            'nominal' => 'required'
        ]);

        DB::table('ptkp') -> insert([
            'daerah' => $request -> daerah,
            'nama' => $request -> ptkp,
            'deskripsi' => $request -> deskripsi,
            'nominal' => $request -> nominal
        ]);
        // alihkan halaman tambah buku ke halaman books
        return redirect('/setting/ptkp') -> with('status', 'PTKP berhasil ditambahkan');
    }
    public function editptkp($id)
    {
        // mengambil data books berdasarkan id yang dipilih
        $ptkps = DB::table('ptkp')->where('id',$id)->first();
        // passing data books yang didapat ke view edit.blade.php
        return view('/setting/edit_ptkp', compact('ptkps'));
    }
    public function updateptkp(Request $request)
    {
    	// dd($request);
        // untuk validasi form
        $this -> validate($request, [
            'ptkp' => 'required',
            'deskripsi' => 'required',
            'nominal' => 'required'
        ]);
        // update data books
        DB::table('ptkp') -> where('id', $request -> id) -> update([
           	'daerah' => $request -> daerah,
            'nama' => $request -> ptkp,
            'deskripsi' => $request -> deskripsi,
            'nominal' => $request -> nominal
        ]);
        // alihkan halaman edit ke halaman books
        // dd($request);
        return redirect('/setting/ptkp') -> with('status', 'Data telah diupdate');
    }
    public function destroyptkp($id)
    {
        // menghapus data books berdasarkan id yang dipilih
        DB::table('ptkp') -> where('id', $id) -> update([
            'deleted' => 1 
        ]);
        // Alihkan ke halaman books
        return redirect('/setting/ptkp') -> with('status', 'Data PTKP Berhasil Dihapus');
    }
//unitkerja
    public function unitkerja()
    {
    	$unitkerjas = DB::table('unitkerja') ->where('deleted', 0)->get();
        return view('setting/unitkerja', ['unitkerjas' => $unitkerjas]);
    }
    public function tambahunitkerja(Request $request)
    {
    	$this -> validate($request, [
            'divisi' => 'required',
            'keterangan' => 'required',
            'kepala' => 'required'
        ]);

        DB::table('unitkerja') -> insert([
            'nama' => $request -> divisi,
            'keterangan' => $request -> keterangan,
            'parent' => $request -> kepala
        ]);
        // alihkan halaman tambah buku ke halaman books
        return redirect('/setting/unitkerja') -> with('status', 'Unit Kerja berhasil ditambahkan');
    }
    public function editunitkerja($id)
    {
        // mengambil data books berdasarkan id yang dipilih
        $unitkerjas = DB::table('unitkerja')->where('id',$id)->first();
        $parents = DB::select('SELECT * FROM unitkerja');
        // passing data books yang didapat ke view edit.blade.php
        return view('/setting/edit_unitkerja', compact('unitkerjas', 'parents'));
        // dd($unitkerjas);
        // dd($parents);

    }
    public function updateunitkerja(Request $request)
    {
    	// dd($request);
        // untuk validasi form
        $this -> validate($request, [
            'nama' => 'required',
            'keterangan' => 'required',
            'kepala' => 'required',
            'deleted' => 'required'
        ]);
        // update data books
        DB::table('unitkerja') -> where('id', $request -> id) -> update([
           	'nama' => $request -> nama,
            'keterangan' => $request -> keterangan,
            'parent' => $request -> kepala,
            'deleted' => $request -> deleted
        ]);
        // alihkan halaman edit ke halaman books
        // dd($request);
        return redirect('/setting/unitkerja') -> with('status', 'Data telah diupdate');
    }
    public function destroyunitkerja($id)
    {
        // menghapus data books berdasarkan id yang dipilih
        DB::table('unitkerja') -> where('id', $id) -> update([
            'deleted' => 1 
        ]);
        // Alihkan ke halaman books
        return redirect('/setting/unitkerja') -> with('status', 'Data Unit Kerja Berhasil Dihapus');
    }
//posisi
    public function posisi()
    {
    	$posisis = DB::table('posisi') ->where('deleted', 0)->get();
    	$unitkerjas = DB::table('unitkerja') ->where('deleted', 0)->get();

        return view('setting/posisi', ['posisis' => $posisis], ['unitkerjas' => $unitkerjas]);
    }
    public function tambahposisi(Request $request)
    {
    	$this -> validate($request, [
            'posisi' => 'required',
            'keterangan' => 'required',
            'kepala' => 'required',
            'divisi' => 'required'
        ]);

        DB::table('posisi') -> insert([
            'nama' => $request -> posisi,
            'keterangan' => $request -> keterangan,
            'parent' => $request -> kepala,
            'unitkerja_id' => $request -> divisi
        ]);
        // alihkan halaman tambah buku ke halaman books
        return redirect('/setting/posisi') -> with('status', 'Posisi berhasil ditambahkan');
    }
    public function editposisi($id)
    {
        // mengambil data books berdasarkan id yang dipilih
        $posisis = DB::table('posisi')->where('id',$id)->first();
        $parents = DB::select('SELECT * FROM posisi');
        $unitkerjas = DB::select('SELECT * FROM unitkerja');

        // passing data books yang didapat ke view edit.blade.php
        return view('/setting/edit_posisi', compact('posisis', 'parents', 'unitkerjas'));
        // dd($unitkerjas);
        // dd($parents);

    }
    public function updateposisi(Request $request)
    {
    	// dd($request);
        // untuk validasi form
        $this -> validate($request, [
            'nama' => 'required',
            'keterangan' => 'required',
            'kepala' => 'required',
            'divisi' => 'required',
            'deleted' => 'required'
        ]);
        // update data books
        DB::table('posisi') -> where('id', $request -> id) -> update([
           	'nama' => $request -> nama,
            'keterangan' => $request -> keterangan,
            'parent' => $request -> kepala,
            'unitkerja_id' => $request -> divisi,
            'deleted' => $request -> deleted
        ]);
        // alihkan halaman edit ke halaman books
        // dd($request);
        return redirect('/setting/posisi') -> with('status', 'Data telah diupdate');
    }
    public function destroyposisi($id)
    {
        // menghapus data books berdasarkan id yang dipilih
        DB::table('posisi') -> where('id', $id) -> update([
            'deleted' => 1 
        ]);
        // Alihkan ke halaman books
        return redirect('/setting/posisi') -> with('status', 'Data Posisi Berhasil Dihapus');
    }
//pengguna
    public function pengguna()
    {
        $users = DB::select('SELECT users.id as id, users.name as Username, users.level as Level, pegawai.nama_lengkap as NamaLengkap, users.email as Email, lokasi.nama as Lokasi, users.deleted as Blokir FROM users INNER JOIN pegawai ON users.pegawai_id = pegawai.id INNER JOIN lokasi on pegawai.lokasi_id = lokasi.id');
        $pegawais= DB::select('SELECT pegawai.id as id, pegawai.nama_lengkap as NamaLengkap, lokasi.nama as Lokasi FROM pegawai INNER JOIN lokasi ON pegawai.lokasi_id = lokasi.id WHERE pegawai.deleted=0');
        $unitkerjas = DB::table('unitkerja') ->where('deleted', 0)->get();


        $data['users']=$users;
        $data['pegawais']=$pegawais;
        $data['unitkerjas']=$unitkerjas;


        return view('setting/pengguna', $data);
    }
    public function tambahpengguna(Request $request)
    {
        $this -> validate($request, [
            'username' => 'required',
            'namapegawai' => 'required',
            'email' => 'required',
            'level' => 'required',
            'blokir' => 'required',
            'password' => 'required'

        ]);

        DB::table('users') -> insert([
            'name' => $request -> username,
            'pegawai_id' => $request -> namapegawai,
            'email' => $request -> email,
            'level' => $request -> level,
            'deleted' => $request -> blokir,
            'password' => Hash::make ($request -> password)

        ]);
        // alihkan halaman tambah buku ke halaman books
        return redirect('/setting/pengguna') -> with('status', 'Pengguna berhasil ditambahkan');
    }
    public function editpengguna($id)
    {
        $users = DB::table('users')->where('id',$id)->first();
        $pegawais= DB::select('SELECT pegawai.id as id, pegawai.nama_lengkap as NamaLengkap,pegawai.unitkerja_id as unitkerja_id, lokasi.nama as Lokasi FROM pegawai INNER JOIN lokasi ON pegawai.lokasi_id = lokasi.id');
        $unitkerjas = DB::select('SELECT * FROM unitkerja');

        // dd($pegawais);
        return view('/setting/edit_pengguna', compact('users', 'pegawais', 'unitkerjas'));


    }
    public function updatepengguna(Request $request)
    {
        $this -> validate($request, [
            'username' => 'required',
            'karyawan' => 'required',
            'email' => 'required',
            'level' => 'required',
            'password' => 'required'

        ]);
        // update data books
        DB::table('users') -> where('id', $request -> id) -> update([
            'name' => $request -> username,
            'pegawai_id' => $request -> karyawan,
            'email' => $request -> email,
            'level' => $request -> level,
            'password' => Hash::make ($request -> password)
        ]);
        // alihkan halaman edit ke halaman books
        // dd($request);
        return redirect('/setting/pengguna') -> with('status', 'Data telah diupdate');
    }
    public function destroypengguna($id)
    {
        $user = DB::table('users')->where('id', $id)->first();
        $deleted = $user->deleted;
        if($deleted == 0)
        {
            DB::table('users') -> where('id', $id) -> update([
                'deleted' => 1 
            ]);
        }
        else
        {
            DB::table('users') -> where('id', $id) -> update([
                'deleted' => 0
            ]);
        }
        // Alihkan ke halaman books
        return redirect('/setting/pengguna') -> with('status', 'Data Pengguna Berhasil Dihapus');
    }
}

