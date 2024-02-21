<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pkl extends Model
{
    use HasFactory;

    protected $table = ('pkl');

    /**
     * fillable
     *
     * @var array
     */
    protected $fillable = [
        'id_siswa',
        'id_dudi',
        'tgl_masuk',
        'tgl_keluar',
    ];

    public function siswa()
    {
        return $this->belongsTo(siswa::class, 'id_siswa');
    }

    public function dudi()
    {
        return $this->belongsTo(dudi::class, 'id_dudi');
    }
}
