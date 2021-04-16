@extends('templates/main')

@section('title','Halaman Students')

@section('content')
<div class="container mt-3">

<div class="row">
    <div class="col-10">
            <h2 class="d-inline ">Update Data Students</h2>

            <form action="/student/{{$student->id}}" method="POST" enctype="multipart/form-data">
            @method('patch')
                    @csrf
                    <div class="form-group">
                            <label for="NISN">NISN</label>
                            <input type="text" class="form-control col-4 @error('NISN') is-invalid @enderror" id="NISN" name="NISN" required="max:9" value="{{$student->NISN}}" autocomplete="off">
                            <small id="passwordHelpBlock" class="form-text text-muted">
                            NISN must be 12 characters.
                            </small>
                            @error('NISN')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="Nama">Nama</label>
                            <input type="text" value="{{$student->nama}}" class="form-control @error('nama') is-invalid @enderror " id="Nama" name="nama" autocomplete="off">
                            @error('nama')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-row">
                        <div class="form-group mr-4">
                                <label for="exampleFormControlSelect1">Kelas</label>
                        <input type="text" value="{{$student->kelas}}" class="form-control col-4 @error('kelas') is-invalid @enderror" id="Kelas" name="kelas" autocomplete="off">
                            @error('kelas')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                            </div>
                        <div class="form-group">
                            <label for="exampleFormControlSelect1">Jurusan</label>
                            <input type="text" value="{{$student->jurusan}}" class="form-control col-4 @error('jurusan') is-invalid @enderror" id="Jurusan" name="jurusan" autocomplete="off">
                            @error('jurusan')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                            </div>
                        </div>
                        <div class="form-row">

                        <div class="col-6"><div class="form-group mr-4">
                            <label for="Kelas">Email</label>
                            <input type="email"  value="{{$student->email}}" class="form-control @error('email') is-invalid @enderror" id="Kelas" name="email" autocomplete="off">
                            @error('email')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        </div>
                        <div class="form-group">
                            <label for="Kelas">NO telepon</label>
                            <input type="text" class="form-control @error('no_telp') is-invalid @enderror" id="Kelas" name="no_telp" value="{{$student->no_telp}}" autocomplete="off">
                            @error('no_telp')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        </div>
                        <div class="form-group">
                            <label for="Kelas">Alamat</label>
                            <input type="text" class="form-control @error('alamat') is-invalid @enderror" id="Kelas" name="alamat" value="{{$student->alamat}}" autocomplete="off">
                            @error('alamat')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-inline">
                            <label for="Kelas">Profile</label>
                            <input type="file" class="form-control col-4 @error('gambar') is-invalid @enderror" id="Kelas" name="gambar" autocomplete="off">
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                        <button type="submit" class="btn btn-primary col-md-4 ml-4">Simpan</button>
                        </div>
                        </form>
          
    </div>
</div>
</div>




@endsection
