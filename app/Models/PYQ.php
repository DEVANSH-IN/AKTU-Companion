<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PYQ extends Model
{
    /** @use HasFactory<\Database\Factories\PYQFactory> */
    use HasFactory;
    protected $table = 'pyqs';
    protected $guarded = [];
}
