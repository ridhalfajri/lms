<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kelas extends Model
{
    use HasFactory;
    protected $table = "kelas";
    protected $guarded = [];
    protected $primaryKey = 'id';

    public function sertifikat()
    {
        return $this->hasMany(Sertifikat::class);
    }
    public function materi_akses()
    {
        return $this->hasMany(MateriAksess::class);
    }
    public function pembelajaran()
    {
        return $this->hasMany(Pembelajaran::class);
    }
    public function upload()
    {
        return $this->hasMany(Upload::class);
    }
}
