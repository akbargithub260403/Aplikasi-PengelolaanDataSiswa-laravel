<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $table = 'students';
    
    protected $fillable = ['NISN','nama','kelas','jurusan','email','alamat','no_telp','gambar'];

    public function getAvatar()
    {
        if($this->gambar == "NULL"){
            return asset('img/laravel.png');
        }

        return asset('img/'.$this->gambar);
    }

}
