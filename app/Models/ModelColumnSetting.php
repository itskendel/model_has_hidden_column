<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ModelColumnSetting extends Model
{
    use HasFactory;

    protected $fillable = [
        'model',
        'column',
        'is_visible'
    ];
}
