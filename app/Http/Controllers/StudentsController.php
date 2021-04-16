<?php

namespace App\Http\Controllers;

use App\Student;
use App\Data;
use App\Email;

use File;
use Session;

use App\Imports\StudentsImport;
use App\Mail\ActionEmail;
use App\Mail\ManyEmail;
use Maatwebsite\Excel\Facades\Excel;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\DB;

class StudentsController extends Controller
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
        $students = Student::all();

        $kelasX = Student::where('kelas', 'X')
        ->get();

        $kelasXI = Student::where('kelas', 'XI')
        ->get();

        $kelasXII = Student::where('kelas', 'XII')
        ->get();

        return view('StudentPages/index',[
            'students'  => $students,
            'kelasX'    => $kelasX,
            'kelasXI'   => $kelasXI,
            'kelasXII'  => $kelasXII
            ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('StudentPages/tambah');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $this->validate($request, [
            'NISN'      => 'required|max:12',
            'nama'      => 'required',
            'kelas'     => 'required',
            'jurusan'   => 'required',
            'email'     => 'required',
            'alamat'    => 'required',
            'no_telp'   => 'required|max:14',
            'gambar'    => 'required|file|image|mimes:jpg,png,jpeg,JPG,PNG,JPEG|max:2048'
        ]);

       // menyimpan data file yang diupload ke variabel $file
		$file = $request->file('gambar');
 
		$nama_file = time()."_".$file->getClientOriginalName();
 
      	// isi dengan nama folder tempat kemana file diupload
        $tujuan_upload = 'img';

        $file->move($tujuan_upload,$nama_file);
        
        Student::create([
            'NISN'  => $request->NISN,
            'nama'  => $request->nama,
            'kelas' => $request->kelas,
            'email' => $request->email,
            'alamat'    =>$request->alamat,
            'no_telp'   => $request->no_telp,
            'jurusan' => $request->jurusan,
            'gambar' => $nama_file  
        ]);
    
        return redirect('/student')->with('status', 'Data Students Berhasil Ditambahkan!');
	        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function show(Student $student)
    {
        $data = DB::table('administrasi')
        ->where('nama','=',$student->nama)
        ->get();

        return view('StudentPages/detail',['student' => $student , 'data' => $data]);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function edit(Student $student)
    {
        return view('StudentPages/update',['student' => $student]);
    }

    public function about()
    {
        $data_file = Data::all();
        return view('pages/about',['data_file'=>$data_file]);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Student $student)
    {
        $this->validate($request, [
            'gambar'    => 'required|file|image|mimes:jpg,png,jpeg,JPG,PNG,JPEG|max:2048'
        ]);

        $gambar = Student::where('id',$student->id)->first();
        
        File::delete('img/'.$gambar->gambar);

        // menyimpan data file yang diupload ke variabel $file
		$file = $request->file('gambar');
 
		$nama_file = time()."_".$file->getClientOriginalName();
 
      	// isi dengan nama folder tempat kemana file diupload
        $tujuan_upload = 'img';

        $file->move($tujuan_upload,$nama_file);

        Student::where('id', $student->id)
        ->update([
            'NISN'      => $request->NISN,
            'nama'      => $request->nama,
            'kelas'     => $request->kelas,
            'jurusan'   => $request->jurusan,
            'no_telp'   => $request->no_telp,
            'alamat'    => $request->alamat,
            'email'     => $request->email,
            'gambar'    => $nama_file
            ]);
        


         return redirect('/student')->with('status', 'Data Students Berhasil DiUpdate!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function destroy(Student $student)
    {
        $gambar = Student::where('id',$student->id)->first();

        File::delete('img/'.$gambar->gambar);

        Student::destroy($student->id);
        
        return redirect('/student')->with('status', 'Data Students Berhasil dihapus!');
    }


    // function export 
    public function export()
    {
        $kelasX = DB::table('students')
        ->where('kelas','=','X')
        ->get();

        $kelasXI = DB::table('students')
        ->where('kelas','=','XI')
        ->get();

        $kelasXII = DB::table('students')
        ->where('kelas','=','XII')
        ->get();

        return view('ExportPages/students',[
            'kelasX'    => $kelasX,
            'kelasXI'   => $kelasXI,
            'kelasXII'  => $kelasXII
        ]);

    }

    // function untuk export data students per kelas
    public function exportkelas($kelas)
    {
    
        if ($kelas == "X") {

        $studentsKelas = DB::table('students')
            ->where('kelas','=','X')
            ->get();
        return view("ExportPages/kelas",['studentsKelas' => $studentsKelas, 'kelas' => $kelas]);
            
        }elseif ($kelas == "XI") {

        $studentsKelas = DB::table('students')
            ->where('kelas','=','XI')
            ->get();
        return view("ExportPages/kelas",['studentsKelas' => $studentsKelas , 'kelas' => $kelas]);
            
        }elseif ($kelas == "XII") {

        $studentsKelas = DB::table('students')
            ->where('kelas','=','XII')
            ->get();
            return view("ExportPages/kelas",['studentsKelas' => $studentsKelas , 'kelas' => $kelas]);
            
        }
        
    }


    // function pencarian
    public function searchkelas(Request $request,$kelas)
    {
    $keyword = $request->keyword;

    if ($kelas == "X") {

    $data = "Kelas X";

      if ($request->has('keyword')) {
                $students = DB::table('students')
                ->where('nama','LIKE',"%".$keyword."%")
                ->where(function($query) {
                    $query->where('kelas', '=', 'X');
                         })
                ->get();
      }else{
                $students = DB::table('students')
                ->where('kelas','=','X')
                ->get();
      }

     return view('StudentPages/KelasX',['students' => $students,'data' =>$data, 'kelas' => $kelas]);
        
    }elseif ($kelas == "XI") {

    $data = "XI";
    
        if ($request->has('keyword')) {
                $students = DB::table('students')
                ->where('nama','LIKE',"%".$keyword."%")
                ->where(function($query) {
                    $query->where('kelas', '=', 'XI');
                        })
                ->get();
        }else{
                $students = DB::table('students')
                ->where('kelas','=','XI')
                ->get();
        }

     return view('StudentPages/KelasXI',['students' => $students,'data' => $data, 'kelas' => $kelas]);
        
    }elseif ($kelas == "XII") {

    $data = "XII";

        if ($request->has('keyword')) {
                $students = DB::table('students')
                ->where('nama','LIKE',"%".$keyword."%")
                ->where(function($query) {
                    $query->where('kelas', '=', 'XII');
                        })
                ->get();
        }else{
                $students = DB::table('students')
                ->where('kelas','=','XII')
                ->get();
        }
     return view('StudentPages/KelasXII',['students' => $students , 'data' => $data, 'kelas' => $kelas]);
        
    }    
}


    // function data siswa kelas X
    public function kelas($kelas)
    {
       if ($kelas == "X") {

        $students = DB::table('students')
            ->where('kelas','=',$kelas)
            ->get();

        $data = "Kelas X";
        return view('StudentPages/KelasX',['students' => $students , 'data' => $data,'kelas' => $kelas]);
           
       }elseif($kelas == "XI"){

        $students = DB::table('students')
            ->where('kelas','=',$kelas)
            ->get();
            
        $data = "Kelas XI";
        return view('StudentPages/KelasX',['students' => $students , 'data' => $data , 'kelas' => $kelas]);

       }elseif ($kelas == "XII") {

        $students = DB::table('students')
            ->where('kelas','=',$kelas)
            ->get();
            
        $data = "Kelas XII";
        return view('StudentPages/KelasX',['students' => $students , 'data' => $data , 'kelas' => $kelas]);
           
       }

        $students = DB::table('students')
        ->where('kelas','=',$kelas)
        ->get();
        $data = "Kelas X";
        return view('StudentPages/KelasX',['students' => $students , 'data' => $data]);

    }

    // function Import Excel
    public function import_excel(Request $request) 
	{

		// validasi
		$this->validate($request, [
            'file'          => 'required|mimes:csv,xls,xlsx',
            'keterangan'    => 'required'
        ]);
 
		// menangkap file excel
		$file = $request->file('file');
 
		// membuat nama file unik
		$nama_file = rand().$file->getClientOriginalName();
 
		// upload ke folder file_siswa di dalam folder public
		$file->move('data_file',$nama_file);
 
        // import data
        
        Excel::import(new StudentsImport, public_path('/data_file/'.$nama_file));
        
        Data::create([
			'data_file' => $nama_file,
			'keterangan' => $request->keterangan,
        ]);
 
		// alihkan halaman kembali
		return redirect('/about')->with('status', 'Data Students Berhasil DiUpload!');
    }
    
    // function untuk menampilkan halaman send email
    public function email()
    {
        return view('pages/email');
    }

    // function untuk mengirim data dari halaman send email
    public function sendemail(Request $request)
    {

        $data = ([
            'kepada'        => $request->kepada,
            'dari'          => $request->dari,
            'pesanemail'    => $request->pesanemail,
            'data_file1'    => $request->file('file1'),
        ]);
      
        
        Mail::to($request->kepada)->send(new ActionEmail($data));

        return redirect('/sendEmail')->with('status', 'Email Berhasil terkirim!');
    }

    public function manyemail()
    {
        return view('pages/manyemail');
    }

    // function untuk mengirim email ke semua students 
    public function sendmanyemail(Request $request)
    {
        $data = ([
            'kepada'        => $request->kepada,
            'dari'          => $request->dari,
            'pesanemail'    => $request->pesanemail,
            'jurusan'       => $request->jurusan,
            'data_file1'          => $request->file('file1')
        ]);

        $users = DB::table('students')
                     ->select(DB::raw('email'))
                     ->where('jurusan', '=', $request->jurusan)
                     ->get();


        foreach ($users as $recipient) {
            Mail::to($recipient)->send(new ManyEmail($data));
        }

        return redirect('/manyEmail')->with('status', 'Semua Email Berhasil terkirim!');

    }

}
