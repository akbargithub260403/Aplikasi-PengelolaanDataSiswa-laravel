<?php

namespace App\Http\Controllers;

use App\Administrasi;

use App\Student;
use App\Data;
use App\Email;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdministrasiController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Administrasi::all();

        return view('pages/administrasi',['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        Administrasi::create([
            'id_siswa'  => $request->id_siswa,
            'NISN'      => $request->NISN,
            'nama'      => $request->nama,
            'tanggal'   => $request->tanggal,
            'kelas'     => $request->kelas,
            'jurusan'   => $request->jurusan
        ]);

        return back()->with('status', 'Data Administrasi Berhasil Ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Administrasi  $administrasi
     * @return \Illuminate\Http\Response
     */
    public function show(Administrasi $administrasi)
    {
        $student = DB::table('students')
                    ->where('nama','=',$administrasi->nama)
                    ->get();
                    
        $data = DB::table('administrasi')
                    ->where('NISN','=',$administrasi->NISN)
                    ->get();
        
     return view('StudentPages/detail',['student' => $student , 'data' => $data]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Administrasi  $administrasi
     * @return \Illuminate\Http\Response
     */
    public function edit(Administrasi $administrasi)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Administrasi  $administrasi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Administrasi $administrasi)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Administrasi  $administrasi
     * @return \Illuminate\Http\Response
     */
    public function destroy(Administrasi $administrasi)
    {
        
        Administrasi::destroy($administrasi->id);

        return back()->with('status', 'Data Administrasi Berhasil Dihapus!');
    }

    // function export administrasi
    public function export($kelas)
    {


        if ($kelas == "X") {

            $administrasi = DB::table('administrasi')
                ->where('kelas','=','X')
                ->get();
            
            return view("ExportPages/administrasi",['administrasi' => $administrasi, 'kelas' => $kelas]);
                
            }elseif ($kelas == "XI") {
    
            $administrasi = DB::table('administrasi')
                ->where('kelas','=','XI')
                ->get();
            return view("ExportPages/administrasi",['administrasi' => $administrasi , 'kelas' => $kelas]);
                
            }elseif ($kelas == "XII") {
    
            $administrasi = DB::table('administrasi')
                ->where('kelas','=','XII')
                ->get();
                return view("ExportPages/administrasi",['administrasi' => $administrasi , 'kelas' => $kelas]);
                
            }
    }

    public function email($kepada)
    {
        return view('pages/email',['kepada' => $kepada]);
    }

}
