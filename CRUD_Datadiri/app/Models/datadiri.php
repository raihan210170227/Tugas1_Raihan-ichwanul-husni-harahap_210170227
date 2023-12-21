<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class datadiri extends Model
{
    use HasFactory;
    protected $fillable = ['nim', 'nama', 'jurusan', 'programstudi', 'matakuliah'];
    protected $table = 'datadiri';
    public $timestamps = false;
}
