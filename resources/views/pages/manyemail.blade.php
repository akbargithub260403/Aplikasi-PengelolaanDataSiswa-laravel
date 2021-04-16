@extends('templates/main')

@section('title','Halaman Email')

@section('content')


<div class="container">
    <div class="row">
        <div class="col-8">
        <h2 style="display: inline-block;" >Send Email To All Students</h2>
        <a href="{{'/sendEmail'}}" class="btn btn-outline-success col-4 float-right">Send Email To Students</a>
        @if (session('status'))
                        <div class="alert alert-success my-3">
                            {{ session('status') }}
                        </div>
        @endif
        <br><br>
        <form method="POST" action="/students/manyEmail" enctype="multipart/form-data">
        @csrf
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="inputEmail4">Dari</label>
                    <input class="form-control" type="email" value="akbarpratama.colaboratory665@gmail.com" name="dari" readonly>
                </div>
                <div class="form-group col-md-6">
                    <label for="inputEmail4">Kepada</label>
                    <input type="email" class="form-control" name="kepada" placeholder="To All Students" id="inputEmail4" readonly>
                </div>
            </div>
            <div class="form-group col-4">
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
            <div class="form-group">
                <label for="inputAddress2">Tulis Email</label>
                <textarea class="form-control" name="pesanemail"></textarea>
            </div>
            <div class="form-row">
                <div class="form-group col-md-4">
                    <label for="inputZip">File</label>
                    <input type="file" class="form-control" name="file1" id="inputZip">
                </div>
            </div>
            <button type="submit" class="btn btn-primary col-4">Send Email</button>
            </form>
        </div>
    </div>

</div>
@endsection