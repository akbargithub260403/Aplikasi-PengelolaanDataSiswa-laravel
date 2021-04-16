<?php
header("Content-type: application/vnd-ms-excel");
header("Content-Disposition: attachment; filename=Data Students.xls");
?>
 <h2>Data Students Kelas X</h2>
        <table class="table table-hover table-dark" border="1">
            <thead>
                <tr>
                <th>#</th>
                <th colspan="2">NISN</th>
                <th colspan="2">Nama</th>
                <th colspan="2">Kelas</th>
                <th colspan="2">Jurusan</th>
                <th colspan="2">Email</th>
                
                
                </tr>
            </thead>
        <tbody>
        @foreach ($kelasX as $std)
            <tr>
                <th>{{$loop->iteration}}</th>
                <td colspan="2">{{$std->NISN}}</td>
                <td colspan="2">{{$std->nama}}</td>
                <td colspan="2"><center>{{$std->kelas}}</center></td>
                <td colspan="2">{{$std->jurusan}}</td>
                <td colspan="2">{{$std->email}}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
    <br><br>

<h2>Data Students Kelas XI</h2>
        <table class="table table-hover table-dark" border="1">
            <thead class="thead-dark">
                <tr>
                <th>#</th>
                <th colspan="2">NISN</th>
                <th colspan="2">Nama</th>
                <th colspan="2">Kelas</th>
                <th colspan="2">Jurusan</th>
                <th colspan="2">Email</th>
                
                
                </tr>
            </thead>
        <tbody>
        @foreach ($kelasXI as $std)
            <tr>
                <th>{{$loop->iteration}}</th>
                <td colspan="2">{{$std->NISN}}</td>
                <td colspan="2">{{$std->nama}}</td>
                <td colspan="2"><center>{{$std->kelas}}</center></td>
                <td colspan="2">{{$std->jurusan}}</td>
                <td colspan="2">{{$std->email}}</td>
            
            </tr>
        @endforeach
        </tbody>
    </table>
    <br><br>

<h2>Data Students Kelas XII</h2>
        <table class="table table-hover table-dark" border="1">
            <thead class="thead-dark">
                <tr>
                <th>#</th>
                <th colspan="2">NISN</th>
                <th colspan="2">Nama</th>
                <th colspan="2">Kelas</th>
                <th colspan="2">Jurusan</th>
                <th colspan="2">Email</th>
               
                </tr>
            </thead>
        <tbody>
        @foreach ($kelasXII as $std)
            <tr>
                <th>{{$loop->iteration}}</th>
                <td colspan="2">{{$std->NISN}}</td>
                <td colspan="2">{{$std->nama}}</td>
                <td colspan="2"><center>{{$std->kelas}}</center></td>
                <td colspan="2">{{$std->jurusan}}</td>
                <td colspan="2">{{$std->email}}</td>
        
            </tr>
        @endforeach
        </tbody>
    </table>