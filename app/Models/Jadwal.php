<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jadwal extends Model
{
    use HasFactory;
    protected $table = "jadwal";
    protected $guarded = [];
    protected $primaryKey = 'id';
    public function kelas()
    {
        return $this->belongsTo(Kelas::class);
    }
    public function instruktur()
    {
        return $this->belongsTo(User::class);
    }
}
