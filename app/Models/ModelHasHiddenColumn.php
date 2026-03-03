<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ModelHasHiddenColumn extends Model
{
    protected $fillable =
    [
        'model',
        'column',
        'is_visible'
    ];
}
