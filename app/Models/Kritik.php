<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kritik extends Model
{
    use HasFactory;
    protected $table = "kritiks";
    protected $guarded = [];
    protected $primaryKey = 'id';
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
