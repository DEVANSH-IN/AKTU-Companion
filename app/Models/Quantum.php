<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Quantum extends Model
{
    /** @use HasFactory<\Database\Factories\QuantumFactory> */
    use HasFactory;
    protected $table = 'quantum';
    protected $guarded = [];
}
