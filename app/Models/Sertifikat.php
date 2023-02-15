<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sertifikat extends Model
{
    use HasFactory;
    protected $table = "sertifikat";
    protected $guarded = [];
    protected $primaryKey = 'id';

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function instansi()
    {
        return $this->belongsTo(Instansi::class);
    }
    public function kelas()
    {
        return $this->belongsTo(Kelas::class);
    }
}
