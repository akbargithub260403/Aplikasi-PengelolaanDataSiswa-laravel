@extends('templates/main')

@section('title','Halaman Home')

@section('content')

<div class="container">


        <div class="jumbotron">
                <h1 class="display-4">Aplikasi Pengelolaan Data Siswa</h1>
                <p class="lead">Selamat Datang</p>
                <hr class="my-4">
                <p>Aplikasi digunakan untuk mengelola Data Siswa. Aplikasi ini dibuat menggunakan Framework Laravel 7</p>
                <a class="btn btn-primary btn-lg" href="https://laravel.com/" role="button">Learn more</a>
        </div>
        
        <div class="row">
                <div class="col-4">
                        <div class="list-group" id="list-tab" role="tablist">
                        <a class="list-group-item list-group-item-action active" id="list-home-list" data-toggle="list" href="#list-home" role="tab" aria-controls="home">Rekayasa Perangkat Lunak</a>
                        <a class="list-group-item list-group-item-action" id="list-profile-list" data-toggle="list" href="#list-profile" role="tab" aria-controls="profile">Teknik Komputer Jaringan</a>
                        <a class="list-group-item list-group-item-action" id="list-messages-list" data-toggle="list" href="#list-messages" role="tab" aria-controls="messages">Kimia Industri</a>
                        <a class="list-group-item list-group-item-action" id="list-settings-list" data-toggle="list" href="#list-settings" role="tab" aria-controls="settings">Bisnis Management Daring</a>
                        <a class="list-group-item list-group-item-action" id="list-atph-list" data-toggle="list" href="#list-atph" role="tab" aria-controls="atph">Agribisnis Tanaman Pangan Dan Horticultura</a>
                        <a class="list-group-item list-group-item-action" id="list-tei-list" data-toggle="list" href="#list-tei" role="tab" aria-controls="tei">Teknik Elektro Industri</a>
                        </div>
                        </div>
                        <div class="col-8">
                        <div class="tab-content" id="nav-tabContent">
                        <div class="tab-pane fade show active" id="list-home" role="tabpanel" aria-labelledby="list-home-list">
                                 <div class="card" style="width: 40rem;">
                                        <div class="card-body">
                                        <center><img src="{{ asset('/img/rpl.jpg')}}" class="my-4 rounded-circle shadow" height="150" widht="150"> </center>
                                        <h5 class="card-title">Rekayasa Perangkat Lunak</h5>
                                        <h6 class="card-subtitle mb-2 text-muted">RPL</h6>
                                        <p class="card-text"></p>
                                        <p class="card-text"></p>
                                        <a href="/students/pages/{{'RPL'}}" class="btn btn-primary">Go to Page</a>
                                        </div>
                                </div>
                        </div>
                        <div class="tab-pane fade" id="list-profile" role="tabpanel" aria-labelledby="list-profile-list">
                        <div class="card" style="width: 40rem;">
                                        <div class="card-body">
                                        <center><img src="{{ asset('/img/tkj.png')}}" class="my-4 rounded-circle shadow" height="150" widht="150"> </center>
                                        <h5 class="card-title">Teknik Komputer Jaringan</h5>
                                        <h6 class="card-subtitle mb-2 text-muted">TKJ</h6>
                                        <p class="card-text"></p>
                                        <p class="card-text"></p>
                                        
                                        <a href="/students/pages/{{'TKJ'}}" class="btn btn-primary">Go to Page</a>
                                        </div>
                                </div>
                        </div>
                        <div class="tab-pane fade" id="list-messages" role="tabpanel" aria-labelledby="list-messages-list">
                        <div class="card" style="width: 40rem;">
                                        <div class="card-body">
                                        <center><img src="{{ asset('/img/kimia.jpg')}}" class="my-4 rounded-circle shadow" height="150" widht="150"> </center>
                                        <h5 class="card-title">Kimia Industri</h5>
                                        <h6 class="card-subtitle mb-2 text-muted">KI</h6>
                                        <p class="card-text"></p>
                                        <p class="card-text"></p>
                                        
                                        <a href="/students/pages/{{'KIMIA'}}" class="btn btn-primary">Go to Page</a>
                                        </div>
                                </div>
                        </div>
                        <div class="tab-pane fade" id="list-settings" role="tabpanel" aria-labelledby="list-settings-list">
                        <div class="card" style="width: 40rem;">
                                        <div class="card-body">
                                        <center><img src="{{ asset('/img/bdp.png')}}" class="my-4 rounded-circle shadow" height="150" widht="150"> </center>
                                        <h5 class="card-title">Bisnis Daring Pemasaran</h5>
                                        <h6 class="card-subtitle mb-2 text-muted">BDP</h6>
                                        <p class="card-text"></p>
                                        <p class="card-text"></p>
                                        
                                        <a href="/students/pages/{{'BDP'}}" class="btn btn-primary">Go to Page</a>
                                        </div>
                                </div>
                        </div>
                        <div class="tab-pane fade" id="list-atph" role="tabpanel" aria-labelledby="list-atph-list">
                        <div class="card" style="width: 40rem;">
                                        <div class="card-body">
                                        <center><img src="{{ asset('/img/atph.png')}}" class="my-4 rounded-circle shadow" height="150" widht="150"> </center>
                                        <h5 class="card-title">Agribisnis Tanaman Pangan dan Horticultura</h5>
                                        <h6 class="card-subtitle mb-2 text-muted">ATPH</h6>
                                        <p class="card-text"></p>
                                        <p class="card-text"></p>
                                        
                                        <a href="/students/pages/{{'ATPH'}}" class="btn btn-primary">Go to Page</a>
                                        </div>
                                </div>
                        </div>
                        <div class="tab-pane fade" id="list-tei" role="tabpanel" aria-labelledby="list-tei-list">
                        <div class="card" style="width: 40rem;">
                                        <div class="card-body">
                                        <center><img src="{{ asset('/img/tei.jpg')}}" class="my-4 rounded-circle shadow" height="150" widht="150"> </center>
                                        <h5 class="card-title">Teknik Elektronik Industri/h5>
                                        <h6 class="card-subtitle mb-2 text-muted">TEI</h6>
                                        <p class="card-text"><p>
                                        <p class="card-text"></p>
                                        
                                        <a href="/students/pages/{{'TEI'}}" class="btn btn-primary">Go to Page</a>
                                        </div>
                                </div>
                        </div>
                        </div>
                </div>
        </div>

</div>
@endsection

