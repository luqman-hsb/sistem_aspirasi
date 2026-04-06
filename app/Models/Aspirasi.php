<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Aspirasi extends Model
{
    use HasFactory;

    protected $table = 'aspirasi';
    protected $primaryKey = 'id_aspirasi';
    public $incrementing = true;
    protected $keyType = 'int';

protected $fillable = ['id_aspirasi', 'status', 'id_kategori', 'feedback'];

    protected $casts = [
        'status' => 'string',
        'feedback' => 'string',
    ];

    public function kategori()
    {
        return $this->belongsTo(Kategori::class, 'id_kategori', 'id_kategori');
    }

    public function inputAspirasi()
    {
        return $this->hasOne(InputAspirasi::class, 'id_aspirasi', 'id_aspirasi');
    }
}

