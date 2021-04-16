@extends('templates/main')

@section('title','Halaman Data Absensi')

@section('content')
<div class="container">


   <div class="col">
    <div class="row">

    <div class="card mt-4" style="width: 38rem;">
        <div class="card-body">
        <h5 class="card-title">Data Students</h5>
        <form action="/students/import_excel" method="POST" enctype="multipart/form-data">
        @csrf
            <div class="form-group">
                <label for="file">Masukan Data Students</label>
                <p>Data yang valid berbentuk excel(xml,xls,csv)</p>
                <input type="file" class="form-control-file" id="file" name="file">
            </div>
            <div class="form-group">
				<b>Keterangan</b>
				<textarea class="form-control" name="keterangan"></textarea>
			</div>
 
				<input type="submit" value="Upload" class="btn btn-primary">
        </form>
        </div>
    </div>

    <div class="card float-right ml-4" style="width: 18rem;">
        <div class="card-body">
        <img src="{{ asset('/img/laravel.png')}}" class="my-4 rounded-circle shadow" height="100" widht="100"> 
            <h5 class="card-title">Data Akun</h5>
            <h6 class="card-subtitle mb-2 text-muted"></h6>
            <p class="card-text">Nama : <i>{{ Auth::user()->name }}</i>.</p>
            <p class="card-text">Email : <i>{{ Auth::user()->email }}</i>.</p>
        </div>
    </div>

    </div>
   </div>

    

    <div class="card mt-4" style="width: 70rem;">
        <div class="card-body">

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @if (session('status'))
                        <div class="alert alert-success my-3">
                            {{ session('status') }}
                        </div>
        @endif

        <h5 class="card-title">Data Students Sekolah</h5>
        <p><i>Jika anda ingin melihat bagaimana contoh kolom untuk file excel yang akan di upload <a href="{{asset('data_file/contohFile.xlsx')}}">Disini</a></i></p>
        
        <table class="table table-bordered table-striped">
					<thead>
						<tr>
							<th width="300px;">File</th>
							<th>Keterangan</th>
							<th width="1%">OPSI</th>
						</tr>
					</thead>
					<tbody>
                    @foreach ($data_file as $f)
						<tr>
                        <?php $path = url('data_file/'.$f->data_file) ?>
							<td>{{$f->data_file}}</td>
							<td>{{$f->keterangan}}</td>
							<td><a href="{{ url($path) }}">Download now</a></td>
                        </tr>
					</tbody>
                    @endforeach
		</table>
        </div>
    </div>


</div>
@endsection

