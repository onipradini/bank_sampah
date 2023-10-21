<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JenisSampahModel extends Model
{
    use HasFactory;

    protected $table = "jenis_sampah";
    
    public $fillable = ['nama', 'deskripsi', 'foto', 'harga'];
    
    public $timestamps = true;

}