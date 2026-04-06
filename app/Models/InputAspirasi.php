<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InputAspirasi extends Model
{
    use HasFactory;

    protected $table = 'input_aspirasi';
    protected $primaryKey = 'id_pelaporan';
    public $incrementing = true;
    protected $keyType = 'int';

    protected $fillable = ['id_pelaporan', 'nis', 'id_kategori', 'lokasi', 'ket', 'id_aspirasi'];

    public function siswa()
    {
        return $this->belongsTo(Siswa::class, 'nis', 'nis');
    }

    public function kategori()
    {
        return $this->belongsTo(Kategori::class, 'id_kategori', 'id_kategori');
    }

    public function aspirasi()
    {
        return $this->belongsTo(Aspirasi::class, 'id_aspirasi', 'id_aspirasi');
    }
}

