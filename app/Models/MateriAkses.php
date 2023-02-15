<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MateriAkses extends Model
{
    use HasFactory;
    protected $table = "materi_akses";
    protected $guarded = [];
    protected $primaryKey = 'id';

    public function materi()
    {
        return $this->belongsTo(Materi::class);
    }
    public function kelas()
    {
        return $this->belongsTo(Kelas::class);
    }
    public function user_role()
    {
        return $this->belongsTo(UserRole::class);
    }
}
