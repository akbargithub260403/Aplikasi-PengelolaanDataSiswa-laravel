@extends('templates/main')

@section('title','Halaman Students')

@section('content')
<div class="container">
<div class="jumbotron jumbotron-fluid">
  <div class="container">
    <h1 class="display-4">Teknik Komputer Jaringan</h1>
    <center><img src="{{ asset('/img/tkj.png')}}" class="my-4 rounded-circle shadow" height="150" widht="150"> </center>
    <p class="lead">Ini adalah halaman untuk setiap data Students yang memiliki jurusan Teknik Komputer Jaringan.</p>
    <form class="form-inline">
    <a href="/students/{{'X'}}/tkj/{{'TKJ'}}" class="btn btn-outline-success mr-2">Export X</a>
    <a href="/students/{{'XI'}}/tkj/{{'TKJ'}}" class="btn btn-outline-success mr-2">Export XI</a>
    <a href="/students/{{'XII'}}/tkj/{{'TKJ'}}" class="btn btn-outline-success mr-2">Export XII</a>
       
    </form>
    </div>
</div>

<div class="row">
    <div class="col">
        <h1>Hello Students {{$data}} </h1>
        <form method="POST" class="my-3" action="/search/jurusan/{{'TKJ'}}">
            @method('get')
            @csrf
				<div class="input-group mb-3">				
					<input type="text" class="form-control col-6" placeholder="Search Engine" name="keyword" autocomplete="off">
					<div class="input-group-append">
						<button class="btn btn-outline-primary" type="submit" id="button-addon2">Search</button>
					</div>
				</div>
			</form>
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
