@extends('templates/main')

@section('title','Halaman Students')

@section('content')
<div class="container">

<div class="col">
    <div class="row">

    <div class="card mt-4" style="width: 18rem;">
        <div class="card-body">
        <img src="{{ $student->getAvatar()}}" class="mb-4 rounded-circle shadow" height="100" widht="100"> 
            <h5 class="card-title"><b>Data Students</b></h5>
            <h6 class="card-subtitle mb-2 text-muted">{{$student->NISN}}</h6>
            <p class="card-text">Nama : <i>{{$student->nama}}</i>.</p>
            <p class="card-text">Kelas : <i>{{$student->kelas}}</i>.</p>
            <p class="card-text">Jurusan : <i>{{$student->jurusan}}</i>.</p>
            <p class="card-text">Email : <a href="{{'/sendEmail'}}/{{$student->email}}"><i>{{$student->email}}</i></a>.</p>
            <p class="card-text">Alamat : <i>{{$student->alamat}}</i>.</p>
            <p class="card-text">No Telp : <i>{{$student->no_telp}}</i>.</p>
                <a href="{{$student->id}}/edit" class="btn btn-warning">Update</a>
            <form action="{{$student->id}}" class="d-inline" method="POST">
                @method('delete')
                @csrf
                <button class="btn btn-danger">Hapus</button>
            </form>
        </div>
    </div>

    <div class="card float-right ml-4 mt-4" style="width: 48rem;">
        <div class="card-body">
        <h5 class="card-title">Administrasi Siswa</h5>
        @if (session('status'))
                        <div class="alert alert-success my-3">
                            {{ session('status') }}
                        </div>
        @endif
        <button type="button" class="btn btn-success mb-2" data-toggle="modal" data-target="#exampleModal">
            Tambah Data
        </button>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th scope="col">Tanggal</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
            @foreach($data as $dt)
                <tr>
                    <td>{{$dt->tanggal}}</td>
                    <td>
                        <form action="{{$dt->id}}/administrasi" class="d-inline" method="post">
                        @method('delete')
                        @csrf
                            <button class="btn btn-danger d-inline">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        </div>
    </div>

    

    </div>
   </div>
        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Data Admministrasi</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
            <form action="{{ Route('insert')}}" method="POST">
            @csrf
                <div class="form-row">
                    <div class="form-group col-md-6">
                    <label for="inputEmail4">Tanggal</label>
                    <input type="text" class="form-control" name="tanggal" id="inputEmail4" autocomplete="off" required>
                    <input type="hidden" name="id_siswa" value="{{$student->id}}">
                    <input type="hidden" name="NISN" value="{{$student->NISN}}">
                    <input type="hidden" name="nama" value="{{$student->nama}}">
                    <input type="hidden" name="kelas" value="{{$student->kelas}}">
                    <input type="hidden" name="jurusan" value="{{$student->jurusan}}">
                </div>
                </div>
                <button type="submit" class="btn btn-primary">Tambah</button>
            </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
           
            </div>
        </div>
        </div>
</div>
@endsection
