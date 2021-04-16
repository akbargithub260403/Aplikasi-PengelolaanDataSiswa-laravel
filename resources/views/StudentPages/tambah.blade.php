@extends('templates/main')

@section('title','Halaman Students')

@section('content')
<div class="container mt-3">

<div class="row">
    <div class="col-10">
            <h2 class="mb-4">Tambah Data Students</h2>

            <form action="/student" method="POST" enctype="multipart/form-data">
                    @csrf
                        <div class="form-group">
                            <label for="NISN">NISN</label>
                            <input type="text" class="form-control col-4 @error('NISN') is-invalid @enderror" id="NISN" name="NISN" required="max:9" autocomplete="off">
                            <small id="passwordHelpBlock" class="form-text text-muted">
                            NISN must be 12 characters.
                            </small>
                            @error('NISN')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="Nama">Nama</label>
                            <input type="text" class="form-control @error('nama') is-invalid @enderror " id="Nama" name="nama" autocomplete="off">
                            @error('nama')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-row">
                        <div class="form-group mr-4">
                                <label for="exampleFormControlSelect1">Kelas</label>
                                <select class="form-control" id="exampleFormControlSelect1" name="kelas">
                                    <option value="X">X</option>
                                    <option value="XI">XI</option>
                                    <option value="XII">XII</option>
                                </select>
                            </div>
                        <div class="form-group">
                                <label for="exampleFormControlSelect1">Jurusan</label>
                                <select class="form-control" id="exampleFormControlSelect1" name="jurusan">
                                    <option value="RPL">RPL</option>
                                    <option value="TKJ">TKJ</option>
                                    <option value="BDP">BDP</option>
                                    <option value="ATPH">ATPH</option>
                                    <option value="KIMIA">KIMIA</option>
                                    <option value="TEI">TEI</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-row">

                        <div class="col-6"><div class="form-group mr-4">
                            <label for="Kelas">Email</label>
                            <input type="email" class="form-control @error('email') is-invalid @enderror" id="Kelas" name="email" autocomplete="off">
                            @error('email')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        </div>
                        <div class="form-group">
                            <label for="Kelas">NO telepon</label>
                            <input type="text" class="form-control @error('no_telp') is-invalid @enderror" id="Kelas" name="no_telp" autocomplete="off">
                            @error('no_telp')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        </div>
                        <div class="form-group">
                            <label for="Kelas">Alamat</label>
                            <textarea class="form-control" class="form-control @error('alamat') is-invalid @enderror" name="pesanemail"></textarea>
                            @error('alamat')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-inline">
                            <label for="Kelas">Gambar</label>
                            <input type="file" class="form-control ml-2 col-4 @error('gambar') is-invalid @enderror" id="Kelas" name="gambar" autocomplete="off">
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
