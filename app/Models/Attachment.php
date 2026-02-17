<?php

namespace App\Models;

use App\HasHiddenColumn;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Attachment extends Model
{
	use HasFactory;
    use HasHiddenColumn;

    protected $fillable = [
        'file_name',
        'file_type',
        'size',
        'uploaded_by'
    ];
}
