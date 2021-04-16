<?php
header("Content-type: application/vnd-ms-excel");
header("Content-Disposition: attachment; filename=Data Students".$datakelas."".'_'."".$datajurusan.".xls");
?>
 <h2>Data Students {{$datajurusan}} {{$datakelas}}</h2>
        <table class="table table-hover table-dark" border="1">
            <thead>
                <tr>
                <th scope="col">#</th>
                <th scope="col">NISN</th>
                <th scope="col">Nama</th>
                <th scope="col">Kelas</th>
                <th scope="col">Jurusan</th>
                <th scope="col">Email</th>
                
                
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
                <td>{{$std->email}}</td>
            </tr>
        @endforeach
        </tbody>
    </table>

    </table>