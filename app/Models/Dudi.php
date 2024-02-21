<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dudi extends Model
{
    use HasFactory;

    protected $table = ('dudi');

    /**
     * fillable
     *
     * @var array
     */
    protected $fillable = [
        'nama',
        'alamat',

    ];


}
