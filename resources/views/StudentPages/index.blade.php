@extends('templates/main')

@section('title','Halaman Students')

@section('content')
<div class="container mt-3">
<div class="row">
    <div class="col-10">

            @if (session('status'))
                        <div class="alert alert-success my-3">
                            {{ session('status') }}
                        </div>
            @endif

            <!-- Split dropleft button -->
            <div class="btn-group float-right mb-3">
            <div class="btn-group dropleft" role="group">
                <button type="button" class="btn btn-secondary dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="sr-only">Action Button</span>
                </button>
                <div class="dropdown-menu">
                <a href="/student/create" class="btn btn-primary my-2">
                    Tambah Data Students
                </a>

                <a href="/export/students" class="btn btn-success">
                    Export Data Students
                </a>
                </div>
            </div>
            <button type="button" class="btn btn-warning">
               Action Button
            </button>
            </div>

            
    <h2>Data Students Kelas X</h2>
        <table class="table table-hover table-dark">
            <thead>
                <tr>
                <th scope="col">#</th>
                <th scope="col">NISN</th>
                <th scope="col">Nama</th>
                <th scope="col">Kelas</th>
                <th scope="col">Jurusan</th>
                <th scope="col"></th>
                
                </tr>
            </thead>
        <tbody>
        @foreach ($kelasX as $std)
            <tr>
                <th scope="row">{{$loop->iteration}}</th>
                <td>{{$std->NISN}}</td>
                <td>{{$std->nama}}</td>
                <td>{{$std->kelas}}</td>
                <td>{{$std->jurusan}}</td>
                
                <td>
                     <a href="/student/{{$std->id}}" class="btn btn-warning">Detail</a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    <br><br>

<h2>Data Students Kelas XI</h2>
        <table class="table table-hover table-dark">
            <thead class="thead-dark">
                <tr>
                <th scope="col">#</th>
                <th scope="col">NISN</th>
                <th scope="col">Nama</th>
                <th scope="col">Kelas</th>
                <th scope="col">Jurusan</th>
                <th scope="col"></th>
                
                </tr>
            </thead>
        <tbody>
        @foreach ($kelasXI as $std)
            <tr>
                <th scope="row">{{$loop->iteration}}</th>
                <td>{{$std->NISN}}</td>
                <td>{{$std->nama}}</td>
                <td>{{$std->kelas}}</td>
                <td>{{$std->jurusan}}</td>
                
                <td>
                     <a href="/student/{{$std->id}}" class="btn btn-warning">Detail</a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    <br><br>

<h2>Data Students Kelas XII</h2>
        <table class="table table-hover table-dark">
            <thead class="thead-dark">
                <tr>
                <th scope="col">#</th>
                <th scope="col">NISN</th>
                <th scope="col">Nama</th>
                <th scope="col">Kelas</th>
                <th scope="col">Jurusan</th>
                <th scope="col"></th>
                
                </tr>
            </thead>
        <tbody>
        @foreach ($kelasXII as $std)
            <tr>
                <th scope="row">{{$loop->iteration}}</th>
                <td>{{$std->NISN}}</td>
                <td>{{$std->nama}}</td>
                <td>{{$std->kelas}}</td>
                <td>{{$std->jurusan}}</td>
                
                <td>
                     <a href="/student/{{$std->id}}" class="btn btn-warning">Detail</a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>


    </div>
</div>
</div>

@endsection
