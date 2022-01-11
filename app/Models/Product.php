<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory;
    use SoftDeletes;

    public $fillable = [
        'id',
        'name',
        'slug',
        'stock',
        'unit',
        'deleted_at',
        'created_by',
        'updated_at',
    ];
}
