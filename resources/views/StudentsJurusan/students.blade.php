@extends('templates/main')

@section('title','Halaman Students')

@section('content')
<div class="container">

<div class="row">
    <div class="col">
        <h1>Hello Students {{$data}} </h1>
        <!-- <a href="/students/export/rpl" class="btn btn-outline-success col-md-2">Export</a> -->
        <table class="table mt-4">
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
        @foreach ($students as $std)
            <tr>
                <th scope="row">{{$loop->iteration}}</th>
                <td>{{$std->NISN}}</td>
                <td>{{$std->nama}}</td>
                <td>{{$std->kelas}}</td>
                <td>{{$std->jurusan}}</td>
                
                <td>
                     <a href="/student/{{$std->id}}">Detail</a>
                </td>
            </tr>
        @endforeach
        </tbody>
        </table>
    </div>
</div>
    
</div>
@endsection
