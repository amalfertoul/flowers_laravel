<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FlowersDisk extends Model
{
    use HasFactory;

    protected $table = 'flowers_disk_table';

    protected $fillable = [
        'name',
        'small_img',
        'large_img',
        'description',
    ];

    public $timestamps = true;

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];
}
