<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PegawaiController extends Controller
{
    public function index()
    {
    	$pegawais = DB::select('SELECT pegawai.id as PegawaiID, pegawai.nama_lengkap as NamaLengkap, lokasi.nama as NamaLokasi, golongan.nama as NamaGolongan, pegawai.deleted as Status from pegawai inner join lokasi ON pegawai.lokasi_id = lokasi.id INNER JOIN golongan ON pegawai.golongan_id = golongan.id');	


    	return view('kepegawaian/pegawai', compact('pegawais'));
    	// dd($pegawais);
    }
    public function tambahpegawai()
    {
    	$ptkps = DB::table('ptkp') ->where('deleted', 0)->get();
    	$lokasis = DB::table('lokasi') ->where('deleted', 0)->get();
    	$unitkerjas = DB::table('unitkerja') ->where('deleted', 0)->get();
    	$posisis = DB::table('posisi') ->where('deleted', 0)->get();
    	$jabatans = DB::table('jabatan') ->where('deleted', 0)->get();
    	$golongans = DB::table('golongan') ->where('deleted', 0)->get();
    	$jenispegawais = DB::table('jenispegawai') ->where('deleted', 0)->get();
    	$tipepegawais = DB::table('tipepegawai') ->where('deleted', 0)->get();

    	$data['lokasis']=$lokasis;
    	$data['unitkerjas']=$unitkerjas;
    	$data['ptkps']=$ptkps;
    	$data['posisis']=$posisis;
    	$data['jabatans']=$jabatans;
    	$data['golongans']=$golongans;
    	$data['jenispegawais']=$jenispegawais;
    	$data['tipepegawais']=$tipepegawais;

    	return view('kepegawaian/tambahpegawai', $data );
    	// dd($unitkerjas);
    }
    public function addpegawai(Request $request)
    {
    	$this -> validate($request, [
            'nomorKTP' => 'required',
            'nama' => 'required',
            'ptkp' => 'required'
        ]);

        DB::table('pegawai') -> insert([
            'nomorKTP' => $request -> nomorKTP,
            'NIP' => $request -> NIP,
            'nama_lengkap' => $request -> nama,
            'nama_panggilan' => $request -> namapanggilan,
            'jenis_kelamin' => $request -> jeniskelamin,
            'ptkp_id' => $request -> ptkp,
            'lokasi_id' => $request -> lokasi,
            'unitkerja_id' => $request -> unitkerja,
            'posisi_id' => $request -> posisi,
            'jabatan_id' => $request -> jabatan,
            'golongan_id' => $request -> golongan,
            'jenispegawai_id' => $request -> jenispegawai,
            'tipepegawai_id' => $request -> tipepegawai,
            'tempat_lahir' => $request -> tempatlahir,
            'tanggal_lahir' => $request -> date,
            'agama' => $request -> agama,
            'berat_badan' => $request -> beratbadan,
            'tinggi_badan' => $request -> tinggibadan,
            'NPWP' => $request -> NPWP,
            'alamat' => $request -> alamat,
            'kode_pos' => $request -> kodepos,
            'alamat_domisili' => $request -> domisili,
            'telfon' => $request -> telfon,
            'email' => $request -> email,
            'nomor_rek' => $request -> rekening,
            'referensi' => $request -> referensi,
            'tanggal_masuk' => $request -> tglmasuk,
            'uraian_tugas' => $request -> tugas

        ]);
        // alihkan halaman tambah buku ke halaman books
        return redirect('kepegawaian/pegawai') -> with('status', 'Tipe Pegawai berhasil ditambahkan');
    }
}
