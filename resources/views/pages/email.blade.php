@extends('templates/main')

@section('title','Halaman Email')

@section('content')


<div class="container">
    <div class="row">
        <div class="col-8">
        <h2 style="display: inline-block;" >Send Email</h2>
        <a href="{{'/manyEmail'}}" class="btn btn-outline-success float-right">Send Email To All Students</a>
        @if (session('status'))
                        <div class="alert alert-success my-3">
                            {{ session('status') }}
                        </div>
        @endif
        <br><br>
        <form method="POST" action="/students/email" enctype="multipart/form-data">
        @csrf
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="inputEmail4">Dari</label>
                    <input class="form-control" type="email" value="akbarpratama.colaboratory665@gmail.com" name="dari" readonly>
                </div>

                <?php   
                    if (empty($kepada)) {
                        ?>
                                <div class="form-group col-md-6">
                                    <label for="inputEmail4">Kepada</label>
                                    <input type="email" class="form-control" name="kepada">
                                </div>
                        <?php
                    }else{
                        ?>
                                <div class="form-group col-md-6">
                                    <label for="inputEmail4">Kepada</label>
                                    <input type="email" class="form-control" value="{{$kepada}}" name="kepada">
                                </div>
                        <?php
                    }
                    ?>
                
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