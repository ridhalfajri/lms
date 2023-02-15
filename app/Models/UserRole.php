<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserRole extends Model
{
    use HasFactory;
    protected $table = "user_role";
    protected $guarded = [];
    protected $primaryKey = 'id';

    public function materi_akses()
    {
        return $this->hasMany(MateriAkses::class);
    }
}
