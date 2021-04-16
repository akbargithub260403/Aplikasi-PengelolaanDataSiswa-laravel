<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="icon" href="{{ asset('img/logo.png')}}" type="image/x-icon">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.css')}}">


    
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('js/bootstrap.js') }}" ></script>
    <script src="{{ asset('js/jquery-3.2.1.min.js') }}"></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <script src="{{ asset('js/highcharts.js')}}"></script>
    <script src="{{ asset('js/highcharts.js')}}"></script>
    <script src="{{ asset('js/exporting.js')}}"></script>
    <script src="{{ asset('js/export-data.js')}}"></script>
    <script src="{{ asset('js/accessibility.js')}}"></script>
    <title>Grafik Siswa</title>
</head>
<body>
<div id="app">
        <nav class="navbar navbar-expand-md navbar-light shadow-sm" style="background-color:#FFD700;">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/home') }}">
                <img src="{{ asset('/img/logo.png')}}" width="30" height="30" class="d-inline-block align-top" alt="" loading="lazy">
                    APDS
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" style="color: black;" href="{{'/home'}}">Home <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" style="color: black;" href="{{'/about'}}">Absensi Siswa</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" style="color: black;" href="{{'/student'}}">Data Siswa</a>
                    </li>
                     <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" style="color: black;" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Siswa
                    </a>

                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <a class="dropdown-item" style="color: black;" href="/class/student/{{'X'}}">Kelas X</a>
                        <a class="dropdown-item" style="color: black;" href="/class/student/{{'XI'}}">Kelas XI</a>
                        <a class="dropdown-item" style="color: black;" href="/class/student/{{'XII'}}">Kelas XII</a>
                    </div>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" style="color: black;" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Jurusan
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                    <a class="dropdown-item" style="color: black;" href="/students/pages/{{'RPL'}}">RPL</a>
                    <a class="dropdown-item" style="color: black;" href="/students/pages/{{'TKJ'}}">TKJ</a>
                    <a class="dropdown-item" style="color: black;" href="/students/pages/{{'BDP'}}">BDP</a>
                    <a class="dropdown-item" style="color: black;" href="/students/pages/{{'KIMIA'}}">KIMIA</a>
                    <a class="dropdown-item" style="color: black;" href="/students/pages/{{'ATPH'}}">ATPH</a>
                    <a class="dropdown-item" style="color: black;" href="/students/pages/{{'TEI'}}">TEI</a>
                    </div>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" style="color: black;" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Administrasi
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <a class="dropdown-item" style="color: black;" href="{{'/students/administrasi'}}">Administrasi</a>
                        <a class="dropdown-item" style="color: black;" href="{{'/students/highcharts'}}">Grafik</a>
                        <a class="dropdown-item" style="color: black;" href="{{'/sendEmail'}}">Email <span class="sr-only">(current)</span></a>
                    </div>
                </li>
                
            </ul>
        </div>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" style="color:black;" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>
</div>

<div class="container">
<div id="container" class="my-4"></div>
</div>

</body>
<script>Highcharts.chart('container', {
  chart: {
    type: 'column'
  },
  title: {
    text: 'Semua Data Jurusan'
  },
  xAxis: {
    categories: [
      'DATA'
    ],
    crosshair: true
  },
  yAxis: {
    min: 0,
    title: {
      text: 'Data siswa Semua Jurusan'
    }
  },
  tooltip: {
    headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
    pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
      '<td style="padding:0"><b>{point.y:1f} Siswa </b></td></tr>',
    footerFormat: '</table>',
    shared: true,
    useHTML: true
  },
  plotOptions: {
    column: {
      pointPadding: 0.1,
      borderWidth: 0
    }
  },
  series: [{
    name: 'RPL',
    data: [{{$RPL}}]

  }, {
    name: 'TKJ',
    data: [{{$TKJ}}]

  }, {
    name: 'BDP',
    data: [{{$BDP}}]

  }, {
    name: 'KIMIA',
    data: [{{$KIMIA}}]

  }, {
    name: 'ATPH',
    data: [{{$ATPH}}]

  }, {
    name: 'TEI',
    data: [{{$TEI}}]

  }]
});</script>
</html>