<?php

namespace App\Http\Controllers;

use App\Student;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PagesController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);
    }
    
    public function index()
    {
        return view('home');
    }

    public function about()
    {
        return view('pages/about');
    }

    public function chart()
    {
        
        $RPL = DB::table('students')->where('jurusan','=','RPL')->count();
        $TKJ = DB::table('students')->where('jurusan','=','TKJ')->count();
        $BDP = DB::table('students')->where('jurusan','=','BDP')->count();
        $KIMIA = DB::table('students')->where('jurusan','=','KIMIA')->count();
        $ATPH = DB::table('students')->where('jurusan','=','ATPH')->count();
        $TEI = DB::table('students')->where('jurusan','=','TEI')->count();

        return view('pages/highcharts',['RPL' => $RPL , 'TKJ' => $TKJ , 'BDP' => $BDP , 'KIMIA' => $KIMIA , 'ATPH' => $ATPH , 'TEI' => $TEI]);
    }
}
