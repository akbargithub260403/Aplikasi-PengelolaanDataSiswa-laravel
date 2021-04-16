@extends('templates/main')

@section('title','Halaman Students')

@section('content')
<div class="container mt-3">

<div class="row">
    <div class="col-10">
            <h2>Data Students {{$data}}</h2>
            <a href="/export/{{$kelas}}/kelas" class="btn btn-success">
            Export Data Students
            </a>

            <form method="POST" class="my-3" action="/search/kelas/{{$kelas}}">
            @method('get')
            @csrf
				<div class="input-group mb-3">				
					<input type="text" class="form-control" placeholder="Search Engine" name="keyword" autocomplete="off">
					<div class="input-group-append">
						<button class="btn btn-outline-primary" type="submit" id="button-addon2">Search</button>
					</div>
				</div>
			</form>

            @if (session('status'))
                        <div class="alert alert-success my-3">
                            {{ session('status') }}
                        </div>
            @endif

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
