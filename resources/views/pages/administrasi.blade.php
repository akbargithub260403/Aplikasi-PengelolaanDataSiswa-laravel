@extends('templates/main')

@section('title','Halaman About')

@section('content')
<div class="container">


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

        <h5 class="card-title">Data Administrasi Students</h5>
        <p><i>Semua Data Administrasi Students</i></p>
        
        <!-- Example split danger button -->
                <div class="btn-group mb-4">
                <button type="button" class="btn btn-info">Action</button>
                <button type="button" class="btn btn-info dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <span class="sr-only">Toggle Dropdown</span>
                </button>
                <div class="dropdown-menu">
                    <center><a class="btn btn-success my-2" href="{{Route('export','X')}}">Export X</a></center>
                    <center><a class="btn btn-success my-2" href="{{Route('export','XI')}}">Export XI</a></center>
                    <center><a class="btn btn-success my-2" href="{{Route('export','XII')}}">Export XII</a></center>
                </div>
                </div>

        <table class="table table-bordered table-striped">
					<thead>
						<tr>
							<th width="100px;">NISN</th>
							<th>Nama</th>
							<th>Tanggal</th>
							<th>Insert At</th>
                            <th>Kelas</th>
							<th>Jurusan</th>
							<th>OPSI</th>
						</tr>
					</thead>
					<tbody>
                    @foreach ($data as $dt)
						<tr>
							<td>{{$dt->NISN}}</td>
							<td><a href="/student/{{$dt->id_siswa}}">{{$dt->nama}}</a></td>
                            <td>{{$dt->tanggal}}</td>
                            <td>{{$dt->created_at}}</td>
                            <td>{{$dt->kelas}}</td>
                            <td>{{$dt->jurusan}}</td>
							<td>
                            <form action="{{$dt->id}}/administrasi" class="d-inline" method="post">
                                @method('delete')
                                @csrf
                                    <button class="btn btn-danger d-inline">Hapus</button>
                            </form>
                            </td>
                        </tr>
					</tbody>
                    @endforeach
		</table>
        </div>
    </div>


</div>
@endsection

