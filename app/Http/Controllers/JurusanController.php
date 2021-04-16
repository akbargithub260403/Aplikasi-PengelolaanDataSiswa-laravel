<?php

namespace App\Http\Controllers;

use App\Student;
use App\KelasX;
use App\KelasXI;
use App\KelasXII;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class JurusanController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);
    }
    
    // fucntion untuk menampilkan semua siswa jurusan 


    public function pages($jurusan)
    {
        if ($jurusan == "RPL") {

        $data = "Rekayasa Perangkat Lunak";
        $students = DB::table('students')
        ->where('jurusan', '=', "RPL")
        ->get();
        return view('StudentsJurusan/rpl',['students' => $students, 'data' => $data]);

        }elseif ($jurusan == "TKJ") {
           
        $data = "Teknik Komputer Jaringan";
        $students = DB::table('students')
        ->where('jurusan', '=', "TKJ")
        ->get();
        return view('StudentsJurusan/tkj',['students' => $students, 'data'=> $data]);

        }elseif ($jurusan == "BDP") {

        $data = "Bisnis Daring Pemasaran";
        $students = DB::table('students')
        ->where('jurusan', '=', "BDP")
        ->get();
        return view('StudentsJurusan/bdp',['students' => $students, 'data'=> $data]);

        }elseif ($jurusan == "KIMIA") {

        $data = "Kimia Industri";
        $students = DB::table('students')
        ->where('jurusan', '=', "KIMIA")
        ->get();
        return view('StudentsJurusan/kimia',['students' => $students, 'data'=> $data]);

        }elseif ($jurusan == "ATPH") {

        $data = "Agricultur Teknik Pertanian Horticultura";
        $students = DB::table('students')
        ->where('jurusan', '=', "ATPH")
        ->get();
        return view('StudentsJurusan/atph',['students' => $students, 'data'=> $data]);

        }elseif ($jurusan == "TEI") {

        $data = "Teknik Elektronik Industri";
        $students = DB::table('students')
        ->where('jurusan', '=', "TEI")
        ->get();
        return view('StudentsJurusan/tei',['students' => $students, 'data'=> $data]);

        }
       
    }


    // fucntion untuk menampilkan semua siswa jurusan export
    public function export($data,$jurusan)
    {

        if ($data == "X") {

        $datakelas      = "X";
        $datajurusan    = $jurusan;

        $students = DB::table('students')
            ->where('jurusan','=',$datajurusan)
            ->where(function($query) {
                $query->where('kelas', '=', 'X');
                     })
            ->get();
        
        return view('ExportPages/jurusan',['datakelas' => $datakelas , 'students' => $students, 'datajurusan' =>$datajurusan]);
           
        }elseif ($data == "XI") {

        $datakelas      = "XI";
        $datajurusan    = $jurusan;
            
            $students = DB::table('students')
            ->where('jurusan','=',$datajurusan)
            ->where(function($query) {
                $query->where('kelas', '=', 'XI');
                     })
            ->get();
        
        return view('ExportPages/jurusan',['datakelas' => $datakelas , 'students' => $students, 'datajurusan' =>$datajurusan]);

        }elseif ($data = "XII") {

        $datakelas      = "XII";
        $datajurusan    = $jurusan;

            $students = DB::table('students')
            ->where('jurusan','=',$datajurusan)
            ->where(function($query) {
                $query->where('kelas', '=', 'XII');
                     })
            ->get();
        
        return view('ExportPages/jurusan',['datakelas' => $datakelas , 'students' => $students, 'datajurusan' =>$datajurusan]);

        }
        
    }


    // function Untuk search Engine Jurusan


    public function searchjurusan(Request $request, $jurusan)
    {
    $keyword = $request->keyword;

    
    if ($jurusan == "RPL") {

        $data = "Rekayasa Perangkat Lunak";
        
        if ($request->has('keyword')) {
            $students = DB::table('students')
                ->where('nama','LIKE',"%".$keyword."%")
                ->where(function($query) {
                    $query->where('jurusan', '=', 'RPL');
                        })
                ->get();
        }else{
            $students = DB::table('students')
                    ->where('jurusan','=','RPL')
                    ->get();
        }

    return view('StudentsJurusan/rpl',['students' => $students, 'data' => $data]);

    }elseif ($jurusan == "TKJ") {
        
        $data = "Teknik Komputer Jaringan";

        if ($request->has('keyword')) {
                  $students = DB::table('students')
                  ->where('nama','LIKE',"%".$keyword."%")
                  ->where(function($query) {
                      $query->where('jurusan', '=', 'TKJ');
                           })
                  ->get();
        }else{
                  $students = DB::table('students')
                  ->where('jurusan','=','TKJ')
                  ->get();
        }
  
       return view('StudentsJurusan/tkj',['students' => $students,'data' =>$data]);

    }elseif ($jurusan == "BDP") {
       
        $data = "Bisnis Daring Pemasaran";

        if ($request->has('keyword')) {
                  $students = DB::table('students')
                  ->where('nama','LIKE',"%".$keyword."%")
                  ->where(function($query) {
                      $query->where('jurusan', '=', 'BDP');
                           })
                  ->get();
        }else{
                  $students = DB::table('students')
                  ->where('jurusan','=','BDP')
                  ->get();
        }
  
       return view('StudentsJurusan/bdp',['students' => $students,'data' =>$data]);

    }elseif ($jurusan == "KIMIA") {

        $data = "Teknik Kimia Industri";

        if ($request->has('keyword')) {
                  $students = DB::table('students')
                  ->where('nama','LIKE',"%".$keyword."%")
                  ->where(function($query) {
                      $query->where('jurusan', '=', 'KIMIA');
                           })
                  ->get();
        }else{
                  $students = DB::table('students')
                  ->where('jurusan','=','KIMIA')
                  ->get();
        }
  
       return view('StudentsJurusan/kimia',['students' => $students,'data' =>$data]);

    }elseif ($jurusan == "ATPH") {

        $data = "Agribisnis Tanaman Pangan dan Horticultura";

        if ($request->has('keyword')) {
                  $students = DB::table('students')
                  ->where('nama','LIKE',"%".$keyword."%")
                  ->where(function($query) {
                      $query->where('jurusan', '=', 'ATPH');
                           })
                  ->get();
        }else{
                  $students = DB::table('students')
                  ->where('jurusan','=','ATPH')
                  ->get();
        }
  
       return view('StudentsJurusan/atph',['students' => $students,'data' =>$data]);

    }elseif ($jurusan == "TEI") {
       
        $data = "Teknik Elektronik Industri";

        if ($request->has('keyword')) {
                  $students = DB::table('students')
                  ->where('nama','LIKE',"%".$keyword."%")
                  ->where(function($query) {
                      $query->where('jurusan', '=', 'TEI');
                           })
                  ->get();
        }else{
                  $students = DB::table('students')
                  ->where('jurusan','=','TEI')
                  ->get();
        }
  
       return view('StudentsJurusan/tei',['students' => $students,'data' =>$data]);

    }
    
}

    // public function exportX()
    // {
    //     $students = KelasX::all();
    //     $data = "X";
    //     return view('ExportPages/exportStudents',['students' => $students, 'data' => $data]);
    // }
}
