<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Armada extends Model
{
    use HasFactory;

    protected $table = 'Data_Armada_Kendaraan';
    protected $primaryKey = 'id_armada';
    
    public $timestamps = false; 
    protected $fillable = [
        'nomor_plat',
        'unit',
        'tahun_pembuatan',
        'merek',
        'transmisi'
    ];
}